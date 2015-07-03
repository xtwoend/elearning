
            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
            <!-- /.search form -->


            
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/') }}"><i class='fa fa-link'></i> <span>Home</span></a></li>
            <li><a href="{{ url('calendar') }}"><i class='fa fa-link'></i> <span>Calendar</span></a></li>
            <li><a href="{{ url('forum') }}"><i class='fa fa-link'></i> <span>Discuss</span></a></li>
            <li><a href="{{ url('quiz') }}"><i class='fa fa-link'></i> <span>Quiz</span></a></li>
            <li class="treeview">
              <a href="#"><i class='fa fa-link'></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>