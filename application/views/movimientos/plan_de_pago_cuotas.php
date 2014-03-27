<!-- /.row -->
<div class="row">
    <div class="col-lg-8  col-lg-offset-3">

        <div class="row">
            <div class="col-lg-12">

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
                            <a href="<?php echo site_url("movimientos/calcular_cuotas")?>" class="btn btn-lg btn-primary" id="plan_de_pago_calcular_cuotas">
                                Calcular
                            </a>
                        </div>
                    </div>

                    <div id="guardar_plan_de_pago" class="form-group"  style="display:none">
                        <label class="col-sm-2 control-label">Cuota Mensual</label>
                        <div class="input-group col-sm-4" >
                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            <label class="form-control" id="cuota_mensual" name="cuota_mensual"> <?php echo $cuota_mensual; ?> </label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                <a href="<?php echo site_url("movimientos/crear_plan_de_pago")?>" class="btn btn-lg btn-primary" id="crear_plan_de_pago">
                                    Crear plan de Pago
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div><!-- /.row -->

    </div>
</div><!-- /.row -->