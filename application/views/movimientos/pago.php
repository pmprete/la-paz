

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

                <h1>Formulario LTB011</h1>

                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("movimientos/crear_deuda")?>">

                    <div class="form-group">
                        <?php echo form_error('cuit'); ?>
                        <label for="input-group-cuit-cuil" class="col-sm-2 control-label">CUIT/CUIL</label>
                        <div class="input-group col-sm-4" id="input-group-cuit-cuil">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="text" class="form-control" data-mask="99-99999999-9" id="cuit" name="cuit" value="<?php echo set_value('cuit'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_error('importe'); ?>
                        <label for="input-group-importe" class="col-sm-2 control-label">Importe</label>
                        <div class="input-group col-sm-4">
                            <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                            <input type="text" class="form-control" value="<?php echo set_value('importe'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_error('detalle'); ?>
                        <label for="input-group-detalle" class="col-sm-2 control-label">Detalle</label>
                        <div class="input-group col-sm-4">
                            <textarea id="input-group-detalle" class="form-control" rows="3"><?php echo set_value('detalle'); ?></textarea>
                        </div>
                    </div>

                </form>

            </div>
        </div><!-- /.row -->

    </div>
</div><!-- /.row -->