      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url("application/assets/img/user2-160x160.jpg")?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="header">MAIN NAVIGATION</li>
				<li class="treeview">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span>Categories</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url("index.php/admin/categories") ?>">View</a></li>
					<li><a href="<?php echo base_url("index.php/admin/categories/create") ?>">Create</a></li>
				</ul>
				<!--
					<a href="#">
						<i class="fa fa-pie-chart"></i>
						<span>Producten</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url("index.php/admin/products/view") ?>">Bekijken</a></li>
						<li><a href="<?php echo base_url("index.php/admin/products/add") ?>">Toevoegen</a></li>
					</ul>
					<li class="treeview">
					<a href="#">
						<i class="fa fa-pie-chart"></i>
						<span>Categorieén</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url("index.php/admin/categories/add") ?>">Toevoegen</a></li>
					</ul>
					<li class="treeview">
					<a href="#">
						<i class="fa fa-pie-chart"></i>
						<span>RMA's</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url("index.php/admin/rma/view") ?>">Bekijken</a></li>
					</ul>
					<li class="treeview">
					<a href="#">
						<i class="fa fa-pie-chart"></i>
						<span>Orders</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url("index.php/admin/orders/view") ?>">Bekijken</a></li>
					</ul>
					-->
			</ul>
        </section>
        <!-- /.sidebar -->
      </aside>
