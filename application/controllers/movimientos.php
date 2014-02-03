<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movimientos
    extends CI_Controller {

    public function index()
    {
        $data = null;
        $this->layout->view('movimientos', $data);
    }
}
