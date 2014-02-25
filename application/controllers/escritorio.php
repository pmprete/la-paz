<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escritorio extends MY_Controller {
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/escritorio
     *	- or -
     * 		http://example.com/index.php/escritorio/index
     *	- or -
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $data = null;
        $this->layout->view('escritorio/escritorio', $data);
    }

    /* End of file escritorio.php */
    /* Location: ./application/controllers/escritorio.php */
} 