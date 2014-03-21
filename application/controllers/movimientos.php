<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movimientos
    extends MY_Controller {

    public function index()
    {
        $this->layout->view('movimientos/movimientos');
    }

    public function nueva_deuda()
    {
        $lista_tasas =  $this->lista_tasas();
        $data = array(
            'tasas' => $lista_tasas,
        );

        $this->layout->view('movimientos/movimientos');
        $this->layout->view('movimientos/deuda_nueva',$data);
    }
    private function lista_tasas()
    {
        $lista_tasas = [];

        foreach($this->enity_manager->getRepository('Entity\Tasa')->findAll() as $tasa){
            $lista_tasas[$tasa->getId()] = $tasa->getDescripcion();
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
        $this->form_validation->set_rules('importe', 'Importe', 'trim|required|decimal[10,2]');
        $this->form_validation->set_rules('detalle', 'Detalle', 'trim');

        if ($this->form_validation->run() == FALSE)
        {
             $this->nueva_deuda();
        }
        else
        {
            $deuda = new Entity\Deuda();
            // getting the post values of the form:
            $cuit =$_POST['cuit'];
            $contribuyente = $this->enity_manager->getRepository('Entity\Contribuyente')->findOneBy(array('cuit' => $cuit));
            $deuda->setContribuyente($contribuyente);

            $deuda->setImporte($_POST['importe']);
            $fecha_vencimiento = new DateTime($_POST['fecha_vencimiento']);
            $deuda->setFechaVencimiento($fecha_vencimiento);
            $periodo = new DateTime($_POST['periodo']);
            $deuda->setPeriodo($periodo);
            $deuda->setDetalle($_POST['detalle']);

            $user_id = $this->session->userdata('user_id');
            $user = $this->enity_manager->getRepository('Entity\User')->findOneBy(array('id' => $user_id));
            $deuda->setUser($user);

            $tasa_nombre = $_POST['tasa'];
            $tasa = $this->enity_manager->getRepository('Entity\Tasa')->findOneBy(array('nombre' => $tasa_nombre));
            $deuda->setTasa($tasa);

            $deuda->setMulta(0,0);
            $deuda->setAtraso(0);
            $deuda->setRecargo(0,0);

            $this->enity_manager->persist($deuda);
            $this->enity_manager->flush();

            $data = array(
                'deuda' => $deuda,
                );
            $this->layout->view('movimientos/movimientos');
            $this->layout->view('movimientos/deuda_creada', $data);
        }

    }

    public function nuevo_pago()
    {
        $this->layout->view('movimientos/movimientos');
        $this->layout->view('movimientos/pago_nuevo');
    }

    public function buscar_deuda()
    {
        $this->form_validation->set_rules('deuda_id', 'Nro. de Deuda', 'trim|required|callback_exists_deuda');

        if ($this->form_validation->run() == FALSE)
        {
            //$this->load->view('movimientos/pago');
            echo 'Debe cargar un Nro de Deuda para buscar';
        }
        else
        {

            $deuda_id = $_POST['deuda_id'];
            $deuda = $this->enity_manager->getRepository('Entity\Deuda')->find($deuda_id);

            $data = array(
                'deuda' => $deuda,
            );
            $this->layout->view('movimientos/deuda', $data);
        }
    }

    public function exists_deuda($str)
    {
        $deuda = $this->enity_manager->getRepository('Entity\Deuda')->findOneBy(array('id' => $str));
        if ($deuda == null)
        {
            $this->form_validation->set_message('exists_deuda', 'No existe este numero de Deuda ');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function crear_pago()
    {
        $this->form_validation->set_rules('deuda_id', 'Nro. de Deuda', 'trim|required|callback_exists_deuda');
        $this->form_validation->set_rules('fecha_pago', 'Fecha de Pago', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->nuevo_pago();
        }
        else
        {
            $deuda_id = $_POST['deuda_id'];
            $deuda = $this->enity_manager->getRepository('Entity\Deuda')->find($deuda_id);

            $pago = new Entity\Pago();

            $fecha_pago = new DateTime($_POST['fecha_pago']);
            $pago->setFechaPago($fecha_pago);

            $user_id = $this->session->userdata('user_id');
            $user = $this->enity_manager->getRepository('Entity\User')->findOneBy(array('id' => $user_id));
            $pago->setUser($user);

            $deuda->setPago($pago);

            $this->enity_manager->persist($pago);
            $this->enity_manager->flush();

            $data = array(
                'deuda' => $deuda,
            );

            $this->layout->view('movimientos/movimientos');
            $this->layout->view('movimientos/pago_creado',$data);
        }
    }

    public function nuevo_plan_de_pago()
    {
        $lista_tasas = $this->lista_tasas();
        $data = array(
            'tasas' => $lista_tasas,
        );
        $this->layout->view('movimientos/movimientos');
        $this->layout->view('movimientos/plan_de_pago_nuevo',$data);
    }

    public function plan_de_pago_buscar_deudas()
    {
        $this->form_validation->set_rules('cuit', 'CUIT/CUIL', 'trim|required|callback_exists_cuit');
        $this->form_validation->set_rules('tasas[]', 'Tasas', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->nuevo_plan_de_pago();
        }
        else
        {
            $cuit = $_POST['cuit'];
            $tasas = $_POST['tasas'];

            $contribuyente = $this->enity_manager->getRepository('Entity\Contribuyente')->findOneBy(array('cuit' => $cuit));

            $lista_tasas = [];
            foreach($tasas as $key=>$val)
            {
                $lista_tasas[] = $key;
            }
            $deudas = $this->enity_manager->getRepository('Entity\Deuda')->findBy(array('contribuyente'=>$contribuyente->getId(), 'tasa'=>$lista_tasas));

            $data = array(
                'deudas' => $deudas,
            );

            $this->load->view('movimientos/lista_deudas',$data);
        }
    }
}
