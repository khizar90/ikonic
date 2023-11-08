<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Setting;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view("feedback.index");
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'user_id' => 'required|exists:users,id',
            'description' => 'required',
            'category' => 'required',
        ]);

        $craete = new Feedback();
        $craete->user_id = $request->user_id;
        $craete->title = $request->title;
        $craete->description = $request->description;
        $craete->category = $request->category;
        $craete->save();
        return redirect()->back()->with('success', 'Feedback Added');
    }

    public function list()
    {
        $feedbacks = Feedback::latest()->paginate(20);
        $switch = Setting::latest()->first();
        $switch = $switch->allow_comment;
        foreach ($feedbacks as $item) {
            $vote = Vote::where('user_id', auth()->user()->id)->where('feedback_id', $item->id)->first();
            $votecount = Vote::where('feedback_id', $item->id)->count();
            $feedcount = Comment::where('feedback_id', $item->id)->count();


            $user = User::find($item->user_id);
            $item->user = $user;
            $item->count = $votecount;
            $item->feedcount = $feedcount;
            if ($vote) {
                $item->vote = true;
            } else {
                $item->vote = false;
            }

            
        }
        return view('feedback.show', compact('feedbacks','switch'));
    }

    public function voteFeedback($user_id, $fid)
    {
        $feedback = Feedback::find($fid);
        $user = User::find($user_id);

        if ($user && $feedback) {
            $vote = new Vote();
            $vote->user_id = $user_id;
            $vote->feedback_id = $fid;
            $vote->save();
            return redirect()->back()->with('success', 'Your Vote added');
        }
        return redirect()->back();
    }

    public function comment(Request $request)
    {
        $validated = $request->validate([
            'feedback_id' => 'required|exists:feedback,id',
            'comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->user_name = auth()->user()->name;
        $comment->feedback_id = $request->feedback_id;
        $comment->date = date('Y-m-d');
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', 'Comment Added');
    }
}
