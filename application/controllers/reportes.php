<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes  extends MY_Controller {

    public function index()
    {
        $data = null;
        $this->layout->view('reportes/reportes', $data);
    }
}
