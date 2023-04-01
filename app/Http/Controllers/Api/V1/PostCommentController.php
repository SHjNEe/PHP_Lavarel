<?php

namespace App\Http\Controllers\Api\V1;

use App\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Comment as CommentsResource;


class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogPost $post, Request $request)
    {
        $perPage = (int) $request->input('per_page') ?? 15;
        // return response()->json(['comments' => []]);
        return CommentsResource::collection(
            $post->comments()->with('user')->paginate($perPage)->appends([
                // http://127.0.0.1:8000/api/v1/posts/1/comments?per_page=2&page=2
                'per_page' => $perPage
            ])
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
