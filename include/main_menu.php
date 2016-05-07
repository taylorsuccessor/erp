  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=$main_path;?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
            <li><a href="emploee_dashboard.php"><i class="fa fa-dashboard"></i>dashboard</a></li>
            
            
            <li class="header">Company</li>
            
            <li class="treeview">
              <a href="table_managers.php">
                <i class="fa fa-fw fa-user"></i> <span>managers</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_managers.php"><i class="fa fa-fw fa-plus"></i> add managers</a></li>
                <li><a href="table_managers.php"><i class="fa fa-fw fa-table"></i> managers list</a></li>
              </ul>
            </li>
            
             <li class="treeview">
              <a href="table_department.php">
                <i class="fa fa-fw fa-briefcase"></i> <span>department</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_department.php"><i class="fa fa-fw fa-plus"></i> add department</a></li>
                <li><a href="table_department.php"><i class="fa fa-fw fa-table"></i> department list</a></li>
              </ul>
            </li>
            
            
            <li class="treeview">
              <a href="table_emploee.php">
                <i class="fa fa-fw fa-group"></i> <span>employee</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="add_emploee.php"><i class="fa fa-fw fa-plus"></i> add employee</a></li>
                <li><a href="table_emploee.php"><i class="fa fa-fw fa-table"></i> employee list</a></li>
              </ul>
            </li>
              
            <li class="header"><i class="fa fa-fw fa-group"></i>HR</li>
            
            <li class="treeview">
              <a href="table_leaving.php">
                <i class="fa fa-fw fa-sign-out"></i> <span>leaving</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_leaving.php"><i class="fa fa-fw fa-plus"></i> add leaving</a></li>
                <li><a href="table_leaving.php"><i class="fa fa-fw fa-table"></i> leaving list</a></li>
              </ul>
            </li>
            
            
            <li class="treeview">
              <a href="table_vacation.php">
                <i class="fa fa-fw fa-plane"></i> <span>vacation</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_vacation.php"><i class="fa fa-fw fa-plus"></i> add vacation</a></li>
                <li><a href="table_vacation.php"><i class="fa fa-fw fa-table"></i> vacation list</a></li>
              </ul>
            </li>
            
            
            <li class="treeview">
              <a href="table_quits.php">
                <i class="fa fa-fw fa-times-circle"></i> <span>quits</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_quits.php"><i class="fa fa-fw fa-plus"></i> add quits</a></li>
                <li><a href="table_quits.php"><i class="fa fa-fw fa-table"></i> quits list</a></li>
              </ul>
            </li>
            
            
            <li class="header"><i class="fa fa-fw fa-calendar"></i>Calendar</li>
            
            <li class="treeview">
              <a href="calendar.php">
                <i class="fa fa-fw fa-calendar-o"></i> <span>Calendar</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="calendar.php"><i class="fa fa-fw fa-calendar-o"></i>calendar</a></li>
              </ul>
            </li>
            
            
          
            <li class="header"><i class="fa fa-fw fa-tasks"></i>tasks</li>
            
            <li class="treeview">
              <a href="task_list.php?status=1">
                <i class="fa fa-fw fa-tasks"></i> <span>tasks</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="task_list.php?type=1"><i class="fa fa-fw fa-play"></i>runing task </a></li>
                <li><a href="task_list.php?type=2"><i class="fa fa-fw fa-flag"></i>set by me </a></li>
                <li><a href="task_list.php?type=3"><i class="fa fa-fw fa-users"></i>assisting </a></li>
                <li><a href="task_list.php?type=4"><i class="fa fa-fw fa-stop"></i>closed taskes </a></li>
                <li><a href="task_list.php?type=5"><i class="fa fa-fw fa-bars"></i>all tasks </a></li>
              </ul>
            </li>
                 <li><a href="task_add.php"><i class="fa fa-fw fa-plus"></i>add task </a></li>
            
            <li class="header"><i class="fa fa-fw fa-envelope-o"></i>Emails</li>
            
                 <li><a href="email_compose.php"><i class="fa fa-fw fa-file-text-o"></i>new email </a></li>
            
            <li class="treeview">
              <a href="task_list.php?status=1">
                <i class="fa fa-fw fa-envelope"></i> <span>emails</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="email_inbox.php?type=0"><i class="fa fa-inbox"></i>Inbox </a></li>
                <li><a href="email_inbox.php?type=4"><i class="fa fa-envelope-o"></i>Sent </a></li>
                <li><a href="email_inbox.php?type=2"><i class="fa fa-file-text-o"></i>Drafts </a></li>
                <li><a href="email_inbox.php?type=1"><i class="fa fa-filter"></i>Junk </a></li>
                <li><a href="email_inbox.php?type=3"><i class="fa fa-trash-o"></i>Trash</a></li>
              </ul>
            </li>

            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
