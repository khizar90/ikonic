<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $total = User::count();
        $todayActive = 0;
        $feedback = Feedback::count();

        $todayNew = User::whereDate('created_at', date('Y-m-d'))->count();
        return view('admin.dashboard', compact('total', 'todayNew', 'feedback'));
    }


    public function users(Request $request)
    {
        $users = User::latest()->Paginate(20);

        if ($request->ajax()) {
            $query = $request->input('query');

            $users  = User::query();
            if ($query) {

                $users = $users->where('name', 'like', '%' . $query . '%');
            }
            $users = $users->latest()->Paginate(20);
            return view('admin.user.user-ajax', compact('users'));
        }
        return view('admin.user.index', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User Deleted');
        }
    }

    public function feedback()
    {
        $feedbacks = Feedback::latest()->paginate(20);

        foreach ($feedbacks  as $item) {
            $user = User::find($item->user_id)->first();
            $item->user = $user;
        }

        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function feedbackDelete($id)
    {
        $user = Feedback::findOrFail($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Feedback Deleted');
        }
    }

    public function enableCommenShow()
    {
        $switch = Setting::latest()->first();

        $switch = $switch->allow_comment;
        return view('admin.comment', compact('switch'));
    }

    public function enableCommenCreate(Request $request)
    {
        $switch = Setting::latest()->first();
        if ($request->switch == 1) {
            $switch->allow_comment = 1;
            $switch->save();
        } else {
            $switch->allow_comment = 0;
            $switch->save();

        }
        return redirect()->back()->with('success', 'Comment Updated');

    }
}
