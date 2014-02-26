<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/login
	 *	- or -  
	 * 		http://example.com/index.php/login/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/login/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('login/login');
	}

    public function ingresar()
    {
        // getting the post values of the form:
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->enity_manager->getRepository('Entity\User')->findOneBy(array('username' => $username));

        if(is_null($user)){
            echo "Error! no existe en la base";
            return;
        }

        if($user->getPassword() != $password){
            echo "Error! contraseña incorrecta";
            return;
        }

        $this->session->set_userdata('username', $username);
        $this->session->set_userdata('user_id', $user->getId());

        redirect('/escritorio/index');
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */