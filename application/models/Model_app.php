<?php 

class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    //  ================= AUTOMATIC CODE ==================
	
	// Bagian Login	=================	
	function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('webuser');
        $this->db->where('username', $username);
        $this->db->where('pwd', MD5($password));
        $this->db->limit(1);
		
        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }
	// Bagian Login	=================
	
	// Untuk Dipakai Semua Bagian =================
	public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }
	
	public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
	
	function insertData($table,$data)
    {
        $query=$this->db->insert($table,$data);
        if($query) {
            return TRUE; //if query is true
        } else {
            return FALSE; //if query is wrong
        }
	} 
	
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    
	// Untuk Dipakai Semua Bagian =================
	
	// Bagian Dashboard 
		function getCountAktifProjectQT(){
			$id_user = $this->session->userdata('ID'); 
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project not in ('Close','Drop','Expired','Handover','New project') and id_qtname='".$id_user."'
			");	
		}
		function getCountAktifProjectPMO(){
			$id_user = $this->session->userdata('ID'); 
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project not in ('Close','Drop','Expired','Handover','New project') and id_pmoname='".$id_user."'
			");	
		} 
		function getCountAllAktifProject(){
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project not in('Close','Drop','Expired','Handover','New project')
			");	
		} 
		
		function getCountNewProjectQT(){
			$id_user = $this->session->userdata('ID'); 
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project='New Project' and id_qtname='".$id_user."'
			");	
		} 
		function getCountNewProjectPMO(){
			$id_user = $this->session->userdata('ID'); 
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project='New Project' and id_pmoname='".$id_user."'
			");	
		} 
		function getCountNewProjectPMOKordinator(){ 
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project='New Project'
			");	
		}
		function getCountNewProject(){
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project='New Project'
			");	
		}

		function getCountExpiredProjectQT(){
			$id_user = $this->session->userdata('ID'); 
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project='Expired' and id_qtname='".$id_user."'
			");	
		}
		function getCountExpiredProjectPMO(){
			$id_user = $this->session->userdata('ID'); 
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project='Expired' and id_pmoname='".$id_user."'
			");	
		}
		function getCountAllExpiredProject(){
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project='Expired'
			");	
		} 
		
		function getCountAllprojectQT(){
			$id_user = $this->session->userdata('ID'); 
			return $this->db->query("select id_history from projecthistory where isactive=1 and id_qtname='".$id_user."'
			");	
		}
		function getCountAllprojectPMO(){
			$id_user = $this->session->userdata('ID'); 
			return $this->db->query("select id_history from projecthistory where isactive=1 and id_pmoname='".$id_user."'
			");	
		}
		function getCountAllProjectKordinator(){
			return $this->db->query("select id_history from projecthistory where isactive=1 
			");	
		} 
		  

		function getCountInActiveProjectQT(){
			$id_user = $this->session->userdata('ID'); 
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project in ('Close','Drop','Handover') and id_qtname='".$id_user."'
			");	
		}
		function getCountInActiveProjectPMO(){
			$id_user = $this->session->userdata('ID'); 
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project in ('Close','Drop','Handover') and id_pmoname='".$id_user."'
			");	
		} 
		function getCountAllInActiveProject(){
			return $this->db->query("select id_history from projecthistory where isactive=1 and status_project in('Close','Drop','Handover')
			");	
		}   
		
		function getDataGrafik(){ 
			return $this->db->query("select nama_qt,status_project,jumlah from pj_summary group by status_project,nama_qt")->result();
		} 
		
		function getDataGrafiknamaQT(){ 
			return $this->db->query("SELECT nama_qt, DATE_FORMAT(pj_summary.datecreated, '%Y-%m-%d') FROM pj_summary WHERE DATE(datecreated) = CURDATE() AND role_id in ('1','2') group by nama_qt ")->result();
		} 

		function getDataGrafiknamaPMO(){ 
			return $this->db->query("SELECT nama_qt, DATE_FORMAT(pj_summary.datecreated, '%Y-%m-%d') FROM pj_summary WHERE DATE(datecreated) = CURDATE() AND role_id in ('3','4') group by nama_qt ")->result();
		} 
		
		function getDataGrafikstatus(){ 
			return $this->db->query("SELECT status_project, DATE_FORMAT(pj_summary.datecreated, '%Y-%m-%d') FROM pj_summary WHERE DATE(datecreated) = CURDATE() group by status_project ")->result();
		} 
		
	// Bagian Dashboard
	
	//Bagian Project
	
	function getAllDataPMO(){ 
		return $this->db->query("select * from webuser where roleid='3' or roleid='4'")->result();
    } 
	 
	function getUserDataPMO(){ 
		$id_pmo = $this->session->userdata('ID'); 
		return $this->db->query("select * from webuser where id_name='".$id_pmo."'")->result();
    } 
	
	function getAllDataQT(){ 
		return $this->db->query("select * from webuser where roleid='1' or roleid='2'")->result();
    } 
    
	public function getKDProject()
		{
		    $q = $this->db->query("select MAX(RIGHT(kd_project,9)) as kd_max from core_project");
		    $kd = "";
		    if($q->num_rows()>0)
		    {
		        foreach($q->result() as $k)
		        {
		            $tmp = ((int)$k->kd_max)+1;
		            $kd = sprintf("%09s", $tmp);
		        }
		    }
		    else
		    {
		        $kd = "000000001";
		    }
		    return "P".$kd;
		} 
	 

    function getAllDataProject(){
			return $this->db->query("
			select distinct
			a.kd_project, a.projectname, a.create_date, 
			b.id_history,b.id_qtname,b.id_pmoname,b.status_project,b.st_awal,b.st_akhir,b.description,b.file_project,b.priority,
			c.username as qtname,
			d.username as pmoname
				from  
				core_project a 
				left join projecthistory b on a.kd_project=b.kd_project
				left join webuser c on b.id_qtname=c.id_name
				left join webuser d on b.id_pmoname=d.id_name
				where b.isactive=1 and status_project not in ('Close','Drop','Handover') 
				order by a.create_date desc
		")->result();
    }

    function getAllDataProjectPerQT(){
		$id_qtname = $this->session->userdata('ID'); 
        return $this->db->query("
        select distinct
		a.kd_project, a.projectname, a.create_date, 
		b.id_history,b.id_qtname,b.id_pmoname,b.status_project,b.st_awal,b.st_akhir,b.description,b.file_project,b.priority,
		c.username as qtname,
		d.username as pmoname
			from core_project a 
			left join projecthistory b on a.kd_project=b.kd_project
			left join webuser c on b.id_qtname=c.id_name
			left join webuser d on b.id_pmoname=d.id_name
			where b.isactive=1 and b.id_qtname= '".$id_qtname."'  and status_project not in ('Close','Drop','Handover') 
			order by a.create_date desc
		")->result();
    }

    function getAllDataProjectPerPMO(){
		$id_pmoname = $this->session->userdata('ID'); 
        return $this->db->query("
        select distinct
		a.kd_project, a.projectname, a.create_date, 
		b.id_history,b.id_qtname,b.id_pmoname,b.status_project,b.st_awal,b.st_akhir,b.description,b.file_project,b.priority,
		c.username as qtname,
		d.username as pmoname
			from core_project a 
			left join projecthistory b on a.kd_project=b.kd_project
			left join webuser c on b.id_qtname=c.id_name
			left join webuser d on b.id_pmoname=d.id_name
			where b.isactive=1 and b.id_pmoname= '".$id_pmoname."'  and status_project not in ('Close','Drop','Handover') 
			order by a.create_date desc
		")->result();
    }
	
	
    function getAllDataInactiveProject(){
			return $this->db->query("
			select distinct
			a.kd_project, a.projectname, a.create_date, 
			b.id_history,b.id_qtname,b.id_pmoname,b.status_project,b.st_awal,b.st_akhir,b.description,b.file_project,b.priority,
			c.username as qtname,
			d.username as pmoname
				from  
				core_project a 
				left join projecthistory b on a.kd_project=b.kd_project
				left join webuser c on b.id_qtname=c.id_name
				left join webuser d on b.id_pmoname=d.id_name
				where b.isactive=1 and status_project in ('Close','Drop','Handover') 
				order by a.create_date desc
		")->result();
    }

    function getAllDataInactiveProjectPerQT(){
		$id_qtname = $this->session->userdata('ID'); 
        return $this->db->query("
        select distinct
		a.kd_project, a.projectname, a.create_date, 
		b.id_history,b.id_qtname,b.id_pmoname,b.status_project,b.st_awal,b.st_akhir,b.description,b.file_project,b.priority,
		c.username as qtname,
		d.username as pmoname
			from core_project a 
			left join projecthistory b on a.kd_project=b.kd_project
			left join webuser c on b.id_qtname=c.id_name
			left join webuser d on b.id_pmoname=d.id_name
			where b.isactive=1 and b.id_qtname= '".$id_qtname."' and status_project in ('Close','Drop','Handover') 
			order by a.create_date desc
		")->result();
    }

    function getAllDataInactiveProjectPerPMO(){
		$id_pmoname = $this->session->userdata('ID'); 
        return $this->db->query("
        select distinct
		a.kd_project, a.projectname, a.create_date, 
		b.id_history,b.id_qtname,b.id_pmoname,b.status_project,b.st_awal,b.st_akhir,b.description,b.file_project,b.priority,
		c.username as qtname,
		d.username as pmoname
			from core_project a 
			left join projecthistory b on a.kd_project=b.kd_project
			left join webuser c on b.id_qtname=c.id_name
			left join webuser d on b.id_pmoname=d.id_name
			where b.isactive=1 and b.id_pmoname= '".$id_pmoname."' and status_project in ('Close','Drop','Handover') 
			order by a.create_date desc
		")->result();
    }

	function getDataProjectForCoordinator(){
		$kd_project = array();
		$kd_project = $this->uri->segment(3);
        return $this->db->query("
        select distinct
		a.kd_project, a.projectname, a.create_date, 
		b.id_history,b.id_qtname,b.id_pmoname,b.status_project,b.st_awal,b.st_akhir,b.description,b.file_project,b.priority,
		c.username as qtname,
		d.username as pmoname
			from core_project a 
			left join projecthistory b on a.kd_project=b.kd_project
			left join webuser c on b.id_qtname=c.id_name
			left join webuser d on b.id_pmoname=d.id_name
			where b.isactive=1 and a.kd_project='".$kd_project."'
			order by a.create_date desc
		")->result();
    }	

	function getDataProjectForQT(){
		$kd_project = array();
		$kd_project = $this->uri->segment(3);
		$id_qtname = array();
		$id_qtname = $this->session->userdata('ID');
        return $this->db->query("
        select distinct
		a.kd_project, a.projectname, a.create_date, 
		b.id_history,b.id_qtname,b.id_pmoname,b.status_project,b.st_awal,b.st_akhir,b.description,b.file_project,b.priority,
		c.username as qtname,
		d.username as pmoname
			from core_project a 
			left join projecthistory b on a.kd_project=b.kd_project
			left join webuser c on b.id_qtname=c.id_name
			left join webuser d on b.id_pmoname=d.id_name
			where b.isactive=1 and a.kd_project='".$kd_project."' and b.id_qtname='".$id_qtname."'
			order by a.create_date desc
		")->result();
    }
    
    function getDataProjectForPMO(){
		$kd_project = array();
		$kd_project = $this->uri->segment(3);
		$id_pmoname = array();
		$id_pmoname = $this->session->userdata('ID');
        return $this->db->query("
        select distinct
		a.kd_project, a.projectname, a.create_date, 
		b.id_history,b.id_qtname,b.id_pmoname,b.status_project,b.st_awal,b.st_akhir,b.description,b.file_project,b.priority,
		c.username as qtname,
		d.username as pmoname
			from core_project a 
			left join projecthistory b on a.kd_project=b.kd_project
			left join webuser c on b.id_qtname=c.id_name
			left join webuser d on b.id_pmoname=d.id_name
			where b.isactive=1 and a.kd_project='".$kd_project."' and b.id_pmoname='".$id_pmoname."'
			order by a.create_date desc
		")->result();
    }

	function getDataProjectAllHistoryDescription(){
		$kd_project = array();
		$kd_project = $this->uri->segment(3);
		return $this->db->query("
			select distinct
 			a.id_history,a.status_project,a.create_date,a.description,a.file_project, a.priority,
			d.username as creator
			from projecthistory a left join webuser b on a.id_pmoname=b.id_name
			left join webuser c on a.id_qtname=c.id_name
			left join webuser d on a.create_by=d.id_name
			where a.kd_project='".$kd_project."' order by a.id_history desc")->result();
    } 

	function getLastStatusProjectHistory(){
		$kd_project = array();
		$kd_project = $this->uri->segment(3);
		return $this->db->query("select description,status_project,file_project,priority from projecthistory where kd_project='".$kd_project."' and isactive= '1'")->result();
    } 
 
	//Bagian Project
	
	//Bagian Users =================
	 
	function getDataRole(){
		return $this->db->query("select * from webrole
		")->result();	
    }
	function getDataRolePMO(){
		return $this->db->query("select * from webrole where roleid in ('3','4')
		")->result();	
    }
    
	function getDataRoleQT(){
		return $this->db->query("select * from webrole where roleid in ('1','2')
		")->result();	
    }
    
	function getDataPMO(){
		return $this->db->query("
		select a.rolename,
		b.id_name,b.username,b.pwd
		from webrole a left join webuser b on a.roleid=b.roleid
		where b.roleid in('3','4')
		order by b.id_name asc
		")->result();	
    }
    
	function getDataQT(){
		return $this->db->query("
		select a.rolename,
		b.id_name,b.username,b.pwd
		from webrole a left join webuser b on a.roleid=b.roleid
		where b.roleid in('1','2')
		order by b.id_name asc
		")->result();	
    }
    
	function getDataUser(){
		$id_user = $this->session->userdata('ID'); 
		return $this->db->query("
		select a.rolename,
		b.id_name,b.username,b.pwd
		from webrole a left join webuser b on a.roleid=b.roleid
		where b.id_name = '".$id_user ."'
		")->result();	
    }
    
	function getAllDataUser(){ 
		return $this->db->query("
		select a.rolename,
		b.id_name,b.username,b.pwd
		from webrole a left join webuser b on a.roleid=b.roleid
		")->result();	
    }
    
    function updateDataWhereOnly($table,$data,$field_key)
    {
        $query=$this->db->update($table,$data,$field_key);
        if($query) {
            return TRUE; //if query is true
        } else {
            return FALSE; //if query is wrong
        }
    }
	//Bagian Users =================
}
	
	 
