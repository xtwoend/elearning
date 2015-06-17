<?php

namespace App\Http\Controllers\Forum;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Xtwoend\Component\Category\Repositories\TagRepository;
use Xtwoend\Component\Discuss\Repositories\ForumThreadRepository;

class ForumThreadsController extends Controller
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
     * [__construct description]
     * @param TagRepository         $tags    [description]
     * @param ForumThreadRepository $threads [description]
     */
    public function __construct(TagRepository $tags, ForumThreadRepository $threads)
    {
        $this->tags = $tags;
        $this->threads = $threads;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {   
        $tags = $this->tags->all();
        $threads = $this->threads->all();
        return view('discuss.index', compact('tags', 'threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {   
        $tags = $this->tags->all();
        return view('discuss.form', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'subject' => 'required|unique:forum_threads|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('forum/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $thread = $this->threads->createThread($request->all());

        return redirect('forum/'.$thread->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $thread = $this->threads->getBySlug($slug);

        return view('discuss.threads.show', compact('thread'));
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
