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
        $this->form_validation->set_rules('cuit', 'CUIT/CUIL', 'trim|required|exact_length[11]|callback_exists_cuit');
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

            $estado = $this->enity_manager->getRepository('Entity\EstadoDeuda')->findOneBy(array('nombre' => 'Activa'));
            $deuda->setEstado($estado);

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
        $this->form_validation->set_rules('deuda_id', 'Nro. de Deuda', 'trim|required|exact_length[11]|callback_exists_deuda');

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
            'tasas_seleccionadas' => '',
        );
        $this->layout->view('movimientos/movimientos');
        $this->layout->view('movimientos/plan_de_pago_nuevo',$data);
    }

	protected  function obtener_contribuyente($cuit){
	
		$contribuyente = $this->enity_manager->getRepository('Entity\Contribuyente')->findOneBy(array('cuit' => $cuit));
		return $contribuyente;
	}

    protected function obtener_deuda_contribuyente($contribuyente, $tasas){

		$deudas = $this->enity_manager->getRepository('Entity\Deuda')->findBy(array('contribuyente'=>$contribuyente->getId(), 'tasa'=>$tasas));

		$total_tasa = 0;
		$total_recargo = 0;
		$total_deuda = 0;
		foreach ($deudas as $deuda) {
			$total_tasa += $deuda->getImporte();
			$total_recargo += $deuda->getRecargo();
			$total_deuda += $deuda->getTotal(); 
		}

        $lista_tasas = $this->lista_tasas();

		$data = array(
            'cuit' => $contribuyente->getCuit(),
            'tasas' => $lista_tasas,
            'tasas_seleccionadas' => $tasas,
			'deudas' => $deudas,
			'total_tasa' => $total_tasa,
			'total_recargo' => $total_recargo,
			'total_deuda' => $total_deuda,
		);
		return $data;
	}


    protected  function obtener_cuotas($monto, $tasa_anual, $cantidad_cuotas){
        // Se carga la libreria Calculadora de Prestamo
        $this->load->library('Prestamo');


        // Creamos el objeto préstamo y le decimos que queremos una exactitud de 10 dígitos después de la coma.
        $prestamo   = new Prestamo(10);
        // Configuramos el valor que pedimos de préstamo.
        $prestamo->setCapital($monto);
        //Configuro el valor de la tasa
        $prestamo->setTasaInteres($tasa_anual, 12);

        // Calculamos la tasa de interes que nos estan cobrando.
        $cuota_mensual = $prestamo->calcCuota($cantidad_cuotas);
        $cuota_mensual_redondeada = number_format($cuota_mensual, 2, ',', '.');
        return $cuota_mensual_redondeada;
    }

	public function calcular_plan_de_pago(){
        $this->form_validation->set_rules('cuit', 'CUIT/CUIL', 'trim|required|callback_exists_cuit');
        $this->form_validation->set_rules('tasas[]', 'Tasas', 'trim|required');
		$this->form_validation->set_rules('tasa_anual', 'Tasa Anual', 'trim|required');
		$this->form_validation->set_rules('cantidad_cuotas', 'Cantidad de Cuotas', 'trim|required|is_natural_no_zero');

        $cuit = $_POST['cuit'];
        $tasas = $_POST['tasas'];
        $tasa_anual = $_POST['tasa_anual'];
        $cantidad_cuotas = $_POST['cantidad_cuotas'];

		if ($this->form_validation->run() == FALSE)
        {
            $lista_tasas = $this->lista_tasas();
            $data = array(
                'tasas' => $lista_tasas,
                'tasas_seleccionadas'=> $tasas,
                'tasa_anual'=> $tasa_anual,
                'cantidad_cuotas' => $cantidad_cuotas,

            );
            $this->layout->view('movimientos/movimientos');
            $this->layout->view('movimientos/plan_de_pago_nuevo',$data);
        }
        else
        {
            $contribuyente = $this->obtener_contribuyente($cuit);

            $data = $this->obtener_deuda_contribuyente($contribuyente, $tasas);
            $total_deuda = $data['total_deuda'];
            //Calculo el valor de la cuota
			$cuota_mensual = $this->obtener_cuotas($total_deuda, $tasa_anual, $cantidad_cuotas);

            $data['cantidad_cuotas'] = $cantidad_cuotas;
            $data['tasa_anual'] = $tasa_anual;
            $data['cuota_mensual'] = $cuota_mensual;

            $this->layout->view('movimientos/movimientos');
			$this->layout->view('movimientos/plan_de_pago_calculado', $data);
		}
	}

	
	 public function crear_plan_de_pago()
    {
        $this->form_validation->set_rules('cuit', 'CUIT/CUIL', 'trim|required|callback_exists_cuit');
        $this->form_validation->set_rules('tasas[]', 'Tasas', 'trim|required');
        $this->form_validation->set_rules('tasa_anual', 'Tasa Anual', 'trim|required');
        $this->form_validation->set_rules('cantidad_cuotas', 'Cantidad de Cuotas', 'trim|required|is_natural_no_zero');

        $cuit = $_POST['cuit'];
        $tasas = $_POST['tasas'];
        $tasa_anual = $_POST['tasa_anual'];
        $cantidad_cuotas = $_POST['cantidad_cuotas'];

		 if ($this->form_validation->run() == FALSE)
        {
            $this->buscar_deudas_para_plan_de_pago();
        }
        else
        {
			$contribuyente = $this->obtener_contribuyente($cuit);

			$data = $this->obtener_deuda_contribuyente($contribuyente, $tasas);
			$total_deuda = $data['total_deuda'];
			//Calculo el valor de la cuota
			$cuota_mensual = $this->obtener_cuotas($total_deuda, $tasa_anual, $cantidad_cuotas);

            ob_start();
			// Se carga la libreria fpdf
			$this->load->library('Pdf');

			// Creacion del PDF
			/*
			 * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
			 * heredó todos las variables y métodos de fpdf
			 */
			$pdf = new Pdf('P', 'mm', 'A4');
			// Agregamos una página
			$pdf->AddPage();
			// Define el alias para el número de página que se imprimirá en el pie
			$pdf->AliasNbPages();

			/* Se define el titulo, márgenes izquierdo, derecho y
			 * el color de relleno predeterminado
			 */
			$pdf->SetTitle(utf8_decode("CERTIFICACION DE DEUDA MUNICIPAL"));
			$pdf->SetLeftMargin(15);
			$pdf->SetRightMargin(15);
			/*
			 * Coloreo el fondo
			 */
            $pdf->SetFillColor(255,255,255);
	 
			// Se define el formato de fuente: Arial, negritas, tamaño 9
			$pdf->SetFont('Arial', 'B', 12);
			/*
			 * TITULOS DE COLUMNAS
			 *
			 * $pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
			 */

            $pdf->SetX(80);
			$pdf->Cell(50,7,utf8_decode('CNV N° ... ... ... ... ...'),'B',0,'C','False');
			$pdf->Ln();
            $pdf->SetX(75);
			$pdf->Cell(60,7,utf8_decode('SOLICITUD DE ACOGIMIENTO'),'B',0,'C','False');
			$pdf->Ln();
            $pdf->SetX(70);
			$pdf->Cell(70,7,utf8_decode('PLAN DE FACILIDADES DE PAGO'),'B',0,'C','False');
			$pdf->Ln(13);
            $pdf->SetX(90);
			$pdf->Cell(25,7,utf8_decode('ORD 840/08'),'B',0,'C','False');
			$pdf->Ln();
			
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$fecha = utf8_decode("La Paz (E.Ríos) ".$dias[date('w')]." ".date('d')." DE ".$meses[date('n')-1]." DE ".date('Y') );

            $pdf->Ln();
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->SetX(40);
			$pdf->Cell(120,7,$fecha,'LTR',0,'L','False');
			$pdf->Ln();
            $pdf->SetX(40);
			$pdf->Cell(120,7,utf8_decode('TITULAR: '.$contribuyente->getNombre().' '),'LR',0,'L','False');
			$pdf->Ln();
            $pdf->SetX(40);
			$pdf->Cell(120,7,utf8_decode('PRESENTANTE.............................'),'LR',0,'L','False');
			$pdf->Ln();
            $numero_documento = number_format(substr($contribuyente->getCuit(),2,8),0,',','.');
            $pdf->SetX(40);
			$pdf->Cell(120,7,utf8_decode('N° DOC: '.$numero_documento.'     DOMICILIO: '.$contribuyente->getDireccion().' '),'LRB',0,'L','False');
			$pdf->Ln();


			$qb =  $this->enity_manager->createQueryBuilder();
			$qb->select('d.periodo')
			   ->from('Entity\Deuda', 'd')
               ->innerJoin('d.tasa', 't', 'WITH', 't.nombre = :tasa_nombre')
			   ->where('d.contribuyente = :contribuyente_id')
			   ->groupBy('d.periodo')
               ->orderBy('d.periodo','ASC')
			   ->setParameter('contribuyente_id', $contribuyente->getId())
               ->setParameter('tasa_nombre', 'TGI');
            $result = $qb->getQuery()->getArrayResult();

            $periodos = array_map(function($value) { return $value['periodo']; }, $result);
            //$periodos = array('dic'=>"24-Dciiembre",'ene'=>"3-Enero");
            $periodos_con_formato = join(", ",array_values($periodos));

            $pdf->Ln();
			$pdf->SetFont('Arial', '', 9);
			$pdf->Cell(80,7,utf8_decode('TASA GENERAL INMOBILIARIA Y SERVICIOS CONTRIB. N°: '.$contribuyente->getId().' PARTIDA N°:.......'),0,0,'L','False');
			$pdf->Ln();
			$pdf->Cell(80,7,utf8_decode('PERIODOS ADEUDADOS: '.$periodos_con_formato.' '),0,0,'L','False');

            $qb =  $this->enity_manager->createQueryBuilder();
            $qb->select('SUM(d.importe + d.recargo)')
                ->from('Entity\Deuda', 'd')
                ->innerJoin('d.tasa', 't', 'WITH', 't.nombre = :tasa_nombre')
                ->where('d.contribuyente = :contribuyente_id')
                ->setParameter('contribuyente_id', $contribuyente->getId())
                ->setParameter('tasa_nombre', 'TGI');
            $total_deuda_inmobiliaria = $qb->getQuery()->getSingleScalarResult();

            $pdf->Ln();
			$pdf->Cell(80,7,utf8_decode('TOTAL DEUDA: $ '.$total_deuda_inmobiliaria.'     F $.......................'),0,0,'L','False');
			//TODO: CAMBIAR TOTAL DEUDA AL TOTAL DE TASA INMOBILIARIA SOLAMENTE
			$pdf->Ln();
            $pdf->Cell(0,7,'','B',0,'L','False');
			$pdf->Ln(10);

            $qb =  $this->enity_manager->createQueryBuilder();
            $qb->select('d.periodo')
                ->from('Entity\Deuda', 'd')
                ->innerJoin('d.tasa', 't', 'WITH', 't.nombre = :tasa_nombre')
                ->where('d.contribuyente = :contribuyente_id')
                ->groupBy('d.periodo')
                ->orderBy('d.periodo','ASC')
                ->setParameter('contribuyente_id', $contribuyente->getId())
                ->setParameter('tasa_nombre', 'COM');
            $result = $qb->getQuery()->getArrayResult();

            $periodos = array_map(function($value) { return $value['periodo']; }, $result);
            //$periodos = array('dic'=>"24-Dciiembre",'ene'=>"3-Enero");
            $periodos_con_formato = join(", ",array_values($periodos));
			$pdf->Cell(80,7,utf8_decode('TASA HIGIENE Y SEGURIDAD CONTRIB. N°: '.$contribuyente->getId().' PARTIDA N°........'),0,0,'L','False');
			$pdf->Ln();
			$pdf->Cell(80,7,utf8_decode('PERIODOS ADEUDADOS: '.$periodos_con_formato.' '),0,0,'L','False');
			$pdf->Ln();

            $qb =  $this->enity_manager->createQueryBuilder();
            $qb->select('SUM(d.importe + d.recargo)')
                ->from('Entity\Deuda', 'd')
                ->innerJoin('d.tasa', 't', 'WITH', 't.nombre = :tasa_nombre')
                ->where('d.contribuyente = :contribuyente_id')
                ->setParameter('contribuyente_id', $contribuyente->getId())
                ->setParameter('tasa_nombre', 'COM');
            $total_deuda_higiene = $qb->getQuery()->getSingleScalarResult();

			$pdf->Cell(80,7,utf8_decode('TOTAL DEUDA: $ '.$total_deuda_higiene.'     F $.......................'),0,0,'L','False');
			//TODO: CAMBIAR TOTAL DEUDA AL TOTAL DE TASA HIGIENE Y SEGURIDAD
			$pdf->Ln();
            $pdf->Cell(0,7,'','B',0,'L','False');
			$pdf->Ln(10);
			
			$pdf->Cell(80,7,utf8_decode('CEMENTERIO: NIC:......SEC:......FIL:......URN:......PAN:......'),0,0,'L','False');
			$pdf->Ln();

            $qb =  $this->enity_manager->createQueryBuilder();
            $qb->select('d.periodo')
                ->from('Entity\Deuda', 'd')
                ->innerJoin('d.tasa', 't', 'WITH', 't.nombre = :tasa_nombre')
                ->where('d.contribuyente = :contribuyente_id')
                ->groupBy('d.periodo')
                ->orderBy('d.periodo','ASC')
                ->setParameter('contribuyente_id', $contribuyente->getId())
                ->setParameter('tasa_nombre', 'CEM');
            $result = $qb->getQuery()->getArrayResult();

            $periodos = array_map(function($value) { return $value['periodo']; }, $result);
            //$periodos = array('dic'=>"24-Dciiembre",'ene'=>"3-Enero");
            $periodos_con_formato = join(", ",array_values($periodos));
			$pdf->Cell(80,7,utf8_decode('PERIODOS ADEUDADOS: '.$periodos_con_formato.' '),0,0,'L','False');

            $qb =  $this->enity_manager->createQueryBuilder();
            $qb->select('SUM(d.importe + d.recargo)')
                ->from('Entity\Deuda', 'd')
                ->innerJoin('d.tasa', 't', 'WITH', 't.nombre = :tasa_nombre')
                ->where('d.contribuyente = :contribuyente_id')
                ->setParameter('contribuyente_id', $contribuyente->getId())
                ->setParameter('tasa_nombre', 'COM');
            $total_deuda_cementerio = $qb->getQuery()->getSingleScalarResult();

			$pdf->Cell(80,7,utf8_decode('TOTAL DEUDA: $ '.$total_deuda_cementerio.' '),0,0,'L','False');
			//TODO: CAMBIAR TOTAL DEUDA AL CEMENTERIO
			$pdf->Ln();
            $pdf->Cell(0,7,'','B',0,'L','False');
			$pdf->Ln();
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Ln();
			$pdf->Cell(23,7,utf8_decode('FORMA DE PAGO: ......................'),'B',0,'L','False');
			$pdf->Ln();
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(120,7,utf8_decode('CUOTAS DE: $ '.$cuota_mensual.' + ACTUAL - VENCE 10 DE CADA MES.-'),0,0,'L','False');
			$pdf->Ln();
			$pdf->SetFont('Arial', 'BI', 8);
			$pdf->Cell(80,7,utf8_decode('EL QUE SUSCRIBE DECLARA CONOCER LA ORDENANZA EN TODO LO SU CONTENIDO.-'),0,0,'L','False');
			$pdf->Ln();
			$pdf->SetFont('Arial', '', 8);
			$pdf->Cell(80,7,utf8_decode('TELEFONO N°: '.$contribuyente->getTelefonoFijo().' '),0,0,'L','False');
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Cell(80,7,utf8_decode('FIRMA................................      ACLARACION.......................................'),0,0,'L','False');
			$pdf->Ln();

			/*
			 * Se manda el pdf al navegador
			 *
			 * $pdf->Output(nombredelarchivo, destino);
			 *
			 * I = Muestra el pdf en el navegador
			 * D = Envia el pdf para descarga
			 *
			 * Si tira un error agregar ob_end_clean();
			 */

            $filename = "PlanDePago-".$contribuyente->getCuit()."-".date("Y-m-d H:i:s").".pdf";
            $pdf->Output($filename, 'D');
            /**Falta hacer todo esto
            $archivo = new \Entity\Archivo();
            $archivo->setFileName($filename);
            $this->enity_manager->persist($archivo);

            $plan_de_pago = new \Entity\PlanDePago();
            $plan_de_pago->setArchivo($archivo);


            $this->enity_manager->flush();
            */
        }
    }
}

