<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug) {
        // Get Category
        $category = Category::where('slug', $slug)->firstOrFail();

        // Get Posts Of This Category
        $posts = Post::where('category_id', $category->id)->get();

        // Redirection
        return view('blog.posts-of-category', ['posts' => $posts, 'category' => $category->name]);
    }
}
