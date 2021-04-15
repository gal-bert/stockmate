<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'staffs' => Staff::all()
        ];
        return view('pages.staffs.index')->with($data);
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
           'staffName' => 'required',
           'staffGender' => 'required',
           'staffAddress' => 'required',
           'staffContact' => 'required',
        ]);

        $staff = new Staff();
        $staff->staff_name = $request->input('staffName');
        $staff->staff_gender = $request->input('staffGender');
        $staff->staff_address = $request->input('staffAddress');
        $staff->staff_contact = $request->input('staffContact');
        $staff->save();

        return redirect()->back()->with('success', 'Staff created successfully');
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
            'staffName' => 'required',
            'staffGender' => 'required',
            'staffAddress' => 'required',
            'staffContact' => 'required',
        ]);

        $staff = Staff::find($id);
        $staff->staff_name = $request->input('staffName');
        $staff->staff_gender = $request->input('staffGender');
        $staff->staff_address = $request->input('staffAddress');
        $staff->staff_contact = $request->input('staffContact');
        $staff->save();

        return redirect()->back()->with('success', 'Staff updated successfully');
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
