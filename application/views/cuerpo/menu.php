	  <!--sidebar start-->
	  <aside>
		  <div id="sidebar"  class="nav-collapse ">
			  <!-- sidebar menu start-->
			  <ul class="sidebar-menu">
			  		<li class="">
						  <a class="" href="<?php echo base_url('inicio/principal') ?>">
							  <i class="fa fa-home"></i>
							  <span>Inicio</span>
						  </a>
					  </li>
					<?php foreach ($menu as $m): ?>
						<li class="sub-menu">
							<a href="<?php echo base_url($m->controlador) ?>">
								<i class="<?php echo $m->icono ?>"></i>
								<span><?php echo $m->menu ?></span>
							</a>
						</li>
					<?php endforeach ?>
			  </ul>
			  <!-- sidebar menu end-->
		  </div>
	  </aside>
