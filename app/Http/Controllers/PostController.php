<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Get all posts
    public function index()
    {
        return Post::all();
    }

    // Store a new post
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional photo field
        ]);
    
        // Create a new post
        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->description = $validated['description'];
    
        // Handle the photo upload if exists
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $post->photo = $photoPath;  // Save the path to the photo in the database
        }
    
        $post->save();
    
        return response()->json($post, 201); // Return the created post with status 201
    }
    
    // Show a single post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    // Update an existing post
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate photo
        ]);

        $post = Post::findOrFail($id);
        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($post->photo) {
                Storage::delete('public/' . $post->photo);
            }

            $file = $request->file('photo');
            $filePath = $file->store('photos', 'public'); // Save in the 'public/photos' directory
            $data['photo'] = $filePath;
        }

        $post->update($data);

        return response()->json($post);
    }

    // Delete a post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Delete the photo if it exists
        if ($post->photo) {
            Storage::delete('public/' . $post->photo);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
