<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit') ?? 100;
        $users = User::orderBy('created_at', 'desc')->paginate($limit);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255|confirmed',
        ]);

        // Handle File Upload
        if($request->hasFile('avatar')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('avatar')->storeAs('public/backend/img', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->password = Hash::make($request->input('pasword'));
        $user->avatar = $filenameToStore;
        $user->save();

        return redirect(route('users.index'))->with('success', 'User Created Successfully');
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
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'email' => "required|email|unique:App\Models\User,email,{$id}|max:255",
            'password' => 'nullable|string|min:8|max:255|confirmed',
        ]);

        // Handle File Upload
        if($request->hasFile('avatar')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('avatar')->storeAs('public/backend/img', $filenameToStore);
        }

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        if($request->input('password')) {
            $user->password = Hash::make($request->input('pasword'));
        }
        if($request->hasFile('avatar')) {
            // Delete old image
            Storage::delete('public/backend/img/' . $user->avatar);
            $user->avatar = $filenameToStore;
        }
        $user->save();

        return redirect(route('users.index'))->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->avatar != 'noimage.jpg') {
            // Delete image
            Storage::delete('public/backend/img/' . $user->avatar);
        }
        $user->delete();
        return redirect(route('users.index'))->with('success', 'User Deleted Successfully');
    }
}
