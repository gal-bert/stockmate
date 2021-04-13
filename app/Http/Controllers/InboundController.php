<?php

namespace App\Http\Controllers;

use App\Models\ExpiryDate;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class InboundController extends Controller
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
            'merchants' => Merchant::all()
        ];
        return view('pages.log_transaction.inbound.index')->with($data);
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
            'quantities.*' => 'numeric'
        ]);

        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        $expiries = $request->input('expiries', []);

        $transaction = new TransactionHeader();
        $transaction->staff_id = 123;
        $transaction->merchant_id = $request->input('merchant');
        $transaction->status = 1;
        $transaction->save();

        $lastTransaction = TransactionHeader::latest()->first();
        $transactionId = $lastTransaction->transaction_id;

        for ($i=0; $i < count($products); $i++) {
            if ($products[$i] != '') {

                $detail = new TransactionDetail();
                $detail->product_id = $products[$i];
                $detail->transaction_id = $transactionId;
                $detail->save();

                $expiry = new ExpiryDate();
                $expiry->product_id = $products[$i];
                $expiry->expiry_date = $expiries[$i];
                $expiry->product_qty = $quantities[$i];
                $expiry->transaction_id = $transactionId;
                $expiry->save();
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
