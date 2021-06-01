$(document).ready(function() {
    categoriaNueva();
    tablaCategorias();
    editarCategoria();
});

function tablaCategorias() {
    var table = $("#tablaCategorias").DataTable({
        ajax: {
            "url": './controladores/ctr_categorias.php',
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
            { "data": "id_categoria" },
            { "data": "categoria" },
            { "defaultContent": '<div class="text-center"><button id="editarCategoria" data-toggle="modal" data-target="#modalEditarCategoria" class="btn btn-warning  "><li class="fa fa-pencil"></li> </button><button id="eliminarCategoria" class="btn btn-danger btnBorrar " aria-hidden="true"><li class="fa fa-times"></li> </button></div>' }
        ],
    });
    // funcBotones("#tablaUsuarios tbody", table);
    buttonEditar("#tablaCategorias tbody", table);
}
var buttonEditar = (tbody, table) => {

    $(tbody).on("click", "#editarCategoria", function() {
        if (table.row(this).child.isShown()) {
            var datos = table.row(this).data();
        } else {
            var datos = table.row($(this).parents("tr")).data();
        }
        var id = datos.id_categoria;
        var nombreCategoria = datos.categoria;

        $('#categoriaEditada').val(nombreCategoria);
        $('#id').val(id);


    });


    $(tbody).on('click', '#eliminarCategoria', function(e) {

        if (table.row(this).child.isShown()) {
            var datos = table.row(this).data();
        } else {
            var datos = table.row($(this).parents("tr")).data();
            var idCate = datos["id_categoria"];
        }
        console.log(idCate)

        $.ajax({
            "url": './controladores/ctr_categorias.php',
            type: 'POST',
            data: { "option": 4, id_categoria: idCate },
            // cache: false,
            // contentType: false,
            // processData: false,
            dataType: "json",
            success: function(res) {
                console.log(res)

                if (res == true) {
                    swal({
                        title: 'Categoria eliminado',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "categorias";
                        }
                    });
                } else {
                    swal({
                        type: "error",
                        title: "¡La categoria no se puedo eliminar!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result) {
                        if (result.value) {
                            window.location = "categorias";
                        }

                    });
                }
            }
        });



    });

};




// creamos la categoria
function categoriaNueva() {
    $('#nuevaCategoria').submit(e => {
        e.preventDefault();
        datos = new FormData($("#nuevaCategoria")[0]);
        datos.append('option', 1);
        $.ajax({
            "url": './controladores/ctr_categorias.php',
            type: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",

            success: function(res) {
                var resp = res;
                console.log(res);

                if (res == true) {
                    swal({
                        type: "success",
                        title: "¡La categoria se creo correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "categorias";
                        }

                    });
                } else if (res == false) {
                    swal({
                        type: "error",
                        title: "¡la categoria ya existe!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "categorias";
                        }

                    });
                } else {
                    swal({
                        type: "error",
                        title: "¡el campo no puede llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "categorias";
                        }

                    });

                }
            }

        });
    });
}

function editarCategoria() {
    $('#editandoCategoria').submit(e => {
        e.preventDefault();

        datos = new FormData($("#editandoCategoria")[0]);
        datos.append('option', 3);
        $.ajax({
            "url": './controladores/ctr_categorias.php',
            type: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(res) {
                var resp = res;
                console.log(res);

                if (res == true) {
                    swal({
                        type: "success",
                        title: "¡Categoria actualizada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "categorias";
                        }

                    });
                } else if (res == false) {
                    swal({
                        type: "error",
                        title: "¡La categoria ya existe!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "categorias";
                        }

                    });

                } else {
                    swal({
                        type: "error",
                        title: "¡El campo categorias no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result) {
                        if (result.value) {
                            window.location = "categorias";
                        }

                    });
                }
            }
        });
    });
}