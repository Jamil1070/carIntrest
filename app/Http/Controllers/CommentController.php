<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Car $car)
    {
        $request->validate([
            'author' => 'required|max:255',
            'content' => 'required',
        ]);

        $car->comments()->create([
            'author' => $request->author,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Reactie toegevoegd!');
    }
}
