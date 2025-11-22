<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::when(request('search'), function ($query) {
            $query->where('nama', 'like', '%' . request('search') . '%');
        })->paginate(10);

        return view('product.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $rules                = [];
        $rules['kategori_id'] = 'required|integer|exists:categories,id';
        $rules['nama']        = 'required|string|max:255';
        $rules['deskripsi']   = 'nullable|string';
        $rules['harga']       = 'required|numeric';
        $rules['stok']        = 'required|numeric';
        $rules['foto']        = 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';

        $request->validate($rules);

        $product = $request->only(
            'kategori_id',
            'nama',
            'deskripsi',
            'harga',
            'stok'
        );

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name  = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads'), $name);

            $product['foto'] = $name;
        }

        Product::insert([$product]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        $categories = Category::all();

        return view('product.edit', compact('categories', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $rules                = [];
        $rules['kategori_id'] = 'required|integer|exists:categories,id';
        $rules['nama']        = 'required|string|max:255';
        $rules['deskripsi']   = 'nullable|string';
        $rules['harga']       = 'required|numeric';
        $rules['stok']        = 'required|numeric';
        $rules['foto']        = 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';

        $request->validate($rules);

        $payload = $request->only(
            'kategori_id',
            'nama',
            'deskripsi',
            'harga',
            'stok'
        );

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name  = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads'), $name);

            $payload['foto'] = $name;
        }

        $product->update($payload);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
