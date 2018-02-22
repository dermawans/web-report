<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a> 
        </div>
        <h2 class="panel-title">Update Project</h2>
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
	                <input type="text" name="id_qtname" class="form-control" value="<?php echo $dp->qtname; ?>"  readonly="readonly"/>
	            </div>
	        </div>
	           
			<div class="form-group mt-lg">
	            <label class="col-sm-4 control-label">PIC PMO</label>
	            <div class="col-sm-6"> 
	                <input type="text" name="id_pmoname" class="form-control" value="<?php echo $dp->pmoname; ?>" readonly="readonly"/>
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
	                <input type="text" name="st_awal" class="form-control" value="<?php echo $dp->st_awal; ?>" readonly="readonly"/>
				</div>
	        </div>	

			<div class="form-group mt-lg">
	            <label class="col-sm-4 control-label">End Date</label>
	            <div class="col-md-6"> 
	                <input type="text" name="st_akhir" class="form-control" value="<?php echo $dp->st_akhir; ?>" readonly="readonly"/>
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
										<div class="text-left"> History tanggal <?php echo date("d M Y",strtotime($pahd->create_date)); ?> by <?php echo $pahd->creator; ?>  </div> 
										<div class="text-right"> <?php echo $pahd->status_project; ?>  </div> 
									</a>
								</h4>
							</div>
							<div id="<?php echo $pahd->id_history; ?>" class="accordion-body collapse">
								<div class="panel-body">
									<textarea class="form-control" readonly="readonly"><?php echo $pahd->description; ?></textarea>
									
<!--					<section class="panel">

						<div class="panel-body">
							<form class="form-horizontal form-bordered form-bordered" action="#">  
								<div class="form-group"> 
									<label class="col-md-1 control-label" for="textareaDefault">Description</label>
									<div class="col-md-12">
										<textarea class="form-control" readonly="readonly"><?php echo $pahd->description; ?></textarea>
									</div>
								</div>  
							<div class="form-group">
									<label class="col-md-3 control-label" for="textareaDefault">Project Status</label>
									<div class="col-md-6">
										<input type="text" name="status_project" class="form-control" value="<?php echo $pahd->status_project; ?>" readonly="readonly"/>
									</div>
								</div>
								<hr/>
							</form>
						</div>
					</section> -->
								</div>
							</div>
						</div>
					</div>
				</div> 
			<?php $no++; }
			}
			?>     
	    </form> 
		<div class="panel-body">
			<div class="row">
			    <div class="col-md-12 text-right">
					<?php
				    if(isset($laststatusprojecthistory)){
				    foreach($laststatusprojecthistory as $lsph){ 
						 if($this->session->userdata('ROLEID') == '2' and $lsph->status_project=='New Project') { 
					?>
			    	<a href="#add_qt_pic" class="modal-with-form btn btn-primary">Assign QT PIC</a>
					<?php } ?>
					<?php if($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '1') { ?>
			    	<a href="#qt_update" class="modal-with-form btn btn-primary">Update</a> 
					<?php } ?>
					<?php if($this->session->userdata('ROLEID') == '3' or $this->session->userdata('ROLEID') == '4' and $lsph->status_project<>'New Project') { ?>
			    	<a href="#pmo_update" class="modal-with-form btn btn-primary">Give Feedback</a> 
					<?php }
						}
					} ?> 
			        <a class="btn btn-primary" href="<?php echo site_url('project')?>">Close</a>
			    </div>
			</div>
		</div> 
			<?php 
			}
		}
		if(empty($data_project)){
		
			echo "Tidak ada data untuk ditampilkan.";
		}
		?> 
	</div>
</section> 

