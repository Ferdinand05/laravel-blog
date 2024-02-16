<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Category;
use App\Models\Post;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// * NOTE : breadcrumbs yang sudah dibikin, bisa dipanggil sebagai $trail->parent

// Parent Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->push('Blog', route('blog'));
});

// Blog > Dashboard Post
Breadcrumbs::for('posts', function (BreadcrumbTrail $trail) {
    $trail->parent('blog');
    $trail->push('Dashboard Post', route('posts.index'));
});

// Blog > Dashboard Post > Edit Post
Breadcrumbs::for('edit.post', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('posts');
    $trail->push('Edit Post', route('posts.edit', $post));
});

// Blog > Dashboard Post > Create Post
Breadcrumbs::for('create.post', function (BreadcrumbTrail $trail) {
    $trail->parent('posts');
    $trail->push('Create Post', route('posts.create'));
});

// Blog > Detail
Breadcrumbs::for('show.post', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('blog');
    $trail->push($post->title, route('posts.show', $post));
});


// category

// Blog > Dashboard Category
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('blog');
    $trail->push('Dashboard Category', route('categories.index'));
});

// Blog > Dashboard Category > Create Category
Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('categories');
    $trail->push('Create Category', route('categories.create'));
});

// Blog > Dashboard Category > Create Category
Breadcrumbs::for('categories.edit', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('categories');
    $trail->push($category->category, route('categories.edit', $category));
});
