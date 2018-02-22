<section class="panel panel-dark">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a> 
        </div>
        <h2 class="panel-title">Project
        </h2>
    </header>
    
    <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools" data-swf-path="<?php echo base_url(); ?>assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Project Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Project Status</th>
                    <th>PMO</th>
                    <th>QT</th>
                    <th>
                    <?php 
                    if ($this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '3') { 
        			?>
					<a href="#add_project" class="modal-with-form btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Add Project</a>
					<?php }
					if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '1') { 
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
								?><br>
								<?php echo $row->status_project; ?>
							</th>
							<th><?php echo $row->pmoname; ?></th>
							<th><?php echo $row->qtname; ?></th> 
							<th>
								<a class="btn btn-primary btn-sm" href="<?php echo site_url('project/view_project/'.$row->kd_project)?>">
									<i class="fa fa-eye"></i> View</a>

								<a class="btn btn-primary btn-sm" href="<?php echo site_url('project/update_project/'.$row->kd_project)?>">
									<i class="fa fa-pencil"></i> Update</a>
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
                            if(isset($data_master_pmo)){
                                foreach($data_master_pmo as $pmo){
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

				<!--<div class="form-group mt-lg">-->
                    <label class="textarea">Description</label>
                    <div class="textarea">
						 <div class="textarea"> 
							<div class="textarea">
								<div class="textarea">
									<textarea id="description" name="description" data-plugin-markdown-editor rows="10"></textarea>
								</div>
							</div>
						</div>
					</div>
                <!--</div>-->
  
                <div class="form-group">
                    <div class="col-md-6">
                        <input id="create_by" type="hidden"  class="form-control" name="create_by" value="<?php echo $this->session->userdata('ID') ?>" readonly="readonly">
						<!--<input id="create_date" type="text"  class="form-control" name="create_date" value="<?php echo $this->session->userdata('USERNAME') ?> <?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d H:i:s') ;  ?>" readonly="readonly">-->
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




