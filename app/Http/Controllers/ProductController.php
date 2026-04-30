<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403);
        }
        return view('product.view', compact('product'));
    }

    public function edit(Product $product)
    {
        \Illuminate\Support\Facades\Gate::authorize('update', $product);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        \Illuminate\Support\Facades\Gate::authorize('update', $product);

        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($request->only('name', 'qty', 'price'));

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        \Illuminate\Support\Facades\Gate::authorize('delete', $product);
        
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
