
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Deudas</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped tablesorter">
                        <thead>
                        <tr>
                            <th>Id # <i class="fa fa-sort"></i></th>
                            <th>Periodo <i class="fa fa-sort"></i></th>
                            <th>Fecha Vencimiento <i class="fa fa-sort"></i></th>
                            <th>Total Tasa <i class="fa fa-sort"></i></th>
                            <th>Multa <i class="fa fa-sort"></i></th>
                            <th>Atraso <i class="fa fa-sort"></i></th>
                            <th>Recargo <i class="fa fa-sort"></i></th>
                            <th>TotalDeuda <i class="fa fa-sort"></i></th>
                            <th>Estado <i class="fa fa-sort"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($deudas as $item):?>
                            <tr>
                                <td><?php echo $item->getId();?></td>
                                <td><?php echo $item->getPeriodo()->format('m-Y');?></td>
                                <td><?php echo $item->getFechaVencimiento()->format('d-m-Y');?></td>
                                <td><?php echo $item->getImporte();?></td>
                                <td><?php echo $item->getMulta();?></td>
                                <td><?php echo $item->getAtraso();?></td>
                                <td><?php echo $item->getRecargo();?></td>
                                <td><?php echo $item->getTotal();?></td>
                                <td><?php echo $item->getEstado()->getNombre();?></td>
                            </tr>
                        <?php endforeach;?>
                        <tr><td></td></tr>
                        <tr>
                            <td>Totales</td>
                            <td></td>
                            <td></td>
                            <td><?php echo $total_tasa;?></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $total_recargo;?></td>
                            <td id="total_deuda"><?php echo $total_deuda;?></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<div id="plan_de_pagos_cuotas">
    <?php
    $data = array(
        'cantidad_cuotas' => $cantidad_cuotas,
        'tasa_anual' => $tasa_anual,
    );
    $this->load->view('movimientos/plan_de_pago_cuotas', $data);
    ?>
</div>