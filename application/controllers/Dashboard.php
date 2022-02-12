<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('dashboard/index');
		$this->load->view('layouts/footer');
	}

	public function add()
	{
		$this->form_validation->set_error_delimiters('<div style="display:block" class="invalid-feedback">', '</div>');

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_email_check');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/header');
			$this->load->view('dashboard/add');
			$this->load->view('layouts/footer');
		} else {
			redirect('dashboard');
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_error_delimiters('<div style="display:block" class="invalid-feedback">', '</div>');

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_email_check');

		if ($this->form_validation->run() == FALSE) {
			$data['id'] = $id;
			$this->load->view('layouts/header');
			$this->load->view('dashboard/edit', $data);
			$this->load->view('layouts/footer');
		} else {
			redirect('dashboard');
		}
	}

	public function email_check($email)
	{
		$allowed_hostnames = array("rumahweb.co.id");
		$emailParts = explode('@', $email);
		$hostname = end($emailParts);

		if (array_search($hostname, $allowed_hostnames) === FALSE) {
			$this->form_validation->set_message('email_check', "The {field} field domain name can not be {$hostname}");
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
