@extends('base')

@section('title', 'Wellcome Back')

@section('content')
        <!-- Main content -->
        <section class="content">
          <!-- row -->
          <div class="row b-b">
            <div class="col-md-3">
              &nbsp;   
            </div>
            <div class="col-md-9 b-l">
              <h3 class="pull-left" style="margin-top: 5px !important;">Forum</h3>
              <div class="box-tools pull-right">   
                <a class="btn btn-danger btn-flat" href="{{ url('forum/create') }}"><i class="fa fa-comments-o"></i> Start a Conversation</a>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
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
            <div class="col-md-9 b-l">
              <ul>
              @foreach ($threads as $thread)
                <li><a href="{{ $thread->url }}"> {{ $thread->subject }}</a></li>
              @endforeach
              </ul>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

@endsection