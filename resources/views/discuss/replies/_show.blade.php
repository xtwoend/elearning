@foreach ($thread->replies as $reply )
<li>
    <img src="/img/user2-160x160.jpg" class="" alt="User Image"/>
    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{ $reply->created_ago }}</span>
        <h3 class="timeline-header"><a href="#">{{ $reply->author->fullname }}</a></h3>
        <div class="timeline-body">
          {!! $reply->body !!}
        </div>
        <div class='timeline-footer'>
            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
        </div>
    </div>
</li>
@endforeach