<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Lấy thông tin user hiện tại
    public function show(Request $request)
    {
        return response()->json($request->user());
    }

    // Cập nhật hồ sơ cá nhân
    public function update(Request $request)
    {
        $user = $request->user();

        // Validate dữ liệu
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8|confirmed',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'Cập nhật thành công',
            'user' => $user,
        ]);
    }
}