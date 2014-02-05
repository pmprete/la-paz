<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte  extends MY_Controller {

    public function index()
    {
        $data = null;
        $this->layout->view('reporte', $data);
    }
}