<!-- Model Form Assign QT PIC-->
<div id="add_qt_pic" class="modal-block modal-block-primary mfp-hide">
<?php echo form_open_multipart('project/add_qt_pic','id="wizard" class="form-horizontal"'); ?> 

    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Assign QT PIC</h2>
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
		            <label class="col-sm-4 control-label">Project Status</label>
		            <div class="col-sm-6">
						<input type="hidden" name="id_history" class="form-control" value="<?php echo $dp->id_history;?>" readonly="readonly"/>
		                <input type="text" name="status_project" class="form-control" value="New Project" readonly="readonly"/>
		            </div>
		        </div>
		 
				<div class="form-group mt-lg">
                    <label class="col-sm-4 control-label">PIC QT</label>
                    <div class="col-sm-6">
                        <select data-plugin-selectTwo class="form-control populate" id="id_qtname" name="id_qtname" placeholder="Chose QT" required>
                        	<option value=""></option>
                            <?php
                            if(isset($data_master_qt)){
                                foreach($data_master_qt as $qt){
                                    ?>
                                    <option value="<?php echo $qt->id_name;?>"><?php echo $qt->username;?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>	 

				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">PIC PMO</label>
		            <div class="col-sm-6"> 
		                <input type="hidden" name="id_pmoname" class="form-control" value="<?php echo $dp->id_pmoname; ?>" readonly="readonly"/>
		                <input type="text" name="pmoname" class="form-control" value="<?php echo $dp->pmoname; ?>" readonly="readonly"/>
		            </div>
		        </div>	
 
				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">Start Date</label>
		            <div class="col-md-6"> 
		                <input type="text" name="st_awal" class="form-control" value="<?php echo $dp->st_awal; ?>" readonly="readonly"/>
					</div>
		        </div>	

				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">End Date</label>
		            <div class="col-md-6"> 
		                <input type="text" name="st_akhir" class="form-control" value="<?php echo $dp->st_akhir; ?>" readonly="readonly"/>
					</div>
		        </div>	 
 
				<?php
				  if(isset($laststatusprojecthistory)){
				  foreach($laststatusprojecthistory as $lsph){
				?>
				<!--<div class="form-group mt-lg">
		           <label class="control-label">Description</label> -->
		           <label class="control-label">Description</label>
		           <div class="textareaDefault"> 
		                <textarea id="description" name="description" data-plugin-markdown-editor rows="10"><?php echo $lsph->description; ?> </textarea>
					</div>
		       <!-- </div> -->
				<?php }
				}
				?>  
                <div class="form-group">
                    <div class="col-md-10">
                        <input id="create_by" type="hidden"  class="form-control" name="create_by" value="<?php echo $this->session->userdata('ID') ?>" readonly="readonly">
					</div>
                </div>
		

            </form>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                	<button type="submit" class="btn btn-default btn-primary">Assign</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
	<?php }
	}
	?> 
    </section>
<?php echo form_close(); ?> 
</div>
<!-- Modal Form Assign QT PIC-->
             

<!-- Modal Form QT UPDATE-->
<div id="qt_update" class="modal-block modal-block-primary mfp-hide">
<?php echo form_open_multipart('project/qt_update','id="wizard" class="form-horizontal"'); ?> 

    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Update History</h2>
        </header>
        <div class="panel-body">
            <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">  
			<?php
			  if(isset($data_project)){
			  foreach($data_project as $dp){
			?> 
                <input type="hidden" name="kd_project" class="form-control" value="<?php echo $dp->kd_project;?>" readonly="readonly"/>
                <div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">Project Name</label>
		            <div class="col-sm-6">
		                <input type="text" name="projectname" class="form-control" value="<?php echo $dp->projectname; ?>" readonly="readonly"/>
		            </div>
		        </div>  
 
				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">Project Status</label>
		            <div class="col-sm-6">
						<select data-plugin-selectTwo class="form-control populate" id="status_project" name="status_project" placeholder="Chose Status" required>
                        	<option value=""></option> 
							<?php
								if($this->session->userdata('ROLEID') == '2') { 
                        	?>
                        	<option value="Expired">Expired</option> 
                        	<?php } ?>
                        	<option value="In Progress">In Progress</option> 
                        	<option value="Handover">Handover</option> 
                        	<option value="Pending">Pending</option> 
                        	<option value="Selft Test">Selft Test</option> 
                        </select> 
		            </div>
		        </div> 

				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">PIC QT</label>
		            <div class="col-sm-6"> 
		                <input type="hidden" name="id_history" class="form-control" value="<?php echo $dp->id_history;?>" readonly="readonly"/>
		                <input type="hidden" name="id_qtname" class="form-control" value="<?php echo $dp->id_qtname; ?>" readonly="readonly"/>
		                <input type="text" name="qtname" class="form-control" value="<?php echo $dp->qtname; ?>" readonly="readonly"/>  
                   </div>
		        </div>	
		        
				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">PIC PMO</label>
		            <div class="col-sm-6"> 
		                <input type="text" name="pmoname" class="form-control" value="<?php echo $dp->pmoname; ?>" readonly="readonly"/>
						<input type="hidden" name="id_pmoname" class="form-control" value="<?php echo $dp->id_pmoname; ?>" readonly="readonly"/>
		            </div>
		        </div>	
 
				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">Start Date</label>
		            <div class="col-md-6"> 
		                <input type="text" name="st_awal" class="form-control" value="<?php echo $dp->st_awal; ?>" readonly="readonly"/>
					</div>
		        </div>	

				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">End Date</label>
		            <div class="col-md-6"> 
		                <input type="text" name="st_akhir" class="form-control" value="<?php echo $dp->st_akhir; ?>" readonly="readonly"/>
					</div>
		        </div>	 
				<?php
				  if(isset($laststatusprojecthistory)){
				  foreach($laststatusprojecthistory as $lsph){
				?>  <label class="control-label">Description</label>
				<!--<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">Description</label> -->
		            <div class="textareaDefault"> 
		                <textarea id="description" name="description" data-plugin-markdown-editor rows="10"><?php echo $lsph->description; ?></textarea>
					</div>
		        <!--</div>-->
				<?php }
				}
				?>  
                <div class="form-group">
                    <div class="col-md-6">
                        <input id="create_by" type="hidden"  class="form-control" name="create_by" value="<?php echo $this->session->userdata('ID') ?>" readonly="readonly">
					</div>
                </div> 
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button type="submit" class="btn btn-default btn-primary">Submit</button>
							<button class="btn btn-default modal-dismiss">Cancel</button>
						</div>
					</div>
				</footer>
			<?php }
			}
			?>  
            </form>
        </div>
    </section>
