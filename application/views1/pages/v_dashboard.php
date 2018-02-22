
<!--========================= Content Wrapper ==============================-->
<!-- start: page -->
<div class="row">
    <section class="panel panel-dark">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a> 
            </div>

            <h2 class="panel-title">Dashboard</h2>
        </header>
        <div class="panel-body">
            <h4><code>Selamat datang <?php echo $this->session->userdata('USERNAME'); ?></code></h4>
        </div>
    </section>
    
    <div class="row">
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-featured-left panel-featured-primary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-primary">
									<i class="fa fa-inbox"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">New Project</h4>
									<div class="info">
										<strong class="amount"> 
										<a href="<?php echo site_url('project')?>">
										<?php
											if ($this->session->userdata('ROLEID') == '1') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_new_project_qt; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '2') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_new_project; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '3') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_new_project_pmo; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '4') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_new_project_pmo_kordinator; ?></span>
										<?php } ?>
										</strong> 
									</div>
								</div> 
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-featured-left panel-featured-secondary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-secondary">
									<i class="fa fa-warning"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">Expired</h4>
									<div class="info">
										<strong class="amount">
										<a href="<?php echo site_url('project')?>">
										<?php
											if ($this->session->userdata('ROLEID') == '1') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_project_expired_qt; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_all_project_expired; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '3') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_project_expired_pmo; ?></span>
										<?php } ?> 
										</strong> 
									</div>
								</div> 
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-featured-left panel-featured-tertiary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-tertiary">
									<i class="fa fa-spin fa-circle-o-notch"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">Active Project</h4>
									<div class="info">
										<strong class="amount"> 
										<a href="<?php echo site_url('project')?>">
										<?php
											if ($this->session->userdata('ROLEID') == '1') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_project_aktif_qt; ?></span>
										<?php } ?> 
										<?php
											if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_all_project_aktif; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '3') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_project_aktif_pmo; ?></span>
										<?php } ?> 
										</strong>
									</div>
								</div> 
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-featured-left panel-featured-quartenary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-quartenary">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">All Project</h4>
									<div class="info">
										<strong class="amount">
										<a href="<?php echo site_url('project')?>">
										<?php
											if ($this->session->userdata('ROLEID') == '1') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_allproject_qt; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_allproject_kordinator; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '3') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_allproject_pmo; ?></span>
										<?php } ?>
										</strong>
									</div>
								</div> 
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
                    
<!-- end: page -->




