<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateFormRequest;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users')); 
    }

    public function show($id)
    {
       // $user = User::find($id);
       // $user = User::where('id', $id)->first(); 

       if($user = User::find($id))
           return view('users.show', compact('user'));

        return redirect()->route('users.index');

        return $user;
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateFormRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return ($user) ? view('users.edit', compact('user')) : redirect()->route('users.index');
    }

    public function update(StoreUpdateFormRequest $request, $id)
    {
        $user = User::find($id);
        
        if(!$user) 
            return redirect()->route('users.index');
        
        $data = $request->only('name', 'email');

        if($request->password)
            $data['password'] = bcrypt($request->password);
        
        $user->update($data);

        return redirect()->route('users.index');
        
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->delete())
            return redirect()->route('users.index');
    }
}
