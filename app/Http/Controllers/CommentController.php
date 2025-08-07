<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'author' => 'required|max:255',
            'content' => 'required',
        ]);

        Comment::create([
            'car_id' => $request->car_id,
            'author' => $request->author,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Reactie toegevoegd!');
    }
}
