<li>
    <img src="{{ $thread->author->avatar }}" class="" alt="User Image"/>
	<div class="timeline-item">
	    <div class="box-tools pull-right">
            <div class="btn-group">
               	<button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-angle-down"></i></button>
                <ul class="dropdown-menu pull-right m-r-xxs m-t-n-sm" role="menu">
                    @if ($thread->isManageableBy($currentUser))
			            <li><a href="{{ $thread->editUrl }}">Edit</a></li>
			            <li><a href="{{ $thread->deleteUrl }}">Delete</a></li>
			            @if($thread->isQuestion() && $thread->isSolved())
			                <li><a href="{{ $thread->markAsUnsolvedUrl }}">Mark Unsolved</a></li>
			            @endif
			        @endif
			        @if (Auth::check())
			            <li class="divider"></li>
			            <li><a href="#" class="quote _quote_forum_post">Quote</a></li>
			        @endif
                </ul>
			</div>        	
        </div>
        <span class="time"><i class="fa fa-clock-o"></i> {{ $thread->created_ago }}</span>
	    <h3 class="timeline-header"><a href="{{ $thread->url }}"> {{ $thread->subject }}</a></h3>
	    <div class="timeline-body">
	    	{!! $thread->body !!}
	    </div>
	    <div class='timeline-footer text-r '>
            {{ $thread->author->fullname }}<span class="dash-divider">—</span> 100 point
        </div>
	</div>
</li>