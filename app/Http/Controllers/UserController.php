<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $users = User::paginate(5);
            return view('admin.users.index', [
                'users' => $users,
            ]);
        } else {
            return redirect("/");
        }
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
    public function store(Request $request)
    {
        //
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
    
    public function edit(User $user)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $roles = Role::all();
            return view('admin.users.edit', [
                'roles' => $roles,
            ], compact('user'));
        } else {
            return redirect("/");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $role_id = $request->input('role_id');
            $data = [
                'role_id' => $role_id,
            ];
            $user->fill([
                'role_id' => $role_id,
            ])->save();
            Alert::success('Edit successfully');
            return redirect()->route('user.index');
        } else {
            echo "abc";
            exit;
            return view('client.home');
        }
    }

    /**
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
