<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Traits\GeneralTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    use GeneralTrait;
    public function __construct(public ProductRepository $productRepository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Product::class);

        if ($this->isWebGuard()) {
            return app(ProductsDataTable::class)->render('products.index');
        }

        $products = $this->productRepository->all();
        return response()->json(['data' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Product::class);

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Gate::authorize('create', Product::class);
        $product = $this->productRepository->store($request->validated());
        if($this->isWebGuard()){
            return redirect()->route('products.index');
        }else{
            return response()->json(['message' => "Product created successfully", "data" => $product]);;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        Gate::authorize('view', $product);

        return $this->isWebGuard()?view('products.view', compact('product')):response()->json(['data' => $product]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Application|Factory|View
    {
        Gate::authorize('update', $product);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        Gate::authorize('update', $product);
        $this->productRepository->update($product->id, $request->validated());
        $product = $this->productRepository->find($product->id);

        if ($this->isWebGuard()) {
            return redirect()->route('products.index');
        } else {
            return response()->json(['message' => "Product updated successfully", "data" => $product]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete', $product);
        $this->productRepository->delete($product->id);
        return response()->json(['message' => "Product deleted successfully"]);

    }
}
