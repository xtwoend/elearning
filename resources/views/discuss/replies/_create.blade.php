<li>
    <img src="/img/user2-160x160.jpg" class="" alt="User Image"/>
    <div class="timeline-item">
        <div class="timeline-body">
            {!! Form::open(['url' => 'forum/'. $thread->slug , 'method' => 'POST']) !!} 
            <div class="form-group">
                {!! Form::textarea('body', null, ['class'=> 'form-control', 'rows' => 10 ]) !!} 
                <p class="help-block">Use Markdown with GitHub-flavored code blocks.</p>
            </div>
            <div class='timeline-footer'>
                <button type="submit" class="btn btn-warning btn-flat">Post Your Reply</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</li>