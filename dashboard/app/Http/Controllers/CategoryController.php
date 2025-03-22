<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $parentCategories = Category::all(); // For parent category dropdown
        return view('categories.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
            'description' => 'nullable|max:500',
            'status' => 'required|in:active,inactive,archived',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
        ]);

        $categoryData = $request->only([
            'name', 
            'description', 
            'status', 
            'parent_id', 
            'meta_title', 
            'meta_description'
        ]);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
            $categoryData['image'] = $imagePath;
        }

        // Save created_by (Assuming user is logged in)
        $categoryData['created_by'] = auth()->id();

        Category::create($categoryData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $parentCategories = Category::all(); // For parent category dropdown
        return view('categories.edit', compact('category', 'parentCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|max:500',
            'status' => 'required|in:active,inactive,archived',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
        ]);

        $categoryData = $request->only([
            'name', 
            'description', 
            'status', 
            'parent_id', 
            'meta_title', 
            'meta_description'
        ]);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
            $categoryData['image'] = $imagePath;
        }

        $category->update($categoryData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
