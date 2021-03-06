
<!--========================= Content Wrapper ==============================-->
<!-- start: page -->
<div class="row">
    <section class="panel panel-dark">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action" data-panel-toggle></a> 
            </div>
            <div class="row">
            <div class="col-md-6 text-left"> <h4 class="panel-title">Dashboard</h4> </div> 
            <div class="col-md-6 text-right"> <h4 class="panel-title"> <code>Selamat datang <?php echo $this->session->userdata('USERNAME'); ?></code></h4> </div>
            </div>
        </header>
        
    </section>
    
	<!-- start widget status-->
    <div class="row">
    		<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel panel-featured">
					<div class="panel-body">
						<div class="widget-summary widget-summary-center widget-summary-sm">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-quartenary">
									<i class="fa fa-list"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<strong class="amount">All Project</strong>
									<div class="info">
										<strong class="amount">
										<a href="<?php echo site_url('project')?>">
										<?php
											if ($this->session->userdata('ROLEID') == '1') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_allproject_qt;?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '5') {  
										?>
											<span class="pull-left label label-primary"> <?php echo $jumlah_allproject_kordinator; ?></span>
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
			<div class="col-md-12 col-lg-3 col-xl-3">
				<section class="panel panel-featured-left panel-featured-primary">
					<div class="panel-body">
						<div class="widget-summary widget-summary-sm">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-tertiary">
									<i class="fa fa-spin fa-circle-o-notch"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h2 class="title">Active Project</h2>
									<div class="info">
										<strong class="amount"> 
										<a href="<?php echo site_url('project')?>">
										<?php
											if ($this->session->userdata('ROLEID') == '1') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_project_aktif_qt; ?></span>
										<?php } ?> 
										<?php
											if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '5') {  
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
			<div class="col-md-12 col-lg-3 col-xl-3">
				<section class="panel panel-featured-left panel-featured-primary">
					<div class="panel-body">
						<div class="widget-summary widget-summary-sm">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-primary">
									<i class="fa fa-inbox"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h2 class="title">New Project</h2>
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
											if ($this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '5') {  
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
			<div class="col-md-12 col-lg-3 col-xl-3">
				<section class="panel panel-featured-left panel-featured-primary">
					<div class="panel-body">
						<div class="widget-summary widget-summary-sm">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-secondary">
									<i class="fa fa-warning"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h2 class="title">Expired</h2>
									<div class="info">
										<strong class="amount">
										<a href="<?php echo site_url('project')?>">
										<?php
											if ($this->session->userdata('ROLEID') == '1') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_project_expired_qt; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '5') {  
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
			<div class="col-md-12 col-lg-3 col-xl-3">
				<section class="panel panel-featured-left panel-featured-primary">
					<div class="panel-body">
						<div class="widget-summary widget-summary-sm">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-secondary">
									<i class="fa fa-close"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<a href="<?php echo site_url('project/inactive_project')?>">
									<h2 class="title">In Active (Drop, Closed)</h2>									
									<div class="info">
										<strong class="amount">
										<?php
											if ($this->session->userdata('ROLEID') == '1') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_inactive_qt; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '5') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_inactive_kordinator; ?></span>
										<?php } ?>
										<?php
											if ($this->session->userdata('ROLEID') == '3') {  
										?>
											<span class="pull-left label label-primary"><?php echo $jumlah_inactive_pmo; ?></span>
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
	<!-- End widget status-->


<!-- Start grafik FOR MANAGEMENT-->
<?php
if ($this->session->userdata('ROLEID') == '5') {  
?>	
<!-- Start grafik QT--> 
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
				</div>				
				<h2 class="panel-title">Graph Report QT</h2>
				<p class="panel-subtitle"></p>
			</header>
			<div class="panel-body"> 
				<!-- Morris: Bar -->
				<div class="chart chart-md" id="morrisBarQT"></div> 
				<script type="text/javascript"> 
					var morrisBarData1 = [
						<?php 
							foreach($data_grafiknamaQT as $qt){
						?>

							{
							'namaQT': "<?php echo $qt->nama_qt; ?>",
								<?php
									$dataa1= $this->db->query("SELECT status_project ,jumlah, DATE_FORMAT(pj_summary.datecreated, '%Y-%m-%d') FROM pj_summary WHERE DATE(datecreated) = CURDATE() and nama_qt='".$qt->nama_qt."' ORDER BY status_project DESC")->result();
									foreach($dataa1 as $dg1)
									{
								?>
								"<?php echo $dg1->status_project; ?>": "<?php echo $dg1->jumlah; ?>",
								<?php } ?>
							},
						<?php } ?>
					];
				</script> 
			</div>  
		</section>
	</div>
	<!-- End grafik QT-->
	<!-- Start grafik PMO--> 
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
				</div>				
				<h2 class="panel-title">Graph Report PMO</h2>
				<p class="panel-subtitle"></p>
			</header>
			<div class="panel-body">
				<!-- Morris: Bar -->
				<div class="chart chart-md" id="morrisBarPMO"></div> 
				<script type="text/javascript"> 
					var morrisBarData2 = [
						<?php 
							foreach($data_grafiknamaPMO as $pmo){
						?>

							{
							'namaPMO': "<?php echo $pmo->nama_qt; ?>",
								<?php
									$dataa2= $this->db->query("SELECT status_project ,jumlah, DATE_FORMAT(pj_summary.datecreated, '%Y-%m-%d') FROM pj_summary WHERE DATE(datecreated) = CURDATE() and nama_qt='".$pmo->nama_qt."' ORDER BY status_project DESC")->result();
									foreach($dataa2 as $dg2)
									{
								?>
								"<?php echo $dg2->status_project; ?>": "<?php echo $dg2->jumlah; ?>",
								<?php } ?>
							},
						<?php } ?>
					];
				</script> 
			</div> 
		</section>
	</div>
	<!-- End grafik PMO--> 
<?php } else { ?> 
<!-- Start grafik FOR MANAGEMENT-->

<!-- Start grafik -->
				
<div class="col-md-12">
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
			</div>				
			<h2 class="panel-title">Graph Report</h2>
			<p class="panel-subtitle"></p>
		</header>
		<div class="panel-body">
			<?php
			if ($this->session->userdata('ROLEID') == '1' or $this->session->userdata('ROLEID') == '2') {  
			?>
			<!-- Morris: Bar -->
			<div class="chart chart-md" id="morrisBar"></div>

			<script type="text/javascript">

				var morrisBarData = [
					<?php 
						foreach($data_grafiknamaQT as $d){
					?>

						{
						'namaqt': "<?php echo $d->nama_qt; ?>",
							<?php
								$dataa= $this->db->query("SELECT status_project ,jumlah, DATE_FORMAT(pj_summary.datecreated, '%Y-%m-%d') FROM pj_summary WHERE DATE(datecreated) = CURDATE() and nama_qt='".$d->nama_qt."' ORDER BY status_project DESC")->result();
								foreach($dataa as $dg)
								{
							?>
							"<?php echo $dg->status_project; ?>": "<?php echo $dg->jumlah; ?>",
							<?php } ?>
						},
					<?php } ?>
				];
			</script> 
		</div>
		<?php } ?> 

		<?php
			if ($this->session->userdata('ROLEID') == '3' or $this->session->userdata('ROLEID') == '4') {  
			?>
			<!-- Morris: Bar -->
			<div class="chart chart-md" id="morrisBar"></div>

			<script type="text/javascript">

				var morrisBarData = [
					<?php 
						foreach($data_grafiknamaPMO as $d){
					?>

						{
						'namaqt': "<?php echo $d->nama_qt; ?>",
							<?php
								$dataa= $this->db->query("SELECT status_project ,jumlah, DATE_FORMAT(pj_summary.datecreated, '%Y-%m-%d') FROM pj_summary WHERE DATE(datecreated) = CURDATE() and nama_qt='".$d->nama_qt."' ORDER BY status_project DESC")->result();
								foreach($dataa as $dg)
								{
							?>
							"<?php echo $dg->status_project; ?>": "<?php echo $dg->jumlah; ?>",
							<?php } ?>
						},
					<?php } ?>
				];
			</script> 
		</div>
		<?php } ?> 
	</section>
</div>
<!-- End grafik -->

<?php } ?> 
</div>      
<!-- end: page -->


