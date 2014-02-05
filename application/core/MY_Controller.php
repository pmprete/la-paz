<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    // Doctrine EntityManager
    public $em;

    function __construct()
    {
        parent::__construct();

        $this->enity_manager = $this->doctrine->em;
    }
}
