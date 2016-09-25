<?php
	class Urlshortner_model extends CI_Model
	{
		public function __construct()
        {
            parent::__construct();
        }

		public function submit($url)
		{
			$id = $this->get_id($url);
			if($id){
				return "http://localhost/test-ITG/CodeIgniter/task-url/index.php/redirect/".$id;
			}
			else{
				$id = $this->create_s_url($url);
				return "http://localhost/test-ITG/CodeIgniter/task-url/index.php/redirect/".$id;
			}
			
			
		}

		public function get_id($url){
			$this->db->select('id');
			$this->db->from('url');
			$this->db->where('f_url',$url);
			$query=$this->db->get();
			
			
			if ($query) {
				  $query = $query->row_array();
				  //$query = $query->row();
				  return  $query['id'];
				
			} else {
			  return false;
			}
		}
		
		public function create_s_url($url){
			
			
			$query = "INSERT INTO `url` (`f_url`) VALUES (?) ";
			$result = $this->db->query($query, array($url ));

			if ($result) {
			  return $this->get_id($url);
			} else {
			  return false;
			}
		}
		
		public function redirect_url($id){
			$query = "SELECT `f_url` FROM `url` WHERE `id` = ? ";
			$result = $this->db->query($query, array($id));
			$row = $result->row();
			header('Location: '.$row->f_url);
		}

	}
?>