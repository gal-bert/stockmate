<?php

namespace App\Http\Controllers;

use App\Models\ExpiryDate;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'products' => Product::all()
        ];
        return view('pages.inventory.index')->with($data);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'productSKU' => 'required',
            'productName' => 'required'
        ]);

        $sku = $request->input('productSKU');
        $findIdentical = Product::where('product_sku', $sku)->first();
        if($findIdentical){
            return redirect()->back()->with('error', 'Product SKU already exists');
        }
        else {
            $product = new Product();
            $product->product_name = $request->input('productName');
            $product->product_sku = $sku;
            $product->save();
            return redirect()->back()->with('success', 'Product added successfully');
        }

    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'product' => Product::find($id)
        ];
        return view('pages.inventory.show')->with($data);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'productSKU' => 'required',
            'productName' => 'required'
        ]);

        $sku = $request->input('productSKU');
        $oldSKU = Product::find($id);
        $oldSKU = $oldSKU->product_sku;

        $findIdentical = Product::where('product_sku', $sku)->first();

        if($findIdentical && $oldSKU != $sku){
            return redirect()->back()->with('error', 'Product SKU already exists');
        } else {
            $product = Product::find($id);
            $product->product_name = $request->input('productName');
            $product->product_sku = $sku;
            $product->save();
            return redirect()->back()->with('success', 'Product updated successfully');
        }
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function updateQty(Request $request, $id)
    {
        $this->validate($request, [
           'productQuantity' => 'required'
        ]);
        $qty = ExpiryDate::find($id);
        $qty->product_qty = $request->input('productQuantity');
        $qty->save();
        return redirect()->back()->with('success', 'Quantity updated successfully');
    }
}
