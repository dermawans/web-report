<?php
class Project extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect(''); 
        };
        $this->load->model('model_app');   
		$this->load->library('email');
    }

    function index(){
		if($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '5') {  
			$data=array(
			'data_project'=>$this->model_app->getAllDataProject() ,
            'kd_project'=>$this->model_app->getKDProject(),
            'data_master_pmo'=>$this->model_app->getAllDataPMO(),
            'data_user_pmo'=>$this->model_app->getAllDataPMO()
			);
		}
		if($this->session->userdata('ROLEID') == '1') {  
			$data=array(
			'data_project'=>$this->model_app->getAllDataProjectPerQT(),
            'kd_project'=>$this->model_app->getKDProject()
			);
		}
		if($this->session->userdata('ROLEID') == '3') {  
			$data=array(
			'data_project'=>$this->model_app->getAllDataProjectPerPMO(),
            'kd_project'=>$this->model_app->getKDProject(),
            'data_master_pmo'=>$this->model_app->getAllDataPMO(),
            'data_user_pmo'=>$this->model_app->getUserDataPMO()
			);
		}  
		  
		$data_header=array(
            'title'=>'Project',
            'active_project'=>'active',
			'data_grafikstatus'=>$this->model_app->getDataGrafikstatus(),
            'jumlah_project_aktif_qt' => $this->model_app->getCountAktifProjectQT()->num_rows(),
            'jumlah_project_aktif_pmo' => $this->model_app->getCountAktifProjectPMO()->num_rows(),
            'jumlah_all_project_aktif' => $this->model_app->getCountAllAktifProject()->num_rows(), 
            'jumlah_new_project_qt' => $this->model_app->getCountNewProjectQT()->num_rows(),
            'jumlah_new_project_pmo' => $this->model_app->getCountNewProjectPMO()->num_rows(),
            'jumlah_new_project_pmo_kordinator' => $this->model_app->getCountNewProjectPMOKordinator()->num_rows(),
            'jumlah_new_project' => $this->model_app->getCountNewProject()->num_rows(),
            'jumlah_project_expired_qt' => $this->model_app->getCountExpiredProjectQT()->num_rows(),
            'jumlah_project_expired_pmo' => $this->model_app->getCountExpiredProjectPMO()->num_rows(),
            'jumlah_all_project_expired' => $this->model_app->getCountAllExpiredProject()->num_rows(),
            'jumlah_allproject_qt' => $this->model_app->getCountAllprojectQT()->num_rows(),
            'jumlah_allproject_pmo' => $this->model_app->getCountAllprojectPMO()->num_rows(),
            'jumlah_allproject_kordinator' => $this->model_app->getCountAllProjectKordinator()->num_rows()
			 );  
			 
        $this->load->view('element/v_header',$data_header);
        $this->load->view('pages/v_project',$data);
        $this->load->view('element/v_footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
		
	}  
	
	//VIEW PROJECT
    function view_project(){  
		if($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '5') {  
			$data=array(
			'data_project'=>$this->model_app->getDataProjectForCoordinator(),  
            'projectallhistorydescription'=>$this->model_app->getDataProjectAllHistoryDescription() 
			);
		}
		if($this->session->userdata('ROLEID') == '1') {  
			$data=array(
			'data_project'=>$this->model_app->getDataProjectForQT() ,
            'projectallhistorydescription'=>$this->model_app->getDataProjectAllHistoryDescription()
			);
		}
		if($this->session->userdata('ROLEID') == '3') {  
			$data=array(
			'data_project'=>$this->model_app->getDataProjectForPMO() ,
            'projectallhistorydescription'=>$this->model_app->getDataProjectAllHistoryDescription()
			);
		} 
		
		$data_header=array(
            'title'=>'Project',
            'active_project'=>'active',
			'data_grafikstatus'=>$this->model_app->getDataGrafikstatus(),
            'jumlah_project_aktif_qt' => $this->model_app->getCountAktifProjectQT()->num_rows(),
            'jumlah_project_aktif_pmo' => $this->model_app->getCountAktifProjectPMO()->num_rows(),
            'jumlah_all_project_aktif' => $this->model_app->getCountAllAktifProject()->num_rows(), 
            'jumlah_new_project_qt' => $this->model_app->getCountNewProjectQT()->num_rows(),
            'jumlah_new_project_pmo' => $this->model_app->getCountNewProjectPMO()->num_rows(),
            'jumlah_new_project_pmo_kordinator' => $this->model_app->getCountNewProjectPMOKordinator()->num_rows(),
            'jumlah_new_project' => $this->model_app->getCountNewProject()->num_rows(),
            'jumlah_project_expired_qt' => $this->model_app->getCountExpiredProjectQT()->num_rows(),
            'jumlah_project_expired_pmo' => $this->model_app->getCountExpiredProjectPMO()->num_rows(),
            'jumlah_all_project_expired' => $this->model_app->getCountAllExpiredProject()->num_rows(),
            'jumlah_allproject_qt' => $this->model_app->getCountAllprojectQT()->num_rows(),
            'jumlah_allproject_pmo' => $this->model_app->getCountAllprojectPMO()->num_rows(),
            'jumlah_allproject_kordinator' => $this->model_app->getCountAllProjectKordinator()->num_rows()
			 ); 
		  
        $this->load->view('element/v_header',$data_header);
        $this->load->view('pages/v_view_project',$data);
        $this->load->view('element/v_footer');
 
    }
 

	//INACTIVE PROJECT 
    function inactive_project(){
		if($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '5') {  
			$data=array(
			'data_project'=>$this->model_app->getAllDataInactiveProject() ,
            'kd_project'=>$this->model_app->getKDProject(),
            'data_master_pmo'=>$this->model_app->getAllDataPMO(),
            'data_user_pmo'=>$this->model_app->getAllDataPMO()
			);
		}
		if($this->session->userdata('ROLEID') == '1') {  
			$data=array(
			'data_project'=>$this->model_app->getAllDataInactiveProjectPerQT(),
            'kd_project'=>$this->model_app->getKDProject()
			);
		}
		if($this->session->userdata('ROLEID') == '3') {  
			$data=array(
			'data_project'=>$this->model_app->getAllDataInactiveProjectPerPMO(),
            'kd_project'=>$this->model_app->getKDProject(),
            'data_master_pmo'=>$this->model_app->getAllDataPMO(),
            'data_user_pmo'=>$this->model_app->getUserDataPMO()
			);
		}  
		  
		$data_header=array(
            'title'=>'Project',
            'active_project'=>'active',
            'jumlah_project_aktif_qt' => $this->model_app->getCountAktifProjectQT()->num_rows(),
            'jumlah_project_aktif_pmo' => $this->model_app->getCountAktifProjectPMO()->num_rows(),
            'jumlah_all_project_aktif' => $this->model_app->getCountAllAktifProject()->num_rows(), 
            'jumlah_new_project_qt' => $this->model_app->getCountNewProjectQT()->num_rows(),
            'jumlah_new_project_pmo' => $this->model_app->getCountNewProjectPMO()->num_rows(),
            'jumlah_new_project_pmo_kordinator' => $this->model_app->getCountNewProjectPMOKordinator()->num_rows(),
            'jumlah_new_project' => $this->model_app->getCountNewProject()->num_rows(),
            'jumlah_project_expired_qt' => $this->model_app->getCountExpiredProjectQT()->num_rows(),
            'jumlah_project_expired_pmo' => $this->model_app->getCountExpiredProjectPMO()->num_rows(),
            'jumlah_all_project_expired' => $this->model_app->getCountAllExpiredProject()->num_rows(),
            'jumlah_allproject_qt' => $this->model_app->getCountAllprojectQT()->num_rows(),
            'jumlah_allproject_pmo' => $this->model_app->getCountAllprojectPMO()->num_rows(),
            'jumlah_allproject_kordinator' => $this->model_app->getCountAllProjectKordinator()->num_rows()
			 );  
			 
        $this->load->view('element/v_header',$data_header);
        $this->load->view('pages/v_inactive_project',$data);
        $this->load->view('element/v_footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
		
	}  
	//INACTIVE PROJECT
	//UPDATE PROJECT
    function update_project(){   
		if($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4') {  
			$data=array(
			'data_project'=>$this->model_app->getDataProjectForCoordinator(),  
            'projectallhistorydescription'=>$this->model_app->getDataProjectAllHistoryDescription(),
            'laststatusprojecthistory'=>$this->model_app->getLastStatusProjectHistory(),
            'data_master_qt'=>$this->model_app->getAllDataQT(),
            'data_master_pmo'=>$this->model_app->getAllDataPMO(),
            'data_user_pmo'=>$this->model_app->getUserDataPMO()
			);
		}
		if($this->session->userdata('ROLEID') == '1') {  
			$data=array(
			'data_project'=>$this->model_app->getDataProjectForQT() ,
            'projectallhistorydescription'=>$this->model_app->getDataProjectAllHistoryDescription(),
            'laststatusprojecthistory'=>$this->model_app->getLastStatusProjectHistory()
			);
		}
		if($this->session->userdata('ROLEID') == '3') {  
			$data=array(
			'data_project'=>$this->model_app->getDataProjectForPMO() ,
            'projectallhistorydescription'=>$this->model_app->getDataProjectAllHistoryDescription(),
            'laststatusprojecthistory'=>$this->model_app->getLastStatusProjectHistory()
			);
		} 
		
		$data_header=array(
            'title'=>'Project',
            'active_project'=>'active',
			'data_grafikstatus'=>$this->model_app->getDataGrafikstatus(),
            'jumlah_project_aktif_qt' => $this->model_app->getCountAktifProjectQT()->num_rows(),
            'jumlah_project_aktif_pmo' => $this->model_app->getCountAktifProjectPMO()->num_rows(),
            'jumlah_all_project_aktif' => $this->model_app->getCountAllAktifProject()->num_rows(), 
            'jumlah_new_project_qt' => $this->model_app->getCountNewProjectQT()->num_rows(),
            'jumlah_new_project_pmo' => $this->model_app->getCountNewProjectPMO()->num_rows(),
            'jumlah_new_project_pmo_kordinator' => $this->model_app->getCountNewProjectPMOKordinator()->num_rows(),
            'jumlah_new_project' => $this->model_app->getCountNewProject()->num_rows(),
            'jumlah_project_expired_qt' => $this->model_app->getCountExpiredProjectQT()->num_rows(),
            'jumlah_project_expired_pmo' => $this->model_app->getCountExpiredProjectPMO()->num_rows(),
            'jumlah_all_project_expired' => $this->model_app->getCountAllExpiredProject()->num_rows(),
            'jumlah_allproject_qt' => $this->model_app->getCountAllprojectQT()->num_rows(),
            'jumlah_allproject_pmo' => $this->model_app->getCountAllprojectPMO()->num_rows(),
            'jumlah_allproject_kordinator' => $this->model_app->getCountAllProjectKordinator()->num_rows()
			 ); 
			 
        $this->load->view('element/v_header',$data_header);
        $this->load->view('pages/v_update_project',$data);
        $this->load->view('element/v_footer');
 
    }
    
	//INSERT NEW DATA PROJECT
    function add_project(){
		if ($this->session->userdata('ROLEID') == '3' or $this->session->userdata('ROLEID') == '4') { 
		
			$core_project['kd_project'] = $this->input->post('kd_project');
			$core_project['projectname'] = $this->input->post('projectname');
			$core_project['create_by'] = $this->input->post('create_by');
			$core_project['create_date'] = date('Y-m-d H:i:s');
			$table="core_project";
			$this->model_app->insertData($table,$core_project);
			   
			$data['kd_project'] = $this->input->post('kd_project');
			$data['id_pmoname'] = $this->input->post('id_pmoname');
			$data['status_project'] = $this->input->post('status_project'); 
			$data['priority'] = $this->input->post('priority');
			$data['st_awal'] = $this->input->post('st_awal');
			$data['st_akhir'] = $this->input->post('st_akhir');
			$data['description'] = $this->input->post('description');
			$data['isactive'] = '1'; 
			$data['create_by'] = $this->input->post('create_by');
			$data['create_date'] = date('Y-m-d H:i:s');
			
			//fungsi upload file 
			
			$nmfile = $this->input->post('kd_project')."-".$this->input->post('projectname')."-New_Project-".date('Y-m-d H:i:s');  
			$config['upload_path'] = 'assets/file-project/'; 
			$config['allowed_types'] = 'zip';  
	 		$config['file_name'] = $nmfile; 
	 		 
			$this->upload->initialize($config);
 
			if ($this->upload->do_upload('fileupload'))
			{ 
				$fileproject = $this->upload->data();
				$data['file_project'] = $fileproject['file_name'];
				$this->session->set_flashdata('notif-upload-sukses','File sukses diupload'); 
			}
			else
			{
				$data['file_project'] = NULL;
				$this->session->set_flashdata('notif-upload-gagal','File gagal diupload'); 
			}
       		//fungsi upload file
			
			$table="projecthistory";
			$proses=$this->model_app->insertData($table,$data);

			$email=$this->input->post('email');
			$password_email=$this->input->post('password_email');
			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'sendmail';
			$config['protocol']= "smtp";
			$config['mailtype']= "html";
			$config['smtp_host']="ssl://zmbr.saranaonline.com";//pengaturan smtp
			$config['smtp_port']= "465";//atau587
			$config['smtp_timeout']= "400";
			$config['smtp_user']= $email; // isi dengan email kamu
			$config['smtp_pass']= $password_email; // isi dengan password kamu
			$config['crlf']="\r\n"; 
			$config['newline']="\r\n"; 
			$config['wordwrap'] = TRUE;
			//memanggil library email dan set konfigurasi untuk pengiriman email
			
			$this->email->initialize($config);
			//konfigurasi pengiriman
			$email1="lucky_hidayat@saranaonline.com";
			//$email2="pmo_syb@saranaonline.com";
			//$email1="dermawan_suprihatin@saranaonline.com,dermawan.suprihatin@gmail.com";
			$email2="lucky_hidayat@saranaonline.com";
			$this->email->from($config['smtp_user']);
			$this->email->to($email1);
			$this->email->cc($email2);
			$this->email->subject("".$this->input->post('projectname')." - Request Testing");
				//$body = $this->load->view('t_email_new_project.php',$data,TRUE);
			$this->email->message("
			Dear Mba Nanda & Team QT,
			<br><br>
			".$this->input->post('description')."	
			<br><br>
			Untuk file-file project yang dibutuhkan bisa didownload pada attachment file yang ada pada aplikasi.
			<br><br>		
			Atas perhatian dan kerjasamanya saya ucapkan terima kasih.
			<br><br>
			Regards,
			<br>".
			$this->session->userdata('USERNAME')
			); 
			
			if ($this->email->send())
			{
				$this->session->set_flashdata('notif-email-sukses','Email Berhasil dikirim'); 
			}
			else
			{
				$this->session->set_flashdata('notif-email-gagal','Email gagal dikirim'); 
			}
			 

			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Data berhasil ditambahkan');
				redirect('project');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Data gagal ditambahkan');
				redirect('project');
			}
		}
	}
    
	//INSERT QT PIC
    function add_qt_pic(){
		if ($this->session->userdata('ROLEID') == '2') {  
			
			$updatehistory['isactive'] = '0'; 
			$this->db->where('id_history',$this->input->post('id_history'));
			$this->db->update('projecthistory', $updatehistory);
			 
			$data['kd_project'] = $this->input->post('kd_project');
			$data['id_pmoname'] = $this->input->post('id_pmoname');
			$data['id_qtname'] = $this->input->post('id_qtname');
			$data['status_project'] = $this->input->post('status_project'); 
			$data['priority'] = $this->input->post('priority');
			$data['st_awal'] = $this->input->post('st_awal');
			$data['st_akhir'] = $this->input->post('st_akhir');
			$data['description'] = $this->input->post('description'); 
			$data['isactive'] = '1';
			$data['create_date'] = date('Y-m-d H:i:s'); 
			$data['create_by'] = $this->input->post('create_by');
 			$table="projecthistory";
			$proses=$this->model_app->insertData($table,$data);
			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Update berhasil ditambahkan');
				redirect('project');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Update gagal ditambahkan');
				redirect('project');
			}
		}
	}

	//INSERT QT UPDATE
    function qt_update(){
		if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '1') {  
 
			$updatehistory['isactive'] = '0'; 
			$this->db->where('id_history',$this->input->post('id_history'));
			$this->db->update('projecthistory', $updatehistory);
			  
			$data['kd_project'] = $this->input->post('kd_project');
			$data['id_qtname'] = $this->input->post('id_qtname');
			$data['id_pmoname'] = $this->input->post('id_pmoname');
			$data['status_project'] = $this->input->post('status_project'); 
			$data['priority'] = $this->input->post('priority');
			$data['st_awal'] = $this->input->post('st_awal');
			$data['st_akhir'] = $this->input->post('st_akhir');
			$data['description'] = $this->input->post('description'); 
			$data['isactive'] = '1';
			$data['create_date'] = date('Y-m-d H:i:s'); 
			$data['create_by'] = $this->input->post('create_by');
			//fungsi upload file 
			 
			$nmfileQT = $this->input->post('kd_project')."-".$this->input->post('projectname')."-Feedback_QT-".date('Y-m-d H:i:s');  
			$configQT['allowed_types'] = 'zip';  
			$configQT['upload_path'] = 'assets/file-project/'; 
			$configQT['file_name'] = $nmfileQT; 
	 		   
			$this->upload->initialize($configQT);
			if ($_FILES['fileupload']['size'] > 0)
			{

				if ($this->upload->do_upload('fileupload'))
				{  
					$fileproject = $this->upload->data();
					$data['file_project'] = $fileproject['file_name'];;
					$this->session->set_flashdata('notif-upload-sukses','File sukses diupload'); 
				}
				else
				{
					$data['file_project'] = NULL;
					$this->session->set_flashdata('notif-upload-gagal','File gagal diupload'); 
				}					
				
			}
			else
			{
				$data['file_project'] = NULL;
			}
       		//fungsi upload file
			$table="projecthistory";
			$proses=$this->model_app->insertData($table,$data);
			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Update berhasil ditambahkan');
				redirect('project');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Update gagal ditambahkan');
				redirect('project');
			}
		}
	}


	//INSERT PMO UPDATE
    function pmo_update(){
		if ($this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '3') {  
 
			$updatehistory['isactive'] = '0'; 
			$this->db->where('id_history',$this->input->post('id_history'));
			$this->db->update('projecthistory', $updatehistory);
			    
			$data['kd_project'] = $this->input->post('kd_project');
			$data['id_qtname'] = $this->input->post('id_qtname');
			$data['id_pmoname'] = $this->input->post('id_pmoname');
			$data['status_project'] = $this->input->post('status_project'); 
			$data['priority'] = $this->input->post('priority');
			$data['st_awal'] = $this->input->post('st_awal');
			$data['st_akhir'] = $this->input->post('st_akhir');
			$data['description'] = $this->input->post('description'); 
			$data['isactive'] = '1';
			$data['create_date'] = date('Y-m-d H:i:s'); 
			$data['create_by'] = $this->input->post('create_by');  
			//fungsi upload file 
			 
			$nmfilePMO = $this->input->post('kd_project')."-".$this->input->post('projectname')."-Feedback_PMO-".date('Y-m-d H:i:s');  
			$configPMO['allowed_types'] = 'zip';  
			$configPMO['upload_path'] = 'assets/file-project/'; 
			$configPMO['file_name'] = $nmfilePMO; 
	 		 
			$this->upload->initialize($configPMO);
			if ($_FILES['fileupload']['size'] > 0)
			{ 
				if ($this->upload->do_upload('fileupload'))
				{  
					$fileproject = $this->upload->data();
					$data['file_project'] = $fileproject['file_name'];;
					$this->session->set_flashdata('notif-upload-sukses','File sukses diupload'); 
				}
				else
				{
					$data['file_project'] = NULL;
					$this->session->set_flashdata('notif-upload-gagal','File gagal diupload'); 
				}	
			}
			else
			{
				$data['file_project'] = NULL;
			}
       		//fungsi upload file			
			$table="projecthistory";
			$proses=$this->model_app->insertData($table,$data);
			if ($proses == TRUE)
			{
				$this->session->set_flashdata('notif-sukses','Update berhasil ditambahkan');
				redirect('project');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Update gagal ditambahkan');
				redirect('project');
			}
		}
	}
	 
    function send_report_qt(){
		if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '1') {  
		
			$email=$this->input->post('email');
			$password_email=$this->input->post('password_email');
			$data1=array('data_project'=>$this->model_app->getAllDataProjectPerQT());
			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'sendmail';
			$config['protocol']= "smtp";
			$config['mailtype']= "html";
			$config['smtp_host']="ssl://zmbr.saranaonline.com";//pengaturan smtp
			$config['smtp_port']= "465";//atau587
			$config['smtp_timeout']= "400";
			$config['smtp_user']= $email; // isi dengan email kamu
			$config['smtp_pass']= $password_email; // isi dengan password kamu
			$config['crlf']="\r\n"; 
			$config['newline']="\r\n"; 
			$config['wordwrap'] = TRUE;
			//memanggil library email dan set konfigurasi untuk pengiriman email
			
			$this->email->initialize($config);
			//konfigurasi pengiriman
			$email1="lucky_hidayat@saranaonline.com";
			//$email2="tester_syb@saranaonline.com, pmo_syb@saranaonline.com";
			//$email1="dermawan_suprihatin@saranaonline.com";
			$email2="lucky_hidayat@saranaonline.com";
			$this->email->from($config['smtp_user']);
			$this->email->to($email1);
			$this->email->cc($email2);
			$this->email->subject("".$this->session->userdata('USERNAME')." Report ".date('Y-m-d')."");
				$body = $this->load->view('t_email.php',$data1,TRUE);
			$this->email->message($body); 
			
			if ($this->email->send())
			{
				$this->session->set_flashdata('notif-sukses','Report Berhasil dikirim');
				redirect('project');
			}
			else
			{
				$this->session->set_flashdata('notif-gagal','Report gagal dikirim');
				redirect('project');
			}
			
		}
	}
}
