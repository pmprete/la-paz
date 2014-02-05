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
		$this->load->view('login');
	}

    public function ingresar()
    {
        // getting the post values of the form:
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        print_r($this->input->post());

        echo $username;
        echo "<br>";
        echo $password;
        echo "<br>";

        $user = $this->enity_manager->getRepository('Entity\User')->findOneBy(array('username' => $username));

        if(is_null($user)){
            echo "Error! no existe en la base";
            return;
        }

        if($user->password != $password){
            echo "Error! contraseña incorrecta";
            return;
        }

        /*
		$user = new Entity\User;
		$user->setUsername('Joseph');
		$user->setPassword('secretPassw0rd');

		$this->enity_manager->persist($user);
		$this->enity_manager->flush();
        */
        redirect('/busqueda/index');
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */