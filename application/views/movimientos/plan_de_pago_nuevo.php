

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

                <form id="buscar-deuda-form" class="form-horizontal" role="form" method="post" action="<?php echo site_url("movimientos/plan_de_pago_buscar_deudas")?>">
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
                        <label for="input-group-cuit-cuil" class="col-sm-2 control-label">Tasas</label>
                        <div class="input-group col-sm-4" id="input-group-cuit-cuil">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <?php echo form_multiselect('tasas[]', $tasas,'','class="form-control multiselect" id="tasas[]"'); ?>
                        </div>
                    </div>

                    <div id="buscar" class="form-group">
                        <div class="col-sm-2 control-label">
                            <button class="btn btn-lg btn-primary" type="submit" id="plan_de_pago_buscar_deudas">
                                Buscar
                            </button>
                        </div>
                    </div>

                    <div id="deudas">
                    </div>
                </form>

            </div>
        </div><!-- /.row -->

    </div>
</div><!-- /.row -->