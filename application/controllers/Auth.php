<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function login()
	{
		$this->form_validation->set_error_delimiters('<div style="display:block" class="invalid-feedback">', '</div>');

		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_email_check');
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim|min_length[12]|callback_is_password_strong',
			array('required' => 'You must provide a %s.')
		);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/header');
			$this->load->view('auth/login');
			$this->load->view('layouts/footer');
		} else {
			$data['email'] = $this->input->post('email');
			$this->session->set_userdata($data);
			redirect('dashboard');
		}
	}

	public function register()
	{
		$this->form_validation->set_error_delimiters('<div style="display:block" class="invalid-feedback">', '</div>');

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim|min_length[12]|matches[passconf]|callback_is_password_strong',
			array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_email_check');
		$this->form_validation->set_rules('birth', 'Tanggal lahir', 'required|callback_validateAge');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/header');
			$this->load->view('auth/register');
			$this->load->view('layouts/footer');
		} else {
			redirect('auth/login');
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

	public function is_password_strong($password)
	{
		if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('is_password_strong', "Password harus mengandung angka, simbol, dan huruf kapital");
			return FALSE;
		}
	}

	public function validateAge($birth)
	{
		$birth = strtotime($birth);
		$age = strtotime('+17 years', $birth);
		if (time() < $age) {
			$this->form_validation->set_message('validateAge', "Usia minimal 17 tahun");
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		redirect('auth/login');
	}
}
