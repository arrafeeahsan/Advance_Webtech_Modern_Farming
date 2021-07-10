<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class ForumController extends Controller
{
    public function index(){
        return view('forum.forum');
    }

    public function create(Request $req){
        $forum = new Forum;
        $forum->forum_name   = $req->forumname;
        $forum->forum_text   = $req->forumtext;

        $forum->save();
        return redirect()->route('forum.create');
    }

    public function show(){
        return view('forum.forumpost');
    }

    public function list(){
        $forum = Forum::all();
        return view('forum.forumpost')->with('forumpost', $forum);
    }

    public function reply($id){
        $forum = Forum::find($id);
        return view('forum.postreply')->with('forum', $forum);
    }

    public function replyinsert(Request $req, $id){
        $forum = Forum::find($id);

        $forum->forum_reply = $req->forumreply;

        $forum->save();
        //return view('forum.forumpost')->with('forumpost', $forum);
        return redirect()->route('forum.forumpost');
        
    }
}
