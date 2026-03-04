<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    # Show Posts
    public function index()
    {
        // Get Data From DB
        $allPosts = Post::latest()->get();

        // Get users
        $users = User::all();

        // Get Categories
        $categories = Category::all();

        // Redirection
        return view('blog.index', ['allPosts' => $allPosts, 'users' => $users, 'categories' => $categories]);
    }

    # Show Create Form
    public function create()
    {
        // Get Categories
        $categories = Category::all();

        //Show Form
        return view('blog.create', ['categories' => $categories]);
    }

    # Inser Post Into DB
    public function store(Request $request)
    {
        // Clean data
        $request->validate([
            'title' => ['required', 'string', 'max:150', 'min:2', 'unique:posts,title'],
            'description' => ['required', 'string', 'min:20'],
            'category' => ['required', 'exists:categories,id'],
            'image_path' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:5048',
                'dimensions:min_width=100,min_height=100'
            ]
        ]);

        // Storage The Image
        $image = $request->file('image_path');
        // Create Slog
        $slug = Str::slug($request->title, '-');
        // Make unique image name
        $image_name = uniqid() . '-' . $slug . '.' . $image->extension();

        // Stocke Image Into Files
        $image->move(public_path('images'), $image_name);

        // Insert Post Into DB
        $post = Post::create([
            'slug' => $slug,
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $image_name,
            'category_id' => $request->category,
            'user_id' => Auth::id(),
        ]);

        return to_route('posts.single.post', $post->slug)->with('created', 'The post was successfully Created');
    }

    # Show Single Post
    public function show(string $slug)
    {
        // Get Data Of Post From DB
        $post = Post::where('slug', $slug)->firstOrFail();

        // Get Comments
        $comments = Comment::where('post_id', $post->id)->get();

        return view('blog.single-post', ['post' => $post, 'comments' => $comments]);
    }

    # Show Edit Form
    public function edit(string $slug)
    {
        // Get Post
        $post = Post::where('slug', $slug)->firstOrFail();

        // Get Categories
        $categories = Category::all();

        // Show Form
        return view('blog.edit', ['post' => $post, 'categories' => $categories]);
    }

    # Update Post From DB
    public function update(Request $request, $slug)
    {
        // Get Post
        $post = Post::where('slug', $slug)->firstOrFail();

        // Verify Data
        $request->validate([
            'title' => ['required', 'string', 'max:150', 'min:3', 'unique:posts,title,' . $post->id],
            'description' => ['required', 'string', 'min:20'],
            'category' => ['required', 'exists:categories,id'],
            'image_path' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg',
                'max:5048',
            ]
        ]);

        // Updating The Slug
        $new_slug = Str::slug($request->title, '-');

        $image_name = $post->image_path; // Old Image

        // Update Image If User Add Image
        if ($request->hasFile('image_path')) {
            // Delete Old Image
            if (file_exists(public_path('images/' . $post->image_path))) {
                unlink(public_path('images/' . $post->image_path));
            }

            $image = $request->file('image_path');
            $image_name = uniqid() . '-' . $new_slug . '.' . $image->extension();
            $image->move(public_path('images'), $image_name);
        }

        // Updating
        $post->update([
            'slug' => $new_slug,
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $image_name,
            'category_id' => $request->category,
        ]);

        // Redirection
        return to_route('posts.single.post', $post->slug)->with('updated', 'The post was successfully updated');
    }

    # Delete Post
    public function destroy(string $slug)
    {
        // Get Post
        $post = Post::where('slug', $slug)->firstOrFail();

        // Delete Image
        if (file_exists(public_path('images/' . $post->image_path))) {
            unlink(public_path('images/' . $post->image_path));
        }

        // Delete Post
        Post::destroy($post->id);

        return to_route('blog')->with('deleted', 'The post was successfully deleted');
    }

    # Show Posts Of User
    public function myPosts() {
        // Get Posts Of User
        $posts = Post::where('user_id', Auth::id())->get();

        // Redirection
        return view('blog.my-posts', ['posts' => $posts]);
    }
}
