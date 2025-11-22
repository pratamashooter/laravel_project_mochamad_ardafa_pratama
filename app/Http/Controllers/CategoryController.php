<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::when(request('search'), function ($query) {
            $query->where('nama', 'like', '%' . request('search') . '%');
        })->paginate(10);

        return view('category.index', compact('categories'));
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $rules         = [];
        $rules['nama'] = 'required|string|min:3|max:255';

        $request->validate($rules);

        Category::create(['nama' => $request->nama]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $rules = [];
        $rules['nama'] = 'required|string|min:3|max:255';

        $request->validate($rules);
        
        $category->update(['nama' => $request->nama]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
