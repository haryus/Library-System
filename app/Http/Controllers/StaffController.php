<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StaffRequest;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("staffs.index");
    }

    public function data_staffs()
    {
        $staffs = Staff::query();
        return Datatables::of($staffs)
        ->addColumn('action', function ($staff) {
            $actionset = '';
            $actionset .= '<a href="#" href="" class="list-icons-item" id="edit-staff" data-toggle="modal" data-id="'.$staff->id.'""><i class="icon-pencil7"></i></a>';
            $actionset .= '<a href="#" href="" class="list-icons-item" id="delete-staff" data-toggle="modal" data-id="'.$staff->id.'""><i class="icon-trash"></i></a>';
            return $actionset;
        })
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        Staff::create($request->all());
        $user = User::create([
            'name' => $request->firstName,
            'username' => $request->firstName,
            'password' => bcrypt($request->firstName.$request->lastName),
        ]);
        return redirect()->back()->with('success','Staff has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return $staff;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $staff->update($request->all());
        return redirect()->back()->with('success','Staff has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->back()->with('success','Staff have been deleted!');
    }
}
