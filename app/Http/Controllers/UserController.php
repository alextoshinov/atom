<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::find($id);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->input('first_name') != null && $this->validate($request, [
            'first_name'    => 'string|max:255',
        ])) {
            $user->first_name = $request->input('first_name');
        }

        if ($request->input('last_name') != null && $this->validate($request, [
            'last_name'    => 'string|max:255',
        ])) {
            $user->last_name = $request->input('last_name');
        }

        if ($request->input('username') != null && $request->input('username') != $user->username && !$this->validate($request, [
            'username'      => 'string|max:255|unique:users'
        ])) {
            $user->username = $request->input('username');
        }

        if ($request->input('email') != null  && $request->input('email') != $user->email && !$this->validate($request, [
            'email'         => 'string|email|max:255|unique:users',
        ])) {
            $user->email = $request->input('email');
        }

        if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'User was edited successfuly');

        return redirect()->route('home');
    }
}
