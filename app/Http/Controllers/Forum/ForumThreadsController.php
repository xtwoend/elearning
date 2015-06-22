<?php

namespace App\Http\Controllers\Forum;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Xtwoend\Component\Category\Repositories\TagRepository;
use Xtwoend\Component\Discuss\Repositories\ForumThreadRepository;
use Xtwoend\Component\Discuss\Repositories\ForumReplyRepository;
use Xtwoend\Component\Discuss\Jobs\ForumThreadCreator;
use Xtwoend\Component\Discuss\Jobs\ForumThreadCreatorListener;
use Xtwoend\Component\Discuss\Jobs\ForumThreadUpdater;
use Xtwoend\Component\Discuss\Jobs\ForumThreadUpdaterListener;
use Xtwoend\Component\Discuss\Presenter\ThreadPresenter;

class ForumThreadsController extends Controller implements 
    ForumThreadCreatorListener,
    ForumThreadUpdaterListener
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
     */
    public function __construct(
        TagRepository $tags, 
        ForumThreadRepository $threads, 
        ForumReplyRepository $replies
    )
    {
        $this->tags = $tags;
        $this->threads = $threads;
        $this->replies = $replies;

        view()->share('currentUser', \Auth::user());
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {   
        $tags = $this->tags->all();
        
        $threads = $this->threads->getThreadsPagging($request, 10);

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
        return view('discuss.threads.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'body' => 'required',
            'tags' => 'required'
        ]);
       
        $command = \App::make('Xtwoend\Component\Discuss\Jobs\ForumThreadCreator');
        return $command->create($this ,
            [
                'subject' => $request->get('subject'),
                'body' => $request->get('body'),
                'author' => \Auth::user(),
                'is_question' => $request->get('is_question', 0),
                'tags' => $request->get('tags'),
                'ip' => $request->ip()
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $tags       = $this->tags->all();
        $thread     = $this->threads->getBySlug($slug);
        $replies    = $this->threads->getThreadRepliesPaginated($thread, 20);
        
        return view('discuss.threads.show', compact('thread','replies', 'tags'));
    }

    /**
     * [getMarkQuestionSolved description]
     * @param  [type] $threadId [description]
     * @param  [type] $replyId  [description]
     * @return [type]           [description]
     */
    public function getMarkQuestionSolved($threadId, $replyId)
    {   
        $thread = $this->threads->find($threadId);

        if ( ! $thread->isQuestion() || ! $thread->isManageableBy(\Auth::user())) {
            return back();
        }

        $reply = $this->replies->find($replyId);

        if ( ! $reply || $reply->thread_id != $thread->id) {
            return back();
        }

        $command = \App::make('Xtwoend\Component\Discuss\Jobs\ForumThreadUpdater');
        return $command->update($this , $thread, [
                'solution_reply_id' => $reply->id,
        ]);
    }

    /**
     * [getMarkQuestionUnsolved description]
     * @param  [type] $threadId [description]
     * @return [type]           [description]
     */
    public function getMarkQuestionUnsolved($threadId)
    {
        $thread = $this->threads->find($threadId);

        if ( ! $thread->isQuestion() || ! $thread->isManageableBy(\Auth::user())) {
            return redirect($thread->url);
        }

        $command = \App::make('Xtwoend\Component\Discuss\Jobs\ForumThreadUpdater');
        return $command->update($this , $thread, [
                'solution_reply_id' => null,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {   
        $tags = $this->tags->all();
        $thread = $this->threads->find($id);
        return view('discuss.threads.edit', compact('tags', 'thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {   
        $thread = $this->threads->find($request->get('id'));

        if ( ! $thread->isQuestion() || ! $thread->isManageableBy(\Auth::user())) {
            return redirect($thread->url);
        }

        $command = \App::make('Xtwoend\Component\Discuss\Jobs\ForumThreadUpdater');
        return $command->updateRaw($this, $thread, [
            'body' => $request->get('body'),
        ]);
    }

    /**
     * [threadUpdatedJson description]
     * @param  [type] $thread [description]
     * @return [type]         [description]
     */
    public function threadUpdatedJson($thread)
    {
        $thread = new ThreadPresenter($thread);
        return $thread->body;
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

    /**
     * [threadUpdateError description]
     * @param  [type] $errors [description]
     * @return [type]         [description]
     */
    public function threadUpdateError($errors)
    {
        return back()->withErrors($errors)->withInput();
    }

    /**
     * [threadUpdated description]
     * @param  [type] $thread [description]
     * @return [type]         [description]
     */
    public function threadUpdated($thread)
    {
        $thread = new ThreadPresenter($thread);
        return redirect($thread->url); 
    }

    /**
     * [threadCreationError description]
     * @param  [type] $errors [description]
     * @return [type]         [description]
     */
    public function threadCreationError($errors)
    {
        return back()->withErrors($errors)->withInput();
    }

    /**
     * [threadCreated description]
     * @param  [type] $thread [description]
     * @return [type]         [description]
     */
    public function threadCreated($thread)
    {
        $thread = new ThreadPresenter($thread);

        return redirect($thread->url); 
    }
}
