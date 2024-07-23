<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update($request->only('username', 'phone', 'address'));
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
    
    function index(){
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', ['users' => $users]);
    }

    public function registeredUser(){
        $registeredUser = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-user', ['registeredUsers' => $registeredUser]);
    }
    public function show($slug){
        $user = User::where('slug', $slug)->first();
        return view('user-detail', ['user' => $user]);
    }

    public function approve($slug){
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('user-detail/'.$slug)->with('status', 'User Telah Berhasil di aktifkan');
    }

    public function delete($slug){
        $user = User::where('slug', $slug)->first();
        return view('user-delete', ['user' => $user]);
    }

    public function destroy($slug){
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'User Telah Berhasil diHapus');
    }

    public function bannedUser(){
        $bannedUsers = User::onlyTrashed()->get();
        return view('user-banned', ['bannedUsers' => $bannedUsers]);
    }

    public function restore($slug){
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'User Telah Berhasil dIPULIHKAN');
    }

}