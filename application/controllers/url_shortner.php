<?php 

	class Url_shortner extends CI_Controller
	{
		function __construct()
        {
            parent::__construct();
			$this->load->database();
            $this->load->model('urlshortner_model');
        }

		public function index()
		{
			$this->load->helper('form');
			$this->load->view('url-view');//,$this->data);

		}
		public function submit()
		{
			
			$url = $_POST['f_url'];
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('f_url', 'URL', 'required');
			 if ($this->form_validation->run() == TRUE)
			 {
				$this->data['s_url'] = $this->urlshortner_model->submit($url);
				$this->load->helper('form');
				$this->load->view('url-view',$this->data);
			 }
			 else
			 {
				$this->load->helper('form');
		    	$this->load->view('url-view'); 
			 }
		}
			
		
		
		public function redirect()
		{
			$url_short = $this->uri->segment(2);
			$this->urlshortner_model->redirect_url($url_short);

		}

	}

?>