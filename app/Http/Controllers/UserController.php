<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Board;
use App\Models\Profile;

class UserController extends Controller
{
    public function show(int $id)
    {
        $user = User::find($id);
        $boards = Board::where('user_id', $id)->get();

        return view('user.index', compact('user', 'boards'));
    }

    public function profile_update_show()
    {
        $user = Auth::user();

        return view('user.update_show', compact('user'));
    }

    public function update(Request $request)
    {
        $profile = Profile::where('user_id', $request->user_id)->first();
        $profile->fill($request->all())->save();

        return redirect(route('user.show', ['id' => Auth::id()]));
    }
}
