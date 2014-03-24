

<div class="row">
    <div class="col-lg-12">
        <h1>Consulta de Movimientos</h1>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-filter"></i> Consulta de Movimientos Por fecha</h3>
            </div>
            <div class="panel-body">
                <form class="form-inline" role="form" method="post" action="<?php echo site_url("busquedas/buscar")?>">
                    <div class="form-group col-md-4">
                        <div class="input-group ">
                            <?php echo form_error('cuit'); ?>
                            <label class="sr-only" for="cuit">CUIT/CUIL</label>
                            <span class="input-group-addon"><i class="fa fa-key"></i> CUIT/CUIL</span>
                            <input type="text" class="form-control" id="cuit" name="cuit" value="<?php echo set_value('cuit'); ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="input-group ">
                            <?php echo form_error('periodo_desde'); ?>
                            <label class="sr-only" for="periodo_desde">Desde</label>
                            <span class="input-group-addon"><i class="fa fa-calendar"></i> Desde</span>
                            <input type="date" id="periodo_desde" name="periodo_desde" class="form-control datepicker" data-date-format="dd-mm-yyyy" value="<?php echo set_value('periodo_desde'); ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="input-group ">
                            <?php echo form_error('periodo_hasta'); ?>
                            <label class="sr-only" for="periodo_hasta">Hasta</label>
                            <span class="input-group-addon"><i class="fa fa-calendar"></i> Hasta</span>
                            <input type="date" id="periodo_hasta" name="periodo_hasta" class="form-control datepicker" data-date-format="dd-mm-yyyy" value="<?php echo set_value('periodo_hasta'); ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar <i class="fa fa-search"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>
