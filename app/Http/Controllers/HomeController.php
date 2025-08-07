<?php

namespace App\Http\Controllers;

use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        // Haal alle auto's op inclusief hun comments
        $cars = Car::with('comments')->get();

        return view('home', compact('cars'));
    }
}
