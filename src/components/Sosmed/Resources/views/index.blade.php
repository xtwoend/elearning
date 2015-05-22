@extends('layouts.master')

@section('content')
<section class="hbox stretch">
  <section>
  <section class="vbox">  
  <section class="scrollable padder padder-v" id="bjax-target">
  	<div class="col-lg-8 col-md-8 col-sm-8">
  				<section class="comment-body panel panel-default">
  					<form ajax-form action="{{ url('posts') }}" method="POST">
                <div class="panel-body no-padder">
                  <textarea name="post_body" placeholder="Tulis catatan anda disini" class="form-control b-non f-n-b"></textarea>
                </div>
                <footer class="panel-footer bg-white">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary btn-xs">Kirim</button>
                  </div>
                  <ul class="list-inline footer-menu">
                      <li><a href="#"><i class="fa fa-camera i-md"></i></a></li>
                      <li><a href="#"><i class="fa fa-user i-md"></i></a></li>
                      <li><a href="#"><i class="fa fa-paperclip i-md"></i></a></li>
                  </ul>
                </footer>
            </form>
  				</section>

          <div id="status-list"></div>
     </div>
     <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
        <!-- widgets -->
                    <section class="panel panel-default no-border">
                      <section class="chat-list panel-body no-padder">
                        <img src="images/m15.jpg" class="img-full"> 
                        <h5 class="padder font-bold">Widget title</h5>
                        <p class="padder">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                        </p>                  
                      </section>
                    </section>
                    <!-- /widgets -->
          <!-- widgets -->
                    <section class="panel panel-default">
                      <section class="chat-list panel-body no-padder">
                        <img src="images/p0.jpg" class="img-full"> 
                        <p class="padder">

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.

                        </p>                  
                      </section>
                    </section>
                    <!-- /widgets -->
        <!-- widgets -->
                    <section class="panel panel-default">
                      <section class="chat-list panel-body no-padder">
                        <img src="images/p0.jpg" class="img-full"> 
                        <p class="padder">  
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                        </p>                  
                      </section>
                    </section>
                    <!-- /widgets -->
     </div>
  </section>
  </section>
  </section>
  <!-- side content -->
  <aside class="aside-md bg-light dk" id="sidebar">
              <section class="vbox animated fadeInRight">
                <section class="w-f-md scrollable hover">
                  <ul class="list-group no-bg no-borders auto m-t-n-xxs">
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a1.png" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Chris Fox</a></div>
                        <small class="text-muted">New York</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a2.png" alt="...">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Amanda Conlan</a></div>
                        <small class="text-muted">France</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a3.png" alt="...">
                        <i class="busy b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Dan Doorack</a></div>
                        <small class="text-muted">Hamburg</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a4.png" alt="...">
                        <i class="away b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Lauren Taylor</a></div>
                        <small class="text-muted">London</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a5.png" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Chris Fox</a></div>
                        <small class="text-muted">Milan</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a6.png" alt="...">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Amanda Conlan</a></div>
                        <small class="text-muted">Copenhagen</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a7.png" alt="...">
                        <i class="busy b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Dan Doorack</a></div>
                        <small class="text-muted">Barcelona</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a8.png" alt="...">
                        <i class="away b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Lauren Taylor</a></div>
                        <small class="text-muted">Tokyo</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a9.png" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Chris Fox</a></div>
                        <small class="text-muted">UK</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a1.png" alt="...">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Amanda Conlan</a></div>
                        <small class="text-muted">Africa</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a2.png" alt="...">
                        <i class="busy b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Dan Doorack</a></div>
                        <small class="text-muted">Paris</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a3.png" alt="...">
                        <i class="away b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="#">Lauren Taylor</a></div>
                        <small class="text-muted">Brussels</small>
                      </div>
                    </li>
                  </ul>
                </section>
                <footer class="footer">
                  <form class="" role="search">
                    <div class="form-group clearfix m-b-none">
                      <div class="input-group m-t m-b">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-sm bg-empty text-muted btn-icon"><i class="fa fa-search"></i></button>
                        </span>
                        <input type="text" class="form-control input-sm text-white bg-empty b-b b-dark no-border" placeholder="Search members">
                      </div>
                    </div>
                  </form>
                </footer>
              </section>              
  </aside>
            <!-- / side content -->
</section>

@endsection


@section('js')
<script type="text/jsx">
  
   var StatusBox = React.createClass({
    loadCommentsFromServer: function() {
      $.ajax({
        url: this.props.url,
        dataType: 'json',
        cache: false,
        success: function(data) {
          this.setState({data: data});
        }.bind(this),
        error: function(xhr, status, err) {
          console.error(this.props.url, status, err.toString());
        }.bind(this)
      });
    },
    getInitialState: function() {
      return {data: []};
    },
    componentDidMount: function() {
      this.loadCommentsFromServer();
      setInterval(this.loadCommentsFromServer, this.props.pollInterval);
    },
    render: function() {
      return (
        <div className="statusList">
          <StatusList data={this.state.data} />
        </div>
      );
    }
  });

  var StatusList = React.createClass({
    render: function() {
      var statusNodes = this.props.data.map(function (status) {
        return (
          <Status avatar={status.user.avatar} author={status.user.first_name + ' ' + status.user.last_name} key={status.id} datetime={status.created_at} postid={status.id}>
            {status.post_body}
          </Status>
        );
      });
      return (
        <section className="comment-list block">
          {statusNodes}
        </section>
      );
    }
  });

  var Status = React.createClass({
    render: function() {
      return (
        <article id="comment-id-1" className="comment-item">
          <a className="pull-left thumb-sm avatar">
            <img src={this.props.avatar} className="img-circle" alt="..."></img>
          </a>
          <span className="arrow left"></span>
          <section className="comment-body panel panel-default">
            <header className="panel-heading bg-white">
              <span className="text-muted m-l-sm pull-right">
                <a href="#" data-toggle="popover" data-html="true" data-placement="top" data-content="<div class='scrollable' style='height:40px'>Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus.</div>" title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Popover on top'><i className="fa fa-angle-down"></i></a>
              </span>
              <h5 className="block font-bold status-header">
                <a href="#">{this.props.author}</a>
              </h5>
              <label className="text-muted">
                {this.props.datetime}
              </label> 
            </header>
            <div className="panel-body">
              <div>
                {this.props.children}
              </div>
              <div className="comment-action m-t-sm text-xs ">
                <a href="#" className="active text-primary">Suka</a> 
                <span className="sparator"> </span>
                <a href={'#comment-' + this.props.postid} className="text-primary">Komentar</a> 
                <span className="sparator"> </span>
                <a href={'#comment-' + this.props.postid} className="text-primary">Bagikan</a>
              </div>
            </div>
          </section>
        </article>
      );
    }
  });

  React.render(
    <StatusBox url="status" pollInterval={2000} />,
    document.getElementById('status-list')
  );
</script>
@endsection