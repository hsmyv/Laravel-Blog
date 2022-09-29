<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\contracts\support\foundation\application;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
class PostsController extends Controller
{
    public function show($language, Post $post)
    {

        return view('webpage.post', [
        'post' => $post

        ]);
    }

    public function index($language, Category $category){

        return view ('webpage.blog' ,  [
                'posts' => Post::latest()->filter(request(['search','category', 'author']))->simplePaginate(2),
                'categories' => Category::all(),
                'currentCategory' => Category::firstWhere('slug', request('category'))

            ]);
    }

    public function authorindex($language, User $author){

        return view ('webpage.blog' , [
            'posts' => $author->posts,
            'categories' => Category::all()

    ]);
    
    }


}
