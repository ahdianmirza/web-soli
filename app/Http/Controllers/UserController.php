<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {
    public function index() {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function indexProfileUser() {
        $user = Auth::user();
        return view('user.profile.profile', [
            'user' => $user,
        ]);
    }

    public function updateProfileUser(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255',
            'photo' => 'mimes:png,jpg,jpeg|max:10000',
        ], [
            'name' => 'Nama user masih kosong',
            'email.required' => 'Email masih kosong',
            'email.email' => 'Format email salah',
        ]);

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $fileName = date("d-m-Y") . $photo->getClientOriginalName();
            $filePath = 'photo-user/' . $fileName;
            Storage::disk("public")->put($filePath, file_get_contents($photo));
        }

        $selectedUser = User::find($id);
        $selectedUser->name = $validatedData['name'];
        $selectedUser->email = $validatedData['email'];
        if ($request->file('photo')) {
            $selectedUser->photo = $fileName;
        }
        $selectedUser->save();
        return back()->with('success', 'Data user berhasil diperbarui');
    }

    public function updateProfilePassUser(Request $request, $id) {
        $validatedData = $request->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string',
            'confirmPassword' => 'required|string',
        ], [
            'currentPassword' => 'Current password masih kosong',
            'newPassword' => 'New password masih kosong',
            'confirmPassword' => 'Confirm password masih kosong',
        ]);

        $selectedUser = User::find($id);
        $checkPassword = Hash::check($validatedData['currentPassword'], $selectedUser->password);
        if (!$checkPassword) {
            return back()->with('error', 'Current password tidak sesuai');
        }
        if ($validatedData['newPassword'] != $validatedData['confirmPassword']) {
            return back()->with('error', 'Confirm password tidak sesuai dengan new password');
        }

        $selectedUser->password = bcrypt($validatedData['confirmPassword']);
        $selectedUser->save();
        return back()->with('success', 'Password berhasil diperbarui');
    }
}