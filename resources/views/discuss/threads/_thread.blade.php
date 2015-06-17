<li>
    <img src="/img/user2-160x160.jpg" class="" alt="User Image"/>
	<div class="timeline-item">
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
