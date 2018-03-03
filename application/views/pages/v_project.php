<section class="panel panel-dark">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a> 
        </div>
        <h2 class="panel-title">Project
        </h2>
    </header>
    
    <div class="panel-body">
		<!-- NOTIF -->
		<?php
		$message_sukses = $this->session->flashdata('notif-sukses');
		$message_upload_sukses = $this->session->flashdata('notif-upload-sukses');
		$message_email_sukses = $this->session->flashdata('notif-email-sukses');
		if($message_sukses){
			echo '<p class="alert alert-success text-center">'.$message_sukses .'</p>';
		}
		if($message_upload_sukses){
			echo '<p class="alert alert-success text-center">'.$message_upload_sukses .'</p>';
		}
		if($message_email_sukses){
			echo '<p class="alert alert-success text-center">'.$message_email_sukses .'</p>';
		}

		$message_gagal = $this->session->flashdata('notif-gagal');
		$message_upload_gagal = $this->session->flashdata('notif-upload-gagal');
		$message_email_gagal = $this->session->flashdata('notif-email-gagal');
		if($message_gagal){
			echo '<p class="alert alert-danger text-center">'.$message_gagal .'</p>';
		}
		if($message_upload_gagal){
			echo '<p class="alert alert-danger text-center">'.$message_upload_gagal .'</p>';
		}
		if($message_email_gagal){
			echo '<p class="alert alert-danger text-center">'.$message_email_gagal .'</p>';
		}
		?>           
		<br>
		<div class="text-left">
		<?php 
		if ($this->session->userdata('ROLEID') == '1' or $this->session->userdata('ROLEID') == '2') { 
		?>
		<a href="#send_report" class="modal-with-form btn btn-sm btn-primary"><i class="fa fa-book"></i> Send Report</a> 
		<?php } ?> 
		</div>
		<br>
        <div class="table-responsive">
		<a href="<?php echo site_url('project/inactive_project/')?>" class="btn btn-sm btn-primary"><i class="fa fa-archive"></i> View Inactive Project</a> 
        <table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools" data-swf-path="<?php echo base_url(); ?>assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Project Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Project Status</th>	
                    <th>Timeline Status</th>	
                    <th>Priority</th>	
                    <th>PMO</th>
                    <th>QT</th>
                    <th>
                    <?php 
                    if ($this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '3') { 
        			?>
					<a href="#add_project" class="modal-with-form btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Add Project</a>
					<?php }
					if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '1' or $this->session->userdata('ROLEID') == '5') { 
        			?>
                    Action
					<?php } ?>
            		</th>
                </tr>
            </thead>
            <tbody>
            <?php 
				$no=1;
				if(isset($data_project)){
					foreach($data_project as $row){ 
			?>
				<tr class="gradeX">
					<th><?php echo $no++; ?></th>
					<th><?php echo $row->projectname; ?></th>
					<th><?php echo date("d M Y",strtotime($row->st_awal)); ?></th>
					<th><?php echo date("d M Y",strtotime($row->st_akhir)); ?></th>
					<th><?php echo $row->status_project; ?></th>
					<th>
						<?php
						$akhir=strtotime($row->st_akhir);
						$sekarang= time();
						$sisa = $akhir-$sekarang;
						$sisahari= floor($sisa / (60 * 60 * 24)+1)." days left";
						if ($sisahari>0)
						{ echo $sisahari; }
						else if ($sisahari==0)
						{ echo "Expired Today"; }
						else
						{ echo "Expired"; }
						?>
					</th>
					<th><?php echo $row->priority; ?></th>
					<th><?php echo $row->pmoname; ?></th>
					<th><?php echo $row->qtname; ?></th> 
					<th>
						<a class="btn btn-primary btn-sm" href="<?php echo site_url('project/view_project/'.$row->kd_project)?>">
							<i class="fa fa-eye"></i> View</a> 
                    <?php 
                    if ($this->session->userdata('ROLEID') <> '5') { 
        			?>
						<a class="btn btn-primary btn-sm" href="<?php echo site_url('project/update_project/'.$row->kd_project)?>">
							<i class="fa fa-pencil"></i> Update</a>
					<?php } ?>
					</th>
				</tr>
			  <?php }
				}
			  ?>

            </tbody>
        </table>
        </div>
    </div>
</section>


