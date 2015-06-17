<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Xtwoend\Component\Category\Repositories\TagRepository;
use Xtwoend\Component\Discuss\Repositories\ForumThreadRepository;
use Xtwoend\Component\Discuss\Repositories\ForumReplyRepository;

class ForumRepliesController extends Controller
{   
    /**
     * [$tags description]
     * @var [type]
     */
    protected $tags;

    /**
     * [$threads description]
     * @var [type]
     */
    protected $threads;

    /**
     * [$replies description]
     * @var [type]
     */
    protected $replies;

    /**
     * [__construct description]
     * @param TagRepository         $tags    [description]
     * @param ForumThreadRepository $threads [description]
     * @param ForumReplyRepository  $replies [description]
     */
    public function __construct(TagRepository $tags, ForumThreadRepository $threads, ForumReplyRepository $replies)
    {
        $this->tags = $tags;
        $this->threads = $threads;
        $this->replies = $replies;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, $threadSlug)
    {   
        $thread = $this->threads->requireBySlug($threadSlug);

        $validator = \Validator::make($request->all(), [
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('forum/'.$thread->slug)
                        ->withErrors($validator)
                        ->withInput();
        }

        $thread = $this->replies->createThread($request->all());

        return redirect('forum/'.$thread->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
