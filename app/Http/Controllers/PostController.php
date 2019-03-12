<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request){
        \App\User::find($request->get('id'))->update(['gender'=>$request->get('gender')]);
        return \response()->json(['done'=>true]);
    }
    public function index()
    {
        //
        $userids = \App\User::where('gender',\Auth::user()->gender)->pluck('id')->toArray();
        $data['posts'] = \App\Post::whereIn('user_id',$userids)->orderBy('id','desc')->get();
        return view('Timeline',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $data=$request->all();
        $data['user_id'] = \Auth::user()->id;
       $in['post'] =  \App\Post::create($data);
        return view('post',$in);
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    //     $data['post']
    //     return view('editPost',$data);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
       $data=$request->all();
       $post =  \App\Post::find($id)->update($data);
        dd($post);
    }
    
    public function makeComment(Request $request){
        $data = $request->all();
        $comment = \App\Comment::create($data);
        dd($comment);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         \App\Post::destroy($id);
            return " done";
    }
}
