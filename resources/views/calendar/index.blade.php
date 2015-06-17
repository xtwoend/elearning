@extends('base')

@section('title', 'Wellcome Back')

@section('css')
  <link href="/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
@endsection

@section('js')

  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <!-- fullCalendar 2.2.5 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
  <script src="/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>

  <!-- bootstrap datetime picker -->
  <script src="/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

  {!! $calendar->script() !!}


  <script type="text/javascript">
    //SLIMSCROLL FOR CHAT WIDGET
    $('#ongoingevent-box').slimScroll({
      height: '250px'
    });

    $(function () {
      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
      });

      //color picker with addon
      $(".my-colorpicker2").colorpicker();

      //datetime picker
      $('#startdate').datetimepicker({format: "YYYY-MM-DD hh:mm:ss"});
      $('#enddate').datetimepicker({format: "YYYY-MM-DD hh:mm:ss"});
    });
  </script>
@endsection

@section('content')
        <!-- Main content -->
        <section class="content">
          <!-- row -->
          <div class="row">
            <div class="col-md-9">
              {!! $calendar->calendar() !!}
            </div><!-- /.col -->
            <div class="col-md-3">
              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Event On Going</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-toggle="modal" data-target="#createEvent"><i class="fa fa-plus"></i></button>                   
                  </div>
                </div>
                <div class="box-body chat" id="ongoingevent-box">

                  @foreach($events as $event) 
                  <!-- event item -->
                  <div class="item">
                      <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $event->start->format('H:i') }}</small>
                        <span class="font-bold">{{ $event->title }}</span>
                      </a>
                      <p>{{ $event->description }}</p>
                  </div><!-- /.item -->
                  @endforeach
                </div><!-- /.chat -->
                <div class="box-footer text-right">
                    <a href="#" class="uppercase">more...</a>
                </div>
              </div><!-- /.box (chat box) -->
            </div>
          </div><!-- /.row -->
        </section><!-- /.content -->


        <!-- Form Event Modal -->
        <div class="modal fade" id="createEvent" tabindex="-1" role="dialog" aria-labelledby="eventModal" aria-hidden="true">
          <div class="modal-dialog">
            {!! Form::open(['url' => 'calendar', 'method' => 'POST']) !!} 
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Events</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  {!! Form::text('title', null, ['class'=> 'form-control', 'placeholder'=> 'Enter Title ...']) !!}
                </div>
                <div class="form-group">
                  {!! Form::text('url', null, ['class'=> 'form-control', 'placeholder'=> 'Enter Url ...']) !!}
                </div>
                <div class="form-group">
                  {!! Form::textarea('description', null, ['class'=> 'form-control', 'placeholder'=> 'Enter desctription ...', 'rows' => 3]) !!} 
                </div>
                <!-- checkbox -->
                <div class="form-group">
                  <label>
                    {!! Form::checkbox('all_day', 1, null,  ['class'=>'minimal']) !!}
                    All Day
                  </label>
                </div>
                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      {!! Form::text('start', null, ['class'=> 'form-control', 'placeholder'=> 'Start Date...', 'id' => 'startdate']) !!}
                  </div><!-- /.input group -->
                </div>
                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      {!! Form::text('end', null, ['class'=> 'form-control', 'placeholder'=> 'End Date...', 'id' => 'enddate']) !!}
                  </div><!-- /.input group -->
                </div>
                <div class="form-group">
                  <div class="input-group my-colorpicker2 colorpicker-element">
                    {!! Form::text('background_color', null, ['class'=> 'form-control', 'placeholder'=> 'Label Color...']) !!}
                    <div class="input-group-addon">
                      <i style="background-color: rgb(0, 0, 0);"></i>
                    </div>
                  </div><!-- /.input group -->
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Save</button>
              </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
@endsection

