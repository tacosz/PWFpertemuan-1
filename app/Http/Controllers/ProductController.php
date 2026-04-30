<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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

    public function store(StoreProductRequest $request)
    {

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

    public function update(UpdateProductRequest $request, Product $product)
    {
        \Illuminate\Support\Facades\Gate::authorize('update', $product);

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
