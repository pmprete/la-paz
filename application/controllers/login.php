<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// Doctrine EntityManager
    public $em;

    function __construct()
    {
        parent::__construct();

        // Not required if you autoload the library
		//Lo tengo en autoload deje esto como comentario para que se entienda de donde sale
        $this->load->library('doctrine');

        $this->em = $this->doctrine->em;
    }

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
        $username = $this->input->post("username");
        $password = $this->input->post("password");

		$user = new Entity\User;
		$user->setUsername('Joseph');
		$user->setPassword('secretPassw0rd');
        /*
		$this->em->persist($user);
		$this->em->flush();
        */
        redirect('/busqueda/index');
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */