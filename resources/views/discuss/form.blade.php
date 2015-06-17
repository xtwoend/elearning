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
              <h3 class="pull-left" style="margin-top: 5px !important;">Start a Conversation</h3>
              
            </div><!-- /.col -->
          </div><!-- /.row -->
          <!-- row -->
          <div class="row">
            <div class="col-md-3">
              <!-- Sidebar Menu -->
              <ul class="sidebar-menu">
                
                <!-- Optionally, you can add icons to the links -->
                <li><a href="{{ url('discuss') }}" class="light"><span>All Thread</span></a></li>
              </ul><!-- /.sidebar-menu -->   
            </div>
            <div class="col-md-9 b-l padder-v">
              @if (count($errors) > 0)           
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                </div>
              @endif
              <!-- Form Thried Forum Modal -->
                <div class="box box-solid">
                  {!! Form::open(['url' => 'discuss', 'method' => 'POST']) !!} 
                    <div class="box-body">
                      <div class="form-group">
                        <label>Give Your Conversation a Title:</label>
                        {!! Form::text('subject', null, ['class'=> 'form-control', 'placeholder'=> 'Enter subject ...']) !!}
                      </div>
                      <div class="form-group">
                        <label>And Start Talking:</label>
                        {!! Form::textarea('body', null, ['class'=> 'form-control', 'placeholder'=> 'Enter desctription ...', 'rows' => 10, ]) !!} 
                        <p class="help-block">* You may use Markdown with GitHub-flavored code blocks.</p>
                      </div>
                      <div class="form-group">
                        <label>Describe your post by clicking up to 3 tags</label>
                        @foreach($tags as $tag)
                          <button class="btn bg-maroon btn-flat margin">{{ $tag->name }}</button>
                        @endforeach
                      </div>
                    </div>
                    <div class="box-footer">                      
                      <button type="submit" class="btn btn-info">Start Conversation</button>
                    </div>
                  {!! Form::close() !!}
                </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

@endsection