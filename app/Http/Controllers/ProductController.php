<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index()
{
    $products = Product::all();

    return view('products.index', [
        'products' => $products
    ]);
}

public function create() 
{
    return view('products.create');
}

public function store(Request $request)
{
    $request->validate([
        "name" => 'required|string|max:255',
        "description" => 'required|string|max:255',
        "price" => 'required|numeric|min:0',
        "image" => 'nullable|image|max:2048',
    ]);
// upload image if provided

$imagePath = null;
if($request ->hasFile("image")) {
    $imagePath = $request->file("image")->store("products", "public");
}

$product = new Product();
$product->name = $request->input("name");
$product->description = $request->input("description");
$product->price = $request->input("price");
$product->image = $imagePath;
$product->save();

return redirect()->route("products.index")->with("success", "Product create");
}
public function  edit(Product $product)
{
    return view('products.edit', compact("product"));
} 


public function update(Request $request, Product $product)
{
    $request->validate([
            "name" => 'required|string|max:255',
        "description" => 'required|string|max:255',
        "price" => 'required|numeric|min:0',
        "image" => 'nullable|image|max:2048',
    ]);

    $imagePath = null;
    // upload mage if provided
    if($request->hasFile('image')){
        $imagePath = $request->file("image")->store("products", "public");
    }

$product->name = $request->input("name");
$product->description = $request->input("description");
$product->price = $request->input("price");
$product->image = $imagePath;
$product->save();

return redirect()->route("products.index")->with("success", "Product Updated Successfully");
}

public function destroy(Product $product)
{
    // Delete the image from storage, if one exists
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }

    // Delete the product from MySQL
    $product->delete();

    return redirect()
        ->route('products.index')
        ->with('success', 'Product deleted successfully');
}
}
