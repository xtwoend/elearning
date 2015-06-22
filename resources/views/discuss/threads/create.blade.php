@extends('base')

@section('title', 'Create Conversation')

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
                <li><a href="{{ url('forum') }}" class="light"><span>All Thread</span></a></li>
              </ul><!-- /.sidebar-menu -->   
            </div>
            <div class="col-md-9 b-l padder-v">

              <!-- Form Thried Forum Modal -->
                <div class="box box-solid">
                  {!! Form::open(['url' => 'forum', 'method' => 'POST', 'name' => 'thread']) !!} 
                    <div class="box-body">
                      
                      <div class="form-group">
                        <label>Give Your Conversation a Title:</label>
                        {!! Form::text('subject', null, ['class'=> 'form-control', 'placeholder'=> 'Enter subject ...']) !!}
                        <small class="text-danger">{{ $errors->first('subject') }}</small>
                      </div>
                      <div class="form-group">
                        <label>And Start Talking:</label>
                        {!! Form::textarea('body', null, ['class'=> 'form-control', 'placeholder'=> 'Enter desctription ...', 'rows' => 10, ]) !!} 
                        <small class="text-danger">{{ $errors->first('body') }}</small>
                        <p class="help-block">* You may use Markdown with GitHub-flavored code blocks.</p>
                      </div>
                      <div class="form-group">
                          <label>What type of thread is this?</label>
                          <div class="block">
                            <label class="font-normal">
                              {!! Form::radio('is_question', 1, true, ['class="minimal"']) !!} Question
                            </label>
                            <label class="font-normal">
                              {!! Form::radio('is_question', 0, false, ['class="minimal"']) !!} Conversation
                            </label>
                          <div class="block">                                
                          <small class="text-danger">{{ $errors->first('is_question') }}</small>
                      </div>
                      <div class="form-group">
                        <label>Describe your post by clicking up to 3 tags</label>
                        <small class="text-danger">{{ $errors->first('tags') }}</small>
                      </div>
                      <div class="block">
                        @foreach($tags as $tag)
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-primary btn-flat btn-sm">
                            {!! Form::checkbox('tags[]', $tag->slug, false) !!} {{ $tag->name }}
                          </label>
                        </div>
                        @endforeach
                      </div>
                      <div class="form-group pull-right">
                         <button type="submit" class="btn btn-info">Start Conversation</button>
                      </div>
                    </div>
                  {!! Form::close() !!}
                </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

@endsection

@section('js')
<!-- iCheck 1.0.1 -->

<script src="/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script type="text/javascript">    
  $(function(){
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
  });
</script>
<script type="text/javascript">

/***********************************************
* Limit number of checked checkboxes script- by JavaScript Kit (www.javascriptkit.com)
* This notice must stay intact for usage
* Visit JavaScript Kit at http://www.javascriptkit.com/ for this script and 100s more
***********************************************/

function checkboxlimit(checkgroup, limit){
  var checkgroup=checkgroup
  var limit=limit
  for (var i=0; i<checkgroup.length; i++){
    checkgroup[i].onclick=function(){
    var checkedcount=0
    for (var i=0; i<checkgroup.length; i++)
      checkedcount+=(checkgroup[i].checked)? 1 : 0
    if (checkedcount>limit){
      alert("You can only select a maximum of "+limit+" checkboxes")
      this.checked=false
      }
    }
  }
}

$(function(){

  checkboxlimit($("input[name='tags']"), 2)

});
</script>  
@endsection