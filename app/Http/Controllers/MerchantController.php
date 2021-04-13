<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchantController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'merchants' => Merchant::all()
        ];

        return view('pages.merchants.index')->with($data);
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
           'merchantName' => 'required'
        ]);

        $merchant = new Merchant();
        $merchant->merchant_name = $request->input('merchantName');
        $merchant->merchant_address = $request->input('merchantAddress');
        $merchant->merchant_contact = $request->input('merchantContact');
        $merchant->save();

        return redirect()->back()->with('success', 'Merchant added successfully');
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
        $this->validate($request, [
            'merchantName' => 'required'
        ]);

        $merchant = Merchant::find($id);
        $merchant->merchant_name = $request->input('merchantName');
        $merchant->merchant_address = $request->input('merchantAddress');
        $merchant->merchant_contact = $request->input('merchantContact');
        $merchant->save();

        return redirect()->back()->with('success', 'Merchant updated successfully');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchant = Merchant::find($id);
        $merchant->delete();
        return redirect()->back()->with('success', 'Merchant deleted successfully');
    }
}
