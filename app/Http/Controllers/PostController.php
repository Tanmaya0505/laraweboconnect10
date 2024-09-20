<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'contain'=>'required'
        ]);

        $event = new Post;
        $event->title = $request->title;
        $event->user_id = $request->userid;
        $event->post = $request->contain;
        $event->status = 0;

        $success=$event->save();
        if($success){
            return back()->with('success','Post Has Been Add successfully');
        }
        else {
            return back()->with('fail','This Post is not add register.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post,$id)
    {

        $active= Post::where('id', $id)->update([
            'status' => 1,
            ]);
         if($active) {
            return redirect('/dashboard');
         }

    }

    public function inactive(Request $request, Post $post,$id)
    {

        $inactive= Post::where('id', $id)->update([
            'status' => 0,
            ]);
         if($inactive) {
            return redirect('/dashboard');
         }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post,$id)
    {
        $delete= Post::where('id', $id)->delete();
        if($delete) {
            return redirect('/dashboard');
         }
    }
}
