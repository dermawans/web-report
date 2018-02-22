<?php
class Project extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect(''); 
        };
        $this->load->model('model_app');   
    }

    function index(){
		if($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4') {  
			$data=array(
			'data_project'=>$this->model_app->getAllDataProject() ,
            'kd_project'=>$this->model_app->getKDProject(),
            'data_master_pmo'=>$this->model_app->getAllDataPMO(),
            'data_user_pmo'=>$this->model_app->getUserDataPMO()
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
		if($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '4') {  
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
			$this->db->insert('core_project', $core_project);
			   
			$projecthistory['kd_project'] = $this->input->post('kd_project');
			$projecthistory['id_pmoname'] = $this->input->post('id_pmoname');
			$projecthistory['status_project'] = $this->input->post('status_project'); 
			$projecthistory['st_awal'] = $this->input->post('st_awal');
			$projecthistory['st_akhir'] = $this->input->post('st_akhir');
			$projecthistory['description'] = $this->input->post('description');
			$projecthistory['isactive'] = '1';
			$projecthistory['create_date'] = date('Y-m-d H:i:s'); 
			$projecthistory['create_by'] = $this->input->post('create_by');
			$this->db->insert('projecthistory', $projecthistory); 
			
			header('location:'.base_url().'project');
		}
	}
    
	//INSERT QT PIC
    function add_qt_pic(){
		if ($this->session->userdata('ROLEID') == '2') {  
			
			$updatehistory['isactive'] = '0'; 
			$this->db->where('id_history',$this->input->post('id_history'));
			$this->db->update('projecthistory', $updatehistory);
			 
			$projecthistory['kd_project'] = $this->input->post('kd_project');
			$projecthistory['id_pmoname'] = $this->input->post('id_pmoname');
			$projecthistory['id_qtname'] = $this->input->post('id_qtname');
			$projecthistory['status_project'] = $this->input->post('status_project'); 
			$projecthistory['st_awal'] = $this->input->post('st_awal');
			$projecthistory['st_akhir'] = $this->input->post('st_akhir');
			$projecthistory['description'] = $this->input->post('description'); 
			$projecthistory['isactive'] = '1';
			$projecthistory['create_date'] = date('Y-m-d H:i:s'); 
			$projecthistory['create_by'] = $this->input->post('create_by');
			$this->db->insert('projecthistory', $projecthistory); 
			
			header('location:'.base_url().'project');
		}
	}

	//INSERT QT UPDATE
    function qt_update(){
		if ($this->session->userdata('ROLEID') == '2' or $this->session->userdata('ROLEID') == '1') {  
 
			$updatehistory['isactive'] = '0'; 
			$this->db->where('id_history',$this->input->post('id_history'));
			$this->db->update('projecthistory', $updatehistory);
			  
			$projecthistory['kd_project'] = $this->input->post('kd_project');
			$projecthistory['id_qtname'] = $this->input->post('id_qtname');
			$projecthistory['id_pmoname'] = $this->input->post('id_pmoname');
			$projecthistory['status_project'] = $this->input->post('status_project'); 
			$projecthistory['st_awal'] = $this->input->post('st_awal');
			$projecthistory['st_akhir'] = $this->input->post('st_akhir');
			$projecthistory['description'] = $this->input->post('description'); 
			$projecthistory['isactive'] = '1';
			$projecthistory['create_date'] = date('Y-m-d H:i:s'); 
			$projecthistory['create_by'] = $this->input->post('create_by');
			$this->db->insert('projecthistory', $projecthistory); 
			
			header('location:'.base_url().'project');
		}
	}


	//INSERT PMO UPDATE
    function pmo_update(){
		if ($this->session->userdata('ROLEID') == '4' or $this->session->userdata('ROLEID') == '3') {  
 
			$updatehistory['isactive'] = '0'; 
			$this->db->where('id_history',$this->input->post('id_history'));
			$this->db->update('projecthistory', $updatehistory);
			  
			$projecthistory['kd_project'] = $this->input->post('kd_project');
			$projecthistory['id_qtname'] = $this->input->post('id_qtname');
			$projecthistory['id_pmoname'] = $this->input->post('id_pmoname');
			$projecthistory['status_project'] = $this->input->post('status_project'); 
			$projecthistory['st_awal'] = $this->input->post('st_awal');
			$projecthistory['st_akhir'] = $this->input->post('st_akhir');
			$projecthistory['description'] = $this->input->post('description'); 
			$projecthistory['isactive'] = '1';
			$projecthistory['create_date'] = date('Y-m-d H:i:s'); 
			$projecthistory['create_by'] = $this->input->post('create_by');
			$this->db->insert('projecthistory', $projecthistory); 
			
			header('location:'.base_url().'project');
		}
	}

}
