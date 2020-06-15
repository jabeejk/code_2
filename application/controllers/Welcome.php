<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dbmodel');
	}



	public function index()
	{
		$this->load->view('welcome_message');

	}
	public function file_view()
	{
		$this->load->view('excelfile_processing');
	}

	public function file_process()
	{
		if($this->input->post('click'))
		{
			$file = $_FILES['upload']['name'];
			$filetmp = $_FILES['upload']['tmp_name'];
			$filextension = pathinfo( $file , PATHINFO_EXTENSION);

			$allowedfile = array('csv');

			if(!in_array($filextension, $allowedfile))
			{
				echo "Only CSV file";				
			}
			else
			{
				$handle = fopen($filetmp, 'r');
				//$dd = array();
				while (($data = fgetcsv($handle,3000,',')) !==FALSE )
				{	
					$name= $data[0];	
					$dd[] =array(
						'name' => $data[0],
						'password' => $data[1],
						'address' => $data[2]
					);					
				}

				$data = $this->dbmodel->file_data_check($name);
				
				if($data > 0)
				{
					$this->session->set_flashdata('duplicate','No duplicate values');
				}
				else
				{
					foreach ($dd as $value) 
					{
						$this->dbmodel->insert_excel_value($value);					
					}
					$this->session->set_flashdata('insert','All the fields inserted successfully');
				}
				redirect(base_url('index.php/welcome/file_view'));			
			}
		}
		else
		{
			echo "please check";
		}
	}

	public function reg()
	{
		$this->form_validation->set_rules('name','name','required|alpha|min_length[3]|trim|is_unique[sample_reg.name]');
		$this->form_validation->set_rules('pwd','passsword','required|min_length[3]|max_length[20]|trim');
		$this->form_validation->set_rules('email','email','required|trim|valid_email|is_unique[sample_reg.email]');
		$this->form_validation->set_rules('add','address','required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('dob','date of birth','required');
		$this->form_validation->set_rules('optradio','gender','required');
		$this->form_validation->set_rules('checkboxes[]','hobbies','required');
		$this->form_validation->set_rules('lang','Select your language','required');

		if($this->form_validation->run()==true)
		{
	
			$value = array(
		 			'name'=> $this->input->post('name'),
		 			'password'=>$this->input->post('pwd'),
		 			'email'=>$this->input->post('email'),
		 			'address'=>$this->input->post('add'),
		 			'dob'=>$this->input->post('dob'),
		 			'gender'=>$this->input->post('optradio'),
		 			'hobbies'=>json_encode($this->input->post('checkboxes')),
		 			'lang'=>$this->input->post('lang')
		 		);

			$result = $this->dbmodel->db($value);

			if($result == "true")
			{
				$this->session->set_flashdata('success','Inserted Successfully');
			}
			else
			{
				$this->session->set_flashdata('error','Please Check the DB file');
			}
			redirect(base_url('index.php/welcome'));


		}
		else
		{
			$this->index();
		}
	}

}
