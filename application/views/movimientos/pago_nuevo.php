

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Pago</li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8  col-lg-offset-3">

        <div class="row">
            <div class="col-lg-12">

                <h1>Formulario PAG020</h1>

                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("movimientos/crear_pago")?>">

                    <div class="form-group">
                        <?php echo form_error('deuda_id'); ?>
                        <label for="input-group-addon" class="col-sm-2 control-label">Nro. de Deuda</label>
                        <div class="input-group col-sm-4" >
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="number" class="form-control" id="deuda_id" name="deuda_id" value="<?php echo set_value('deuda_id'); ?>">
                             <span class="input-group-btn">
                                 <a href="<?php echo site_url("movimientos/buscar_deuda") ?>" id="buscar_deuda_id" class="btn btn-sm btn-primary">Buscar</a>
                             </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_error('fecha_pago'); ?>
                        <label for="input-group-addon" class="col-sm-2 control-label">Fecha de Pago</label>
                        <div class="input-group col-sm-4" >
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="<?php echo set_value('fecha_pago'); ?>">
                        </div>
                    </div>
                    <div id="mostrar_deuda">
                    </div>

                    <div id="guardar_pago" class="form-group" style="display:none">
                        <div class="col-sm-2 control-label">
                            <button class="btn btn-lg btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div><!-- /.row -->

    </div>
</div><!-- /.row -->