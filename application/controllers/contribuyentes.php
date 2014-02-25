<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contribuyentes extends MY_Controller {
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $data = null;
        $this->layout->view('contribuyentes/contribuyente', $data);
    }

    public function crear_contribuyente()
    {
        $data = null;
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
        $this->form_validation->set_rules('cuit', 'CUIT/CUIL', 'trim|required|exact_length[13]|is_unique[contribuyente.cuit]');
        $this->form_validation->set_rules('calle', 'Calle', 'trim|required');
        $this->form_validation->set_rules('altura', 'Altura', 'trim|is_natural_no_zero');
        $this->form_validation->set_rules('piso', 'Piso', 'trim');
        $this->form_validation->set_rules('telefono_fijo', 'Telefono Fijo', 'trim|is_natural_no_zero');
        $this->form_validation->set_rules('telefono_movil', 'Telefono Movil', 'trim|is_natural_no_zero');


        if ($this->form_validation->run() == FALSE)
        {
            $this->layout->view('contribuyentes/contribuyente', $data);
        }
        else
        {
            $contribuyente = new Entity\Contribuyente();
            // getting the post values of the form:
            $contribuyente->setNombre($this->input->post('nombre'));
            $contribuyente->setCuit($this->input->post('cuit'));
            $contribuyente->setCalle($this->input->post('calle'));
            $contribuyente->setAltura($this->input->post('altura'));
            $contribuyente->setPiso($this->input->post('piso'));
            $contribuyente->setTelefonoFijo($this->input->post('telefono_fijo'));
            $contribuyente->setTelefonoMovil($this->input->post('telefono_movil'));

            $this->enity_manager->persist($contribuyente);
            $this->enity_manager->flush();

            $data = array('contribuyente' => $contribuyente);
            $this->layout->view('contribuyentes/contribuyente_creado', $data);
        }


    }

    /* End of file contribuyetes.php */
    /* Location: ./application/contribuyetes/index.php */
} 