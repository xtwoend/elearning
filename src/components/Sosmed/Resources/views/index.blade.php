@extends('layouts.master')

@section('content')
<section class="scrollable padder-md" id="bjax-target">
	<div class="col-lg-6">

				<section class="comment-body panel panel-default">
					<form ajax-form action="{{ url('posts') }}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-body no-padder">
                         <textarea name="post_body" placeholder="Tulis catatan anda disini" class="form-control b-non f-n-b"></textarea>
                        </div>
                        <footer class="panel-footer bg-white">
                        	&nbsp;
                        	<button type="submit" class="btn btn-primary btn-xs pull-right">Kirim</button>
                        </footer>
                	</form>
				</section>

        <div id="status-list"></div>
   </div>
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
                <i className="fa fa-clock-o"></i>
              </span>
              <span className="block font-bold">
                <a href="#">{this.props.author}</a>
              </span>
              <label className="text-muted m-l-smm-l-xs">
                {this.props.datetime}
              </label> 
            </header>
            <div className="panel-body">
              <div>
                {this.props.children}
              </div>
              <div className="comment-action m-t-sm">
                <a href="#" data-toggle="class" className="active">Like</a> -
                <a href={'#comment-' + this.props.postid} className="">Reply</a>
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