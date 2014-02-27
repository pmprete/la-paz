
$(document).ready(function() {

    //Inicializo el Plugin JQuery-Multiselect
    $('.multiselect').multiselect();

    //Armo el AJAX para buscar la deuda en  views/movimientoas/pago_nuevo.php
    $("#buscar_deuda_id" ).click(function(event){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: event.target.href,
            data: {deuda_id: $("#deuda_id").val() },
            cache: false,
            success:function(result){
                $("#mostrar_deuda").html(result);
                $("#guardar_pago").show();
            },
            error:function (xhr, textStatus, thrownError){
                alert(thrownError); //throw any errors
            }
        });
    });

    //Armo el AJAX para buscar las deudas en  views/movimientoas/plan_de_pago_nuevo.php
    $("#buscar-deuda-form" ).submit(function(event){
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            cache: false,
            success:function(result){
                $("#deudas").html(result);
            },
            error:function (xhr, textStatus, thrownError){
                alert(thrownError); //throw any errors
            }
        });
        event.preventDefault();
        event.unbind();
    });

});

