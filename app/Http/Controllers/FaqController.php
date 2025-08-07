<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqs')
            ->orderBy('sort_order')
            ->get();

        return view('faq', compact('categories'));
    }
}
