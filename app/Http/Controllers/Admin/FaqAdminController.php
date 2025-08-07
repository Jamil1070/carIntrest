<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqAdminController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqs')->orderBy('sort_order')->get();
        return view('admin.faq.index', compact('categories'));
    }

    public function create()
    {
        $categories = FaqCategory::orderBy('sort_order')->get();
        return view('admin.faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|max:500',
            'answer' => 'required',
            'sort_order' => 'integer|min:0',
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ succesvol toegevoegd!');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::orderBy('sort_order')->get();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|max:500',
            'answer' => 'required',
            'sort_order' => 'integer|min:0',
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ succesvol bijgewerkt!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faq.index')->with('success', 'FAQ succesvol verwijderd!');
    }

    // Category management
    public function createCategory()
    {
        return view('admin.faq.create-category');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'sort_order' => 'integer|min:0',
        ]);

        FaqCategory::create($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'Categorie succesvol toegevoegd!');
    }

    public function editCategory(FaqCategory $category)
    {
        return view('admin.faq.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, FaqCategory $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'sort_order' => 'integer|min:0',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'Categorie succesvol bijgewerkt!');
    }

    public function destroyCategory(FaqCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.faq.index')->with('success', 'Categorie succesvol verwijderd!');
    }
}
