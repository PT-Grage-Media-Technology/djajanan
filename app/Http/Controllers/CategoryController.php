<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $currentPage = request()->get('page', 1);  // Ambil halaman saat ini, default 1

        $categories = Category::skip(($currentPage - 1) * $perPage)->take($perPage)->get();
        $total = Category::count();  // Total users

        $lastPage = ceil($total / $perPage);  // Hitung jumlah halaman

        // $categories = Category::all();
        if (auth()->user()->can('categories')) {
            return view('admin.categories.index', compact('categories', 'currentPage', 'lastPage', 'perPage'));
        }

        return abort(403);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'icon' => 'required|file|mimes:png,jpg,jpeg',
        ]);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconPath = 'category_icons/' . time() . '_' . $icon->getClientOriginalName();
            $icon->move(public_path('category_icons'), $iconPath);
        }

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $iconPath,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $category->id,
            'icon' => 'nullable|file|mimes:png,jpg,jpeg',
        ]);

        if ($request->hasFile('icon')) {
            if ($category->icon) {
                File::delete(public_path($category->icon));
            }
            $icon = $request->file('icon');
            $iconPath = 'category_icons/' . time() . '_' . $icon->getClientOriginalName();
            $icon->move(public_path('category_icons'), $iconPath);
            $category->icon = $iconPath;
        }

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $category->icon,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->icon) {
            File::delete(public_path($category->icon));
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

    // public function showCategories()
    // {
    //     $products = Product::paginate(20);// Mengambil semua kategori dari database
    //     return view('categories', compact('categories','products'));

    // }

    public function showCategories(Request $request)
    {
        $categories = Category::all();
        // Default jumlah item per halaman
        $defaultItemsPerPage = 1;

        // Ambil parameter `itemsPerPage` dari request atau gunakan default
        $itemsPerPage = $request->input('itemsPerPage', $defaultItemsPerPage);

        // Mengambil data produk dengan pagination dinamis
        $products = Product::with('category', 'toko')->paginate($itemsPerPage);

        // Jika permintaan AJAX, kembalikan data produk dalam format JSON
        if ($request->ajax()) {
            return response()->json($products);
        }

        // Jika bukan AJAX, kembalikan tampilan lengkap
        return view('categories', compact('products', 'categories', 'itemsPerPage'));
    }
}
