
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Pago </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8  col-lg-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Pago de la Deuda Nro <?php echo $deuda->getId();?> exitoso!</h3>
            </div>
            <div class="panel-body">
                <?php
                $data = array(
                    'deuda' => $deuda,
                );
                $this->load->view('movimientos/deuda', $data);
                ?>
            </div>
        </div>
    </div>
</div><!-- /.row -->