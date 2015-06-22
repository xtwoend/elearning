@extends('base')

@section('title', 'Wellcome Back')

@section('content')
        <!-- Main content -->
        <section class="content">
          
          <!-- row -->
          <div class="row">
            <div class="col-md-3">
              <!-- Sidebar Menu -->
              <ul>
                
                <!-- Optionally, you can add icons to the links -->
                <li><a href="{{ url('forum') }}" class="light"><span>All Thread</span></a></li>
                @foreach ($tags as $tag)
                <li><a href="{{ url('forum?tags='.$tag->slug) }}">{{ $tag->name }}</a></li>
                @endforeach
              </ul><!-- /.sidebar-menu -->   
            </div>
            <div class="col-md-9 padder-v">
              <!-- The time line -->
              <ul class="timeline">                
                @if(Input::get('page', 1) < 2)
                <!-- timeline item -->
                @include('discuss.threads._thread')
                <!-- END timeline item -->                
                <!-- timeline item -->
                <li>
                  <i class="fa fa-comments bg-aqua"></i>
                  <div class="timeline-item">
                    @if($thread->reply_count > 0)
                      <span class="time">last reply {{ $thread->mostRecentReply->created_ago }} by {{ $thread->mostRecentReply->author->fullname }}</span>
                    @endif 
                    <h3 class="timeline-header no-border">
                    
                    {{ $thread->reply_count }} replies 
                    @if($thread->isQuestion())
                      @if($thread->isSolved())
                        with 1 <a href="{{ $thread->acceptedSolution->url }}">correct answer</a>
                      @else
                        no correct answer yet
                      @endif
                    @endif
                    </h3>
                  </div>
                </li>
                @endif
                {{-- 
                @if($thread->isSolved() && $thread->isQuestion())
                  @include('discuss.replies._show', ['reply'=> $thread->acceptedSolution])
                @endif
                --}}

                <!-- END timeline item -->
                @foreach ($replies as $reply)
                  @include('discuss.replies._show')
                @endforeach
                <!-- timeline item -->
                
                @if(Auth::check())
                  @include('discuss.replies._create')
                @endif
                
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
              <div class="pagging">{!! $replies->render() !!}</div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

@endsection