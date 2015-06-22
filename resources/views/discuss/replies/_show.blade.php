<li id="reply-{{ $reply->id }}" class="_post" data-author-name='{{ json_encode($reply->author->fullname, JSON_HEX_QUOT|JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS) }}' data-quote-body='{{ json_encode($reply->resource->body, JSON_HEX_QUOT|JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS) }}'>

    <img src="{{ $reply->author->avatar }}" class="" alt="User Image"/>
    <div class="timeline-item {{ $thread->isReplyTheSolution($reply) ? 'solution-border' : '' }}">
     
        <div class="box-tools pull-right">
            <div class="btn-group">
                <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-angle-down"></i></button>
                <ul class="dropdown-menu pull-right m-r-xxs m-t-n-sm" role="menu">
                    @if ($reply->isManageableBy($currentUser))
                        <li><a href="{{ $reply->editUrl }}">Edit</a></li>
                        <li><a href="{{ $reply->deleteUrl }}">Delete</a></li>
                    @endif
                    @if (Auth::check())
                        <li class="divider"></li>
                        <li><a href="#" class="quote _quote_forum_post">Quote</a></li>
                    @endif
                </ul>
            </div>          
        </div>
        <span class="time"><i class="fa fa-clock-o"></i> {{ $reply->created_ago }}</span>
        @if($thread->isReplyTheSolution($reply))
        <div class="time">
            <span class="text-aqua"><i class="fa fa-check-circle-o"></i> Best Answer  </span><span class="dash-divider">—</span>Asker's Choice
        </div>
        @endif
        <h3 class="timeline-header">
            <a href="#">{{ $reply->author->fullname }}</a>    
        </h3>
        <div class="timeline-body edit_tread_area" id="{{ $reply->id }}"">
          {!! $reply->body !!}
        </div>
        <div class='timeline-footer'>
            @if($thread->isQuestion() && $thread->isManageableBy(Auth::user()))
                @if( ! $thread->isSolved())
                    <a class="solution" href="{{ $thread->markAsSolutionUrl($reply->id) }}"><i class="fa fa-check-square"></i> Mark as Solution</a>
                @endif
            @endif
        </div>
    </div>
</li>
