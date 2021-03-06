<?php

namespace App\Http\Controllers;

use App\Bug;
use Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Priority;
use App\Resolution;
use App\Comment;
use App\User;

class BugController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // REDIRECT TO HOME
        return redirect('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET ALL CATEGORIES
        $categories = Category::orderBy('title')->get();
        $priorities = Priority::orderBy('sort_no')->get();
        $resolutions = Resolution::orderBy('title')->get();
        return view('bugs.create', compact(['categories', 'priorities', 'resolutions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        Bug::create([
            'created_by_user_id' => $user->id,
            'assigned_to_user_id' => NULL, 
            'category_id' => 1, 
            'status_id' => 1,
            'priority_id' => 1,
            'notify_creator' => 0,
            'description' => $request->description,
            'title' => $request->title
        ]);

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bug = Bug::with(['createdByUser', 'assignedUser', 'category', 'priority', 'resolution', 'status'])->findOrFail($id);

        $comments = Comment::orderBy('created_at', 'desc')->where('bug_id',$id)->with('user')->get();

        return view('bugs.read', compact('bug', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function edit(Bug $bug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bug $bug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bug $bug)
    {
        //
    }
}
