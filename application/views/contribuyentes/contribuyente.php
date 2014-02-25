
<div class="row">
    <div class="col-lg-8  col-lg-offset-3">

        <div class="row">
            <div class="col-lg-12">

                <h1>Formulario LTA007</h1>

                <form class="form-horizontal" role="form" method="post" action="<?php echo site_url("contribuyentes/crear_contribuyente")?>">

                    <div class="form-group">
                        <?php echo form_error('nombre'); ?>
                        <label for="input-group-cliente" class="col-sm-2 control-label">Nombre</label>
                        <div class="input-group col-sm-4" id="input-group-cliente">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" id="nombre" name="nombre" size="50" value="<?php echo set_value('nombre'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_error('cuit'); ?>
                        <label for="input-group-cuit-cuil" class="col-sm-2 control-label">CUIT/CUIL</label>
                        <div class="input-group col-sm-4" id="input-group-cuit-cuil">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="text" class="form-control" data-mask="99-99999999-9" id="cuit" name="cuit" size="13" value="<?php echo set_value('cuit'); ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <?php echo form_error('calle'); ?>
                        <label for="input-group-calle" class="col-sm-2 control-label">Calle</label>
                        <div class="input-group col-sm-4">
                            <span class="input-group-addon"><i class="fa fa-road"></i></span>
                            <input type="text" class="form-control" id="calle" name="calle" size="50" value="<?php echo set_value('calle'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_error('altura'); ?>
                        <label for="input-group-altura" class="col-sm-2 control-label">Altura</label>
                        <div class="input-group col-sm-2">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="number" class="form-control" id="altura" name="altura" value="<?php echo set_value('altura'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_error('piso'); ?>
                        <label for="input-group-piso" class="col-sm-2 control-label">Piso</label>
                        <div class="input-group col-sm-2">
                            <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                            <input type="text" class="form-control" id="piso" name="piso" size="50" value="<?php echo set_value('piso'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo form_error('telefono_fijo'); ?>
                        <label for="input-group-telefono-fijo" class="col-sm-2 control-label">Telefono Fijo</label>
                        <div class="input-group col-sm-4">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="number" class="form-control" id="telefono_fijo" name="telefono_fijo" value="<?php echo set_value('telefono_fijo'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_error('telefono_movil'); ?>
                        <label for="input-group-telefono-movil" class="col-sm-2 control-label">Telefono Movil</label>
                        <div class="input-group col-sm-4">
                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                            <input type="number" class="form-control" id="telefono_movil" name="telefono_movil" value="<?php echo set_value('telefono_movil'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 control-label">
                            <button class="btn btn-lg btn-primary" type="submit">Entrar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- /.row -->

    </div>
</div><!-- /.row -->