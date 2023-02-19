<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit') ?? 100;
        $admins = Admin::orderBy('created_at', 'desc')->paginate($limit);
        return view('admin.admins.index')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
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
            'email' => 'required|email|unique:admins|max:255',
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

        $admin = new Admin;
        $admin->name = $request->input('name');
        $admin->phone = $request->input('phone');
        $admin->email = $request->input('email');
        $admin->address = $request->input('address');
        $admin->password = Hash::make($request->input('pasword'));
        $admin->avatar = $filenameToStore;
        $admin->save();

        return redirect(route('admins.index'))->with('success', 'Admin Created Successfully');
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
        $admin = Admin::find($id);
        return view('admin.admins.edit')->with('admin', $admin);
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
            'email' => "required|email|unique:App\Models\Admin,email,{$id}|max:255",
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

        $admin = Admin::find($id);

        $admin->name = $request->input('name');
        $admin->phone = $request->input('phone');
        $admin->email = $request->input('email');
        $admin->address = $request->input('address');
        if($request->input('password')) {
            $admin->password = Hash::make($request->input('pasword'));
        }
        if($request->hasFile('avatar')) {
            // Delete old image
            Storage::delete('public/backend/img/' . $admin->avatar);
            $admin->avatar = $filenameToStore;
        }
        $admin->save();

        return redirect(route('admins.index'))->with('success', 'Admin Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current_user_id = Auth::guard('admin')->user()->id;
        if($current_user_id == $id) {
            return redirect(route('admins.index'))->with('error', 'You can not delete yourself');
        } else {
            $admin = Admin::find($id);
            if($admin->avatar != 'noimage.jpg') {
                // Delete image
                Storage::delete('public/backend/img/' . $admin->avatar);
            }
            $admin->delete();
            return redirect(route('admins.index'))->with('success', 'Admin Deleted Successfully');
        }
    }
}
