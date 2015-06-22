<li id="reply_form">
    <img src="{{ Auth::user()->avatar }}" class="" alt="User Image"/>
    <div class="timeline-item">
        <div class="timeline-body">
            {!! Form::open(['url' => 'forum/'. $thread->slug , 'method' => 'POST']) !!} 
            <div class="form-group">
                {!! Form::textarea('body', null, ['class'=> 'form-control _tab_indent _reply_form', 'rows' => 10 ]) !!}
                <small class="text-danger">{{ $errors->first('body') }}</small> 
                <p class="help-block">Use Markdown with GitHub-flavored code blocks.</p>
            </div>
            <div class='timeline-footer text-right'>
                <button type="submit" class="btn btn-warning btn-flat">Post Your Reply</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</li>