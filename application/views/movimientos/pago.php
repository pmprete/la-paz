<div class="row">
    <div class="col-lg-8  col-lg-offset-3">

        <div class="row">
            <div class="col-lg-12">

                <h1>Formulario LTA007</h1>

                <?php
                $attributes = array('class' => 'form-horizontal', 'role' => 'form');
                echo form_open('movimientos/crear_pago', $attributes);
                ?>

                <div class="form-group">
                    <label for="input-group-cuit-cuil" class="col-sm-2 control-label">CUIT/CUIL</label>
                    <div class="input-group col-sm-4" id="input-group-cuit-cuil">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="text" class="form-control" data-mask="99-99999999-9" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="input-group-cliente" class="col-sm-2 control-label">Cliente</label>
                    <div class="input-group col-sm-4" id="input-group-cliente">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="input-group-importe" class="col-sm-2 control-label">Importe</label>
                    <div class="input-group col-sm-4">
                        <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="input-group-detalle" class="col-sm-2 control-label">Detalle</label>
                    <div class="input-group col-sm-4">
                        <textarea id="input-group-detalle" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <?php echo form_close();?>

            </div>
        </div><!-- /.row -->

    </div>
</div><!-- /.row -->