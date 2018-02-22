 <section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a> 
        </div>
        <h2 class="panel-title">View Project</h2>
    </header>
	<div class="panel-body">
    <?php
	  if(isset($data_project)){
		foreach($data_project as $dp){
	?>
	    <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate"> 
	        <input type="hidden" name="kd_project" class="form-control" value="<?php echo $dp->kd_project;?>" readonly="readonly"/>
	        <div class="form-group mt-lg">
	            <label class="col-sm-4 control-label">Project Name</label>
	            <div class="col-sm-6">
	                <input type="text" name="projectname" class="form-control" value="<?php echo $dp->projectname; ?>" readonly="readonly"/>
	            </div>
	        </div>  
			<div class="form-group mt-lg">
	            <label class="col-sm-4 control-label">PIC QT</label>
	            <div class="col-sm-6">
	                <input type="text" name="id_qtname" class="form-control" value="<?php echo $dp->qtname; ?>" readonly="readonly"/>
	            </div>
	        </div>
	           
			<div class="form-group mt-lg">
	            <label class="col-sm-4 control-label">PIC PMO</label>
	            <div class="col-sm-6"> 
	                <input type="text" name="id_qtname" class="form-control" value="<?php echo $dp->pmoname; ?>" readonly="readonly"/>
	            </div>
	        </div>	
 
			<div class="form-group mt-lg">
				<label class="col-sm-4 control-label" for="textareaDefault">Project Status</label>
				<div class="col-md-6">
					<input type="text" name="status_project" class="form-control" value="<?php echo $dp->status_project; ?>" readonly="readonly"/>
				</div>
			</div>
									
			<div class="form-group mt-lg">
                <label class="col-sm-4 control-label">Start Date</label>
                <div class="col-md-6">
					 <div class="form-group"> 
						<div class="col-md-6">
							<div class="input-group" >
								<!--<span class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>-->
								<input type="text" class="form-control" id="st_awal" name="st_awal" value="<?php echo $dp->st_awal; ?>" readonly="readonly">
							</div>
						</div>
					</div>
				</div>
            </div>	

			<div class="form-group mt-lg">
                <label class="col-sm-4 control-label">End Date</label>
                <div class="col-md-6">
					 <div class="form-group"> 
						<div class="col-md-6">
							<div class="input-group">
								<!--<span class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>-->
								<input type="text" class="form-control" id="st_akhir" name="st_akhir" value="<?php echo $dp->st_akhir; ?>" readonly="readonly">
							</div>
						</div>
					</div>
				</div>
            </div>	 	 
				 <?php
				  if(isset($projectallhistorydescription)){
				  $no=1; foreach($projectallhistorydescription as $pahd){
				 ?>
					<div class="col-md-12">
						<div class="panel-group" id="accordion">
							<div class="panel panel-accordion">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $pahd->id_history; ?>">
											<div class="text-left"> History tanggal <?php echo date("d M Y",strtotime($pahd->create_date)); ?> by <?php echo $pahd->creator; ?> </div> 
											<div class="text-right"> <?php echo $pahd->status_project; ?> </div>
										</a>
									</h4>
								</div>
								<div id="<?php echo $pahd->id_history; ?>" class="accordion-body collapse">
									<div class="panel-body">		
									<textarea class="form-control" readonly="readonly"><?php echo $pahd->description; ?></textarea>						
<!--						<section class="panel">
							<div class="panel-body">
								<form class="form-horizontal form-bordered form-bordered" action="#">  
									<div class="form-group"> 
										<label class="col-md-1 control-label" for="textareaDefault">Description</label>
										<div class="col-md-12">
											<textarea class="form-control" readonly="readonly"><?php echo $pahd->description;?></textarea>
										</div>
									</div>  
									<div class="form-group">
										<label class="col-md-2 control-label" for="textareaDefault">Project Status</label>
										<div class="col-md-6">
											<input type="text" name="status_project" class="form-control" value="<?php echo $pahd->status_project; ?>" readonly="readonly"/>
										</div>
									</div>
								</form>
							</div> 
						</section> -->
									</div>
								</div>
							</div>
						</div>
					</div> 
			<?php 
					$no++; }
					} 
			?>   
	    </form> 
			<?php }
			}  
			if(empty($data_project)){
			
				echo "Tidak ada data untuk ditampilkan.";
			}
			?>
	</div>
</section> 	 


