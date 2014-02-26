<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movimientos
    extends MY_Controller {

    public function index()
    {
        $this->layout->view('movimientos/movimientos');
    }

    public function deuda()
    {
        $lista_tasas =  $this->lista_tasas();
        $data = array(
            'tasas' => $lista_tasas,
        );

        $this->layout->view('movimientos/movimientos');
        $this->layout->view('movimientos/deuda',$data);
    }
    private function lista_tasas()
    {
        $lista_tasas = [];

        foreach($this->enity_manager->getRepository('Entity\Tasa')->findAll() as $tasa){
            $lista_tasas[$tasa->getNombre()] = $tasa->getDescripcion();
        }
        asort($lista_tasas);
        return $lista_tasas;
    }
    public function exists_cuit($str)
    {
        $contribuyente = $this->enity_manager->getRepository('Entity\Contribuyente')->findOneBy(array('cuit' => $str));
        if ($contribuyente == null)
        {
            $this->form_validation->set_message('exists_cuit', 'No existe un contributyente con este numero de %s ');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function crear_deuda()
    {
        $this->form_validation->set_rules('cuit', 'CUIT/CUIL', 'trim|required|exact_length[13]|callback_exists_cuit');
        $this->form_validation->set_rules('periodo', 'Periodo', 'trim|required');
        $this->form_validation->set_rules('fecha_vencimiento', 'Fecha de Vencimiento', 'trim|required');
        $this->form_validation->set_rules('importe', 'Importe', 'trim|required|integer');
        $this->form_validation->set_rules('detalle', 'Detalle', 'trim');

        if ($this->form_validation->run() == FALSE)
        {
             $lista_tasas =  $this->lista_tasas();
             $data = array(
                 'tasas' => $lista_tasas,
             );
            $this->layout->view('movimientos/movimientos');
            $this->layout->view('movimientos/deuda',$data);
        }
        else
        {
            $deuda = new Entity\Deuda();
            // getting the post values of the form:
            $cuit =$this->input->post('cuit');
            $contribuyente = $this->enity_manager->getRepository('Entity\Contribuyente')->findOneBy(array('cuit' => $cuit));
            $deuda->setContribuyente($contribuyente);

            $deuda->setImporte($this->input->post('importe'));
            $fecha_vencimiento = new DateTime($this->input->post('fecha_vencimiento'));
            $deuda->setFechaVencimiento($fecha_vencimiento);
            $periodo = new DateTime($this->input->post('periodo'));
            $deuda->setPeriodo($periodo);
            $deuda->setDetalle($this->input->post('detalle'));

            $user_id = $this->session->userdata('user_id');
            $user = $this->enity_manager->getRepository('Entity\User')->findOneBy(array('id' => $user_id));
            $deuda->setUser($user);

            $tasa_nombre = $this->input->post('tasa');
            $tasa = $this->enity_manager->getRepository('Entity\Tasa')->findOneBy(array('nombre' => $tasa_nombre));
            $deuda->addTasa($tasa);

            $deuda->setMulta(0,0);
            $deuda->setAtraso(0);
            $deuda->setRecargo(0,0);

            $this->enity_manager->persist($deuda);
            $this->enity_manager->flush();

            $data = array(
                'deuda' => $deuda,
                'tasa' => $tasa,
                );
            $this->layout->view('movimientos/movimientos');
            $this->layout->view('movimientos/deuda_creada', $data);
        }

    }

    public function pago()
    {
        $this->layout->view('movimientos/movimientos');
        $this->layout->view('movimientos/pago');
    }

    public function crear_pago()
    {
        redirect('/movimientos/index');
    }

    public function plan_de_pago()
    {
        $this->layout->view('movimientos/movimientos');
        $this->layout->view('movimientos/plan_de_pago');
    }

    public function crear_plan_de_pago()
    {
        redirect('/movimientos/index');
    }
}
