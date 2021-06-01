$(document).ready(function() {
    proveedorNuevo();
    tablaProveedor();
    p();
});

function tablaProveedor() {
    var table = $("#tablaProveedor").DataTable({
        ajax: {
            "url": './controladores/ctr_proveedor.php',
            data: { "option": 2 },
            type: 'POST',
        },
        language: {
            lengthMenu: "Mostrar _MENU_ registros",
            zeroRecords: "No se encontro resultados",
            info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            search: "Buscar: ",
            paginate: {
                first: "primero",
                last: "ultimo",
                next: "siguiente",
                previous: "Anterior",
            },
            processing: "procesando...",
        },
        responsive: 'true',
        columns: [
            { "data": "id" },
            { "data": "nit" },
            { "data": "proveedor" },
            { "data": "telefono" },
            { "data": "ubicacion" },
            { "defaultContent": '<div class="text-center"><button id="editarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" class="btn btn-warning  "><li class="fa fa-pencil"></li> </button><button id="eliminarProveedor" class="btn btn-danger btnBorrar " aria-hidden="true"><li class="fa fa-times"></li> </button></div>' }
        ],
    });
    // funcBotones("#tablaUsuarios tbody", table);
    buttonEditar("#tablaProveedor tbody", table);
}
var buttonEditar = (tbody, table) => {

    $(tbody).on("click", "#editarProveedor", function() {
        if (table.row(this).child.isShown()) {
            var datos = table.row(this).data();
        } else {
            var datos = table.row($(this).parents("tr")).data();
        }
        var id = datos.id;
        var nit = datos.nit;
        var proveedor = datos.proveedor;
        var telefono = datos.telefono;
        var direccion = datos.ubicacion;

        $('#EditProved').val(nit);
        $('#EditarNomPRoved').val(proveedor);
        $('#EdittelProved').val(telefono);
        $('#EditdirProved').val(direccion);
        $('#id').val(id);



    });


    $(tbody).on('click', '#eliminarProveedor', function(e) {

        if (table.row(this).child.isShown()) {
            var datos = table.row(this).data();
        } else {
            var datos = table.row($(this).parents("tr")).data();
            var idProved = datos["id"];
        }
        // console.log(idProved);

        $.ajax({
            "url": './controladores/ctr_proveedor.php',
            type: 'POST',
            data: { "option": 4, id: idProved },
            // cache: false,
            // contentType: false,
            // processData: false,
            dataType: "json",
            success: function(res) {
                console.log(res);

                if (res == true) {
                    swal({
                        title: 'Proveedor eliminado',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "proveedor ";
                        }
                    });
                } else {
                    swal({
                        type: "error",
                        title: "el Proveedor no se puedo eliminar!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result) {
                        if (result.value) {
                            window.location = "proveedor ";
                        }

                    });
                }
            }
        });



    });

};


function proveedorNuevo() {
    $('#nuevoProveedor').submit(e => {
        e.preventDefault();
        datos = new FormData($("#nuevoProveedor")[0]);
        datos.append('option', 1);
        $.ajax({
            "url": './controladores/ctr_proveedor.php',

            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(res) {
                var resp = res;
                console.log(resp);
                console.log(res);


                if (res == "true") {
                    swal({
                        type: "success",
                        title: "¡El proveedor ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "proveedor ";
                        }

                    });
                } else if (res == "false") {
                    swal({
                        type: "error",
                        title: "¡El proveedor no se pudo agregar",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result) {
                        if (result.value) {
                            window.location = "proveedor ";
                        }

                    });
                } else {
                    swal({
                        type: "error",
                        title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result) {
                        if (result.value) {
                            window.location = "proveedor ";
                        }

                    });
                }
            }

        });
    });
}

function p() {
    $('#editarprovedor').submit(e => {
        e.preventDefault();
        datos = new FormData($("#editarprovedor")[0]);
        datos.append('option', 3);
        $.ajax({
            "url": './controladores/ctr_proveedor.php',
            type: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(res) {
                console.log(res);

                if (res == true) {
                    swal({
                        type: "success",
                        title: "Proveedor actualizada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "proveedor";
                        }

                    });
                } else if (res == false) {
                    swal({
                        type: "error",
                        title: "¡El proveedor ya existe!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "proveedor";
                        }

                    });

                } else {
                    swal({
                        type: "error",
                        title: "¡El campo nombre de proveedor no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result) {
                        if (result.value) {
                            window.location = "proveedor";
                        }

                    });
                }
            }

        });
    });
}