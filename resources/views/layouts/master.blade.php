@extends('layouts.base')

@section('body')
  <section class="vbox">  
    {{--   
      @include('partials.header')
    --}}
    <section>
      <section class="hbox stretch">
        @include('partials.sidebar')
        <section id="content">
                 
           @yield('content')
          
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>    
  </section>

@endsection