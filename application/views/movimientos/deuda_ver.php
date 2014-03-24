<div class="row">
    <div class="col-lg-12">

        <form class="form-horizontal" role="form">

            <div class="form-group">
                <label for="input-group-addon" class="col-sm-2 control-label">CUIT/CUIL</label>
                <div class="input-group col-sm-4" id="input-group-cuit-cuil">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <label class="form-control" id="cuit" name="cuit"> <?php echo $deuda->getContribuyente()->getCuit();?> </label>
                </div>
            </div>

            <div class="form-group">
                <label for="input-group-addon" class="col-sm-2 control-label">Periodo</label>
                <div class="input-group col-sm-4" id="input-group-cuit-cuil">
                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                    <label class="form-control" id="periodo" name="periodo"> <?php echo $deuda->getPeriodo()->format('d/m/Y'); ?> </label>
                </div>
            </div>

            <div class="form-group">
                <label for="input-group-addon" class="col-sm-2 control-label">Fecha de Vencimiento</label>
                <div class="input-group col-sm-4" id="input-group-cuit-cuil">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <label class="form-control" id="fecha_venciminto" name="fecha_venciminto"> <?php echo $deuda->getFechaVencimiento()->format('d/m/Y');?> </label>
                </div>
            </div>

            <div class="form-group">
                <label for="input-group-addon" class="col-sm-2 control-label">Tasa</label>
                <div class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                    <label class="form-control" id="tasa" name="tasa" > <?php echo $deuda->getTasa()->getDescripcion();?> </label>
                </div>
            </div>

            <div class="form-group">
                <label for="input-group-addon" class="col-sm-2 control-label">Importe</label>
                <div class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                    <label class="form-control" id="importe" name="importe" > <?php echo $deuda->getImporte();?> </label>
                </div>
            </div>

            <div class="form-group">
                <label for="input-group-detalle" class="col-sm-2 control-label">Detalle</label>
                <div class="input-group col-sm-4">
                    <textarea id="input-group-detalle" class="form-control" rows="3" id="detalle" name="detalle">
                        <?php echo $deuda->getDetalle();?>
                    </textarea>
                </div>
            </div>

        </form>

    </div>
</div><!-- /.row -->