@extends('base')

@section('title', 'Wellcome Back')

@section('content')
        <!-- Main content -->
        <section class="content">
          
          <!-- row -->
          <div class="row">
            <div class="col-md-3">
              <!-- Sidebar Menu -->
              <ul class="sidebar-menu">
                
                <!-- Optionally, you can add icons to the links -->
                <li><a href="{{ url('discuss') }}" class="light"><span>All Thread</span></a></li>
              </ul><!-- /.sidebar-menu -->   
            </div>
            <div class="col-md-9 padder-v">
              <!-- The time line -->
              <ul class="timeline">
                
                <!-- timeline item -->
                @include('discuss.threads._thread')
                <!-- END timeline item -->
                
                <!-- timeline item -->
                <li>
                  <i class="fa fa-comments bg-aqua"></i>
                  <div class="timeline-item">
                    <span class="time">last reply 5 mins ago by Miaw</span>
                    <h3 class="timeline-header no-border">
                    
                    {{ $thread->replies->count() }} replies with no correct answer yet
                    
                    </h3>
                  </div>
                </li>
                <!-- END timeline item -->
                
                <!-- timeline item -->
                @include('discuss.replies._show')
                <!-- END timeline item -->
           
                <!-- END timeline item -->
                @include('discuss.replies._create')

                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

@endsection