<?php 
if ($this->session->userdata('ROLEID') == '1' or $this->session->userdata('ROLEID') == '2') { 
?>
<!-- Modal Form Send Report QT-->
<div id="send_report" class="modal-block modal-block-primary mfp-hide">
<?php echo form_open_multipart('project/send_report_qt','id="wizard" class="form-horizontal"'); ?> 

    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Send Report</h2>
        </header>
        <div class="panel-body">
            <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">   
                <div class="form-group mt-lg">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" name="email" class="form-control" placeholder="Email...." required/>
                    </div>
                </div>

				<div class="form-group mt-lg">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="password_email" class="form-control"/>
                    </div>
                </div>
            </form>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                	<button type="submit" class="btn btn-default btn-primary">Send Report</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>

<?php echo form_close(); ?> 
</div>
<!-- Modal Form Send Report QT-->
<?php
}
?>

<?php if ($this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '3') { 
?>
<!-- Modal Form Add Project-->
<div id="add_project" class="modal-block modal-block-primary mfp-hide">
<?php echo form_open_multipart('project/add_project','id="wizard" class="form-horizontal"'); ?> 

    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Add Project</h2>
        </header>
        <div class="panel-body">
            <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">  
                        <input type="hidden" name="kd_project" class="form-control" value="<?php echo $kd_project;?>" readonly="readonly" required/>
                <div class="form-group mt-lg">
                    <label class="col-sm-4 control-label">Project Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="projectname" class="form-control" placeholder="Type project name..." required/>
                    </div>
                </div>

				<div class="form-group mt-lg">
                    <label class="col-sm-4 control-label">Project Status</label>
                    <div class="col-sm-6">
                        <input type="text" name="status_project" class="form-control" value="New Project" readonly="readonly"/>
                    </div>
                </div>

				<div class="form-group mt-lg">
		            <label class="col-sm-4 control-label">Priority</label>
		            <div class="col-sm-6">
				<select data-plugin-selectTwo class="form-control populate" id="priority" name="priority" placeholder="Chose Priority" required>       
							<option value=""></option>  
                            <option value="Urgent">Urgent</option>
							<option value="Very High">Very High</option>
							<option value="High">High</option>                        	
                        	<option value="Mid">Mid</option> 
                        	<option value="Low">Low</option>
                        </select> 
		            </div>
		        </div> 

				<div class="form-group mt-lg">
                    <label class="col-sm-4 control-label">PIC QT</label>
                    <div class="col-sm-6">
                        <input type="text" name="id_qtname" class="form-control" placeholder="QT name..." readonly="readonly"/>
                    </div>
                </div>
                   
				<div class="form-group mt-lg">
                    <label class="col-sm-4 control-label">PIC PMO</label>
                    <div class="col-sm-6">
                        <select data-plugin-selectTwo class="form-control populate" id="id_pmoname" name="id_pmoname" placeholder="Chose PMO" required>
                        	<option value=""></option>
                            <?php
                            if(isset($data_user_pmo)){
                                foreach($data_user_pmo as $pmo){
                                    ?>
                                    <option value="<?php echo $pmo->id_name;?>"><?php echo $pmo->username;?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>	
 
				<div class="form-group mt-lg">
                    <label class="col-sm-4 control-label">Start Date</label>
                    <div class="col-md-6">
						 <div class="form-group"> 
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="text" data-plugin-datepicker class="form-control" id="st_awal" name="st_awal">
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
								<input type="text" data-plugin-datepicker class="form-control" id="st_akhir" name="st_akhir">
							</div>
						</div>
					</div>
					</div>
				        </div>
	
				<div class="form-group mt-lg">
					<label class="col-md-4 control-label">File Upload</label>
					<div class="col-md-6">
		  		        <input type="file" name="fileupload"> 
					</div>
				</div>
                
				<div class="form-group mt-lg">
					<label class="col-sm-4 control-label">Email</label>
					<div class="col-sm-6">
						<input type="text" name="email" class="form-control" placeholder="Input your email" required/>
					</div>
				</div>

				<div class="form-group mt-lg">
					<label class="col-sm-4 control-label">Password Email</label>
					<div class="col-sm-6">
						<input type="password" name="password_email" class="form-control" required/>
					</div>
				</div>    

                <div class="textarea">
                    <label class="col-sm-2 control-label">Description</label>
					<textarea id="description" name="description"  class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></textarea>
                    <!--<textarea id="description" name="description" data-plugin-markdown-editor rows="10"></textarea>-->
                </div>
				       
                <div class="form-group">
                    <div class="col-md-6">
                        <input id="create_by" type="hidden"  class="form-control" name="create_by" value="<?php echo $this->session->userdata('ID') ?>" readonly="readonly">
					</div>
                </div>
            </form>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                	<button type="submit" class="btn btn-default btn-primary">Create Project</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>

<?php echo form_close(); ?> 
</div>
<!-- Modal Form Add Project-->
<?php
}
?>




