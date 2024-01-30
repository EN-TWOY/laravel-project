<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view("comment", compact('comments'));
    }

    public function create()
    {
        return view("create");
    }
}
