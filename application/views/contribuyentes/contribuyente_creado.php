<div class="row">
    <div class="col-lg-8  col-lg-offset-3">

        <div class="row">
            <div class="col-lg-8">

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contribuyente creado con exito!</h3>
                    </div>
                    <div class="panel-body">
                        <input type="hidden" id="id" name="id" value="<?php echo $contribuyente->getId();?>" disabled>

                        <div class="form-group ">
                            <label for="input-group-cliente" class="col-sm-2 control-label">Nombre</label>
                            <div class="input-group col-sm-4" id="input-group-cliente">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <label class="form-control"/> <?php echo $contribuyente->getNombre();?> </lable>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-group-cuit-cuil" class="col-sm-2 control-label">CUIT/CUIL</label>
                            <div class="input-group col-sm-4" id="input-group-cuit-cuil">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <label class="form-control"/>  <?php echo $contribuyente->getCuit();?>  </lable>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="input-group-calle" class="col-sm-2 control-label">Calle</label>
                            <div class="input-group col-sm-4">
                                <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                <label class="form-control"/>  <?php echo $contribuyente->getCalle();?>  </lable>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-group-altura" class="col-sm-2 control-label">Altura</label>
                            <div class="input-group col-sm-2">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <label class="form-control"/>  <?php echo $contribuyente->getAltura();?>  </lable>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-group-piso" class="col-sm-2 control-label">Piso</label>
                            <div class="input-group col-sm-2">
                                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                                <label class="form-control"/>  <?php echo $contribuyente->getPiso();?>  </lable>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-group-telefono-fijo" class="col-sm-2 control-label">Telefono Fijo</label>
                            <div class="input-group col-sm-4">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <label class="form-control"/>  <?php echo $contribuyente->getTelefonoFijo();?>  </lable>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-group-telefono-movil" class="col-sm-2 control-label">Telefono Movil</label>
                            <div class="input-group col-sm-4">
                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                <label class="form-control"/>  <?php echo $contribuyente->getTelefonoMovil();?>  </lable>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->

    </div>
</div><!-- /.row -->