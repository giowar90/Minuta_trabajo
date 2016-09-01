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
							<a <?php echo $m->controlador== ""? '' : 'href="'.base_url($m->controlador).'"' ?>>
								<i class="<?php echo $m->icono ?>"></i>
								<span><?php echo $m->menu ?></span>
								<?php echo $m->controlador==""? '<span class="menu-arrow arrow_carrot-right"></span>' : '' ?>
							</a>
							<ul class="sub">
								<?php $submenu = $this->db->select('*')->from('submenu')->where('id_menu',$m->id_menu)->get()->result(); ?>
								<?php foreach ($submenu as $s): ?>
									<li>
										<a class="" href="<?php echo base_url($s->controlador) ?>">
											<?php echo $s->menu ?>
										</a>
									</li>
								<?php endforeach ?>
							</ul>
						</li>
					<?php endforeach ?>
			</ul>
			<!-- sidebar menu end-->
		</div>
	</aside>