<?php echo form_close(); ?> 
</div>
<!-- Modal Form QT UPDATE-->


<!-- Modal Form PMO UPDATE-->
<div id="pmo_update" class="modal-block modal-block-primary mfp-hide">
<?php echo form_open_multipart('project/pmo_update','id="wizard" class="form-horizontal"'); ?> 

 
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Update History</h2>
        </header>
        <div class="panel-body">
            <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">  
	 			<?php
				  if(isset($data_project)){
				  foreach($data_project as $dp){
				?> 
                <input type="hidden" name="kd_project" class="form-control" value="<?php echo $dp->kd_project;?>" readonly="readonly"/>
                <div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">Project Name</label>
		            <div class="col-sm-6">
		                <input type="text" name="projectname" class="form-control" value="<?php echo $dp->projectname; ?>" readonly="readonly"/>
		            </div>
		        </div>  
				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">Project Status</label>
		            <div class="col-sm-6">
						<select data-plugin-selectTwo class="form-control populate" id="status_project" name="status_project" placeholder="Chose Status" required>
                        	<option value="<?php echo $dp->status_project; ?>"><?php echo $dp->status_project; ?></option> 
                        	<option value="Drop">Drop</option>                        	
                        	<option value="Hold">Hold</option> 
                        	<option value="Pending">Pending</option> 
                        	<option value="Extend">Extend</option> 
                        	<option value="Close">Close</option> 
                        </select>
		            </div> 
		        </div> 
		 
				<div class="form-group mt-lg">
                    <label class="col-sm-4 control-label">PIC QT</label>
                    <div class="col-sm-6"> 
						<input type="hidden" name="id_history" class="form-control" value="<?php echo $dp->id_history;?>" readonly="readonly"/>
		                <input type="hidden" name="id_qtname" class="form-control" value="<?php echo $dp->id_qtname; ?>" readonly="readonly"/>
		                <input type="text" name="qtname" class="form-control" value="<?php echo $dp->qtname; ?>" readonly="readonly"/>  
                    </div>
                </div>	 

				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">PIC PMO</label>
		            <div class="col-sm-6"> 
		                <input type="text" name="pmoname" class="form-control" value="<?php echo $dp->pmoname; ?>" readonly="readonly"/>
						<input type="hidden" name="id_pmoname" class="form-control" value="<?php echo $dp->id_pmoname; ?>" readonly="readonly"/>
		            </div>
		        </div>	
 
				<div class="form-group mt-lg">
                    <label class="col-sm-4 control-label">Start Date</label>
                    <div class="col-md-6">
						 <div class="form-group"> 
							<div class="col-md-8">
								<div class="input-group">
							<!--		<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span> -->
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
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="text" data-plugin-datepicker class="form-control" id="st_akhir" name="st_akhir" value="<?php echo $dp->st_akhir; ?>">
								</div>
							</div>
						</div>
					</div>
                </div> 

				<?php
				  if(isset($laststatusprojecthistory)){
				  foreach($laststatusprojecthistory as $lsph){
				?>
				<!--<div class="form-group mt-lg"> -->
		            <label class="textareaDefault">Description</label> 
		            <div class="textareaDefault"> 
		                <textarea id="description" name="description" data-plugin-markdown-editor rows="10"><?php echo $lsph->description; ?></textarea>
					</div>
		        <!--</div>-->
				<?php }
				}
				?> 

                <div class="form-group">
                    <div class="col-md-6">
                        <input id="create_by" type="hidden"  class="form-control" name="create_by" value="<?php echo $this->session->userdata('ID') ?>" readonly="readonly">
					</div>
                </div> 
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button type="submit" class="btn btn-default btn-primary">Submit</button>
							<button class="btn btn-default modal-dismiss">Cancel</button>
						</div>
					</div>
				</footer>
				<?php }
				}
				?> 
            </form>
        </div>
    </section>
<?php echo form_close(); ?> 
</div>
<!-- Modal Form PMO UPDATE-->
