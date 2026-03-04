<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;



# For Guests
Route::group([], function () {
    // Blog
    Route::get('/posts', [PostController::class, 'index'])->name('blog');

    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
    Route::get('/', function () {
        // Show Last 3 Posts
        $posts = Post::latest()->take(3)->get();
        return view('index', ['posts' => $posts]);
    })->name('home');
});

# For Users And Admins
// Route::middleware(['auth'])->group(function () {
Route::middleware('auth')->group(function () {
    ######################### Posts #########################
    // Create
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    // Store
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

    // Edit
    Route::get('/posts/{slug}/edit', [PostController::class, 'edit'])->name('posts.edit');

    // Update
    Route::put('/posts/{slug}/update', [PostController::class, 'update'])->name('posts.update');

    // Delete
    Route::delete('/posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');

    // Show Posts Of User
    Route::get('/posts/my-posts', [PostController::class, 'myPosts'])->name('posts.my-posts');


    ######################### Profile #########################
    // Show Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    // Add Profile Image
    Route::post('/profile/upload-image', [ProfileController::class, 'uploadProfileImage'])->name('profile.image');

    // Delete Profile Image
    Route::delete('/profile/delete-image', [ProfileController::class, 'deleteProfileImage'])->name('profile.delete.image');

    // Show Edit Form
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Update Data From DB
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Show Form Of Change Password
    Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.edit.password');

    // Update Password
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');

    ######################### ِComments #########################
    // Store
    Route::post('post/{id}/comments', [CommentController::class, 'store'])->name('comments.store');

    // Delete
    Route::delete('post/comment/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Edit
    Route::get('post/comment/{id}', [CommentController::class, 'edit'])->name('comments.edit');

    // Update
    Route::put('post/comment/{id}', [CommentController::class, 'update'])->name('comments.update');
});



// Show Single Post
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.single.post');

// Categories
Route::get('/posts/category/{slug}', [CategoryController::class, 'index'])->name('category.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


require __DIR__.'/auth.php';


