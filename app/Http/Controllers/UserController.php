<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    { 
      return view('users.index');
    }

    public function data_users()
    {

      $users = User::all();

      return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $actionset = '';
                  $actionset .= '<a href="#" href="" class="list-icons-item" id="edit-user" data-toggle="modal" data-id="'.$user->id.'""><i class="icon-pencil7"></i></a>';
                
                  $actionset .= '<a href="#" href="" class="list-icons-item" id="delete-user" data-toggle="modal" data-id="'.$user->id.'""><i class="icon-trash"></i></a>';
                

                return $actionset;

            })
            ->editColumn('id', 'ID: {{$id}}')
            ->editColumn('created_at', function ($user) {
                return Carbon::parse($user->created_at)->format('d/m/Y H:i:s');
              })
            ->make(true);
    }


    public function store(UserRequest $request)
    {
      $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'password' => $request->password,
      ]);


      return redirect()->back()->with('success', 'User has been added!');    
    }


    public function edit($id)
    {
      $user = User::where('id',$id)->first();
      return $user;
    }

    public function update(UserRequest $request, $id)
    {
      $user = User::where('id',$id)
                  ->first();

      $user->name = $request->name;
      $user->username = $request->username;
      $user->password = $request->password;
      $user->save();


      return redirect()->back()->with('success', 'User has been Updated!');
    }

    public function destroy($id)
    {
      $user = User::where('id',$id)
                ->delete();

      return redirect()->back()->with('success', 'User has been deleted!');
    }
}
