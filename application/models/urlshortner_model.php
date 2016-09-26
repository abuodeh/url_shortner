<?php
	class Urlshortner_model extends CI_Model
	{
		public function __construct()
        {
            parent::__construct();
        }

		public function submit($url)
		{
			$url_short = $this->get_id($url);
			if($url_short){
				return "http://localhost/test-ITG/CodeIgniter/task-url/index.php/redirect/".$url_short;
			}
			else{
				$url_short = $this->create_s_url($url);
				return "http://localhost/test-ITG/CodeIgniter/task-url/index.php/redirect/".$url_short;
			}
			
			
		}

		public function get_id($url){
			
			
			$this->db->select('url_short');
			$this->db->from('url');
			$this->db->where('f_url',$url);
			$query=$this->db->get();
			
			
			if ($query) {
				  $query = $query->row_array();
				  //$query = $query->row();
				  return  $query['url_short'];
				
			} else {
			  return false;
			}
		}
		
		public function create_s_url($url){
			$this->load->helper('string');
			do {
			  $url_short = random_string('alnum', 8); 
			  $this->db->where('url_short ', $url_short);
			  $this->db->from('url');
			  $num = $this->db->count_all_results();
			} while ($num >= 1);
			
			$query = "INSERT INTO `url` (`url_short`,`f_url`) VALUES (?,?) ";
			$result = $this->db->query($query, array($url_short, $url ));

			if ($result) {
			  return $url_short;
			} else {
			  return false;
			}
		}
		
		public function redirect_url($url_short){
			$this->db->select('f_url');
			$this->db->from('url');
			$this->db->where('url_short',$url_short);
			$query=$this->db->get();
			$query = $query->row_array();
			echo $query['f_url'];
			header('Location: '.$query['f_url']);
		}

	}
?>