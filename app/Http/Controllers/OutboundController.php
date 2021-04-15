<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Product;
use App\Models\Staff;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OutboundController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'products' => Product::all(),
            'merchants' => Merchant::all(),
            'staffs' => Staff::all()
        ];
        return view('pages.log_transaction.outbound.index')->with($data);
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
            'products' => 'required',
            'merchant' => 'required',
            'quantities' => 'required|array',
            'quantities.*' => 'numeric',
            'staff' => 'required'
        ]);

        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);

        $transaction = new TransactionHeader();
        $transaction->staff_id = $request->input('staff');
        $transaction->merchant_id = $request->input('merchant');
        $transaction->status = 0;
        $transaction->save();

        $lastTransaction = TransactionHeader::latest()->first();
        $transactionId = $lastTransaction->transaction_id;

        for ($i=0; $i < count($products); $i++) {
            $product = Product::find($products[$i]);
            $currQty = $product->product_qty;

            if ($products[$i] != '' && $quantities[$i] <= $currQty) {

                $detail = new TransactionDetail();
                $detail->product_id = $products[$i];
                $detail->transaction_id = $transactionId;
                $detail->product_qty = $quantities[$i];
                $detail->save();

                $newQty = $currQty - $quantities[$i];
                $product->product_qty = $newQty;
                $product->save();

            } else if ($quantities[$i] > $currQty){
                return redirect()->back()->with('error', 'Insufficient quantity for '.$product->product_name);
            }
        }
        return redirect()->back()->with('success', 'Transaction Created Successfully');

    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
