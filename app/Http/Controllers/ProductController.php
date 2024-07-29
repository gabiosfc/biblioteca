<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $products = $product->all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProduct $request)
    {
        // Cria um novo produto
        $pd = Product::create($request->validated());
        // Redireciona para a página de produtos
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find((int)$id);
        if(!isset($product)){
            return back();
        }

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find((int)$id);
        if(!isset($product)){
            return back();
        }

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProduct $request, string $id)
    {
        $product = Product::find((int)$id);
        if(!isset($product)){
            return back();
        }
       
        //$product->name = $request->name;
        //$product->save();
        $product->update($request->validated());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find((int)$id);
        if(!isset($product)){
            return back();
        }

        $product->delete();
        return redirect()->route('products.index');
    }
}
