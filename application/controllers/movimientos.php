<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movimientos
    extends MY_Controller {

    public function index()
    {
        $data = null;
        $this->layout->view('movimientos/movimientos', $data);
    }

    public function deuda()
    {
        $data = null;
        $this->layout->view('movimientos/deuda', $data);
    }

    public function crear_deuda()
    {
        redirect('/movimientos/index');
    }

    public function pago()
    {
        $data = null;
        $this->layout->view('movimientos/pago', $data);
    }

    public function crear_pago()
    {
        redirect('/movimientos/index');
    }

    public function plan_de_pago()
    {
        $data = null;
        $this->layout->view('movimientos/plan_de_pago', $data);
    }

    public function crear_plan_de_pago()
    {
        redirect('/movimientos/index');
    }
}
