<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Doctrine\Common\Collections\Criteria;

class Busquedas extends MY_Controller {
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->layout->view('busquedas/busqueda');
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

    public function buscar()
    {
        $this->form_validation->set_rules('cuit', 'CUIT/CUIL', 'trim|required|exact_length[11]|callback_exists_cuit');
        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $cuit =$_POST['cuit'];
            $periodo_desde = $_POST['periodo_desde'];
            $periodo_hasta = $_POST['periodo_hasta'];

            $contribuyente = $this->enity_manager->getRepository('Entity\Contribuyente')->findOneBy(array('cuit' => $cuit));

            $criteria = Criteria::create();
            if(strlen($periodo_desde) > 0)
            {
                $criteria->andWhere(Criteria::expr()->gte("periodo",  new DateTime($periodo_desde)));
            }
            if(strlen($periodo_hasta) > 0)
            {
                $criteria->andWhere(Criteria::expr()->lte("periodo",  new DateTime($periodo_hasta)));
            }

            $deudas = $contribuyente->getDeudas()->matching($criteria);
            $data['deudas'] = $deudas;

            $this->layout->view('busquedas/busqueda');
            $this->layout->view('busquedas/busqueda_resultado',$data);
        }
    }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
} 