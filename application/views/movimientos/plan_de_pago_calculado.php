

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Plan de Pago</li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8  col-lg-offset-3">

        <div class="row">
            <div class="col-lg-12">

                <h1>Plan de Facilidades de Pago ORD. 840/08</h1>

                <form id="plan-de-pago-calculado-form" class="form-horizontal" role="form" method="post" action="<?php echo site_url("movimientos/crear_plan_de_pago")?>">
                    <div class="form-group">
                        <?php echo form_error('cuit'); ?>
                        <label class="col-sm-2 control-label">CUIT/CUIL</label>
                        <div class="input-group col-sm-4" >
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="text" data-mask="99-99999999-9" class="form-control" id="cuit" name="cuit" value="<?php echo set_value('cuit'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_error('tasas[]'); ?>
                        <label for="input-group-tasa" class="col-sm-2 control-label">Tasas</label>
                        <div class="input-group col-sm-4" id="input-group-tasas">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <?php echo form_multiselect('tasas[]', $tasas,$tasas_seleccionadas,'class="form-control multiselect" id="tasas[]"'); ?>
                        </div>
                    </div>

                    <h3>Cuotas</h3>

                    <div id="plan_de_pagos_cuotas_form" class="form-horizontal" role="form">
                        <div class="form-group">
                            <?php echo form_error('cantidad_cuotas'); ?>
                            <label class="col-sm-2 control-label">Cantidad de Cuotas</label>
                            <div class="input-group col-sm-4" >
                                <span class="input-group-addon"><i class="fa fa-comments-o"></i></span>
                                <input type="text" class="form-control" id="cantidad_cuotas" name="cantidad_cuotas" value="<?php echo set_value('cantidad_cuotas'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo form_error('tasa_anual'); ?>
                            <label class="col-sm-2 control-label">Tasa Anual</label>
                            <div class="input-group col-sm-4" >
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" id="tasa_anual" name="tasa_anual" value="<?php echo set_value('tasa_anual'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                <a id="calcular_plan_de_pago" href="<?php echo site_url("movimientos/calcular_plan_de_pago")?>" class="btn btn-lg btn-primary" >
                                    Calcular Plan de Pago
                                </a>
                            </div>
                        </div>
                    </div>

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
                                                    <td><?php echo $item->getPeriodo();?></td>
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
                    <div class="row">
                        <div class="col-lg-8  col-lg-offset-3">

                            <div class="row">
                                <div class="col-lg-12">

                                    <h3>Cuotas Mensuales</h3>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Cuota Mensual</label>
                                        <div class="input-group col-sm-4" >
                                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                            <label class="form-control" id="cuota_mensual" name="cuota_mensual"> <?php echo $cuota_mensual; ?> </label>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- /.row -->

                        </div>
                    </div><!-- /.row -->

                    <div id="guardar_plan_de_pago" class="form-group">
                        <div class="col-sm-2 control-label">
                            <button class="btn btn-lg btn-primary" type="submit">
                                Crear Plan de Pago
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- /.row -->

    </div>
</div><!-- /.row -->