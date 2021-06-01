$(document).ready(function() {
    nuevoProducto();
    tablaProductos();
    listarcategoriaProductos();
    listarProveedorProductos();
    editarProductos();
});

function tablaProductos() {
    var table = $("#tablaProductos").DataTable({
        ajax: {
            "url": './controladores/ctr_productos.php',
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
            { "data": "codigo" },
            { "data": "descripcion" },
            { "data": "stock" },
            { "data": "valor_compraU" },
            { "data": "porcentaje_inpuesto" },
            { "data": "valor_inpuesto" },
            { "data": "valor_ventaU" },
            { "data": "categoria" },
            { "data": "fecha_registro" },
            { "defaultContent": '<div class="text-center"><button id="editarProducto" data-toggle="modal" data-target="#modal_editarProducto" class="btn btn-warning  "><li class="fa fa-pencil"></li> </button><button id="eliminarProducto" class="btn btn-danger btnBorrar " aria-hidden="true"><li class="fa fa-times"></li> </button></div>' }
        ],
    });
    // funcBotones("#tablaUsuarios tbody", table);
    buttonEditar("#tablaProductos tbody", table);
}
var buttonEditar = (tbody, table) => {

    $(tbody).on("click", "#editarProducto", function() {
        if (table.row(this).child.isShown()) {
            var datos = table.row(this).data();
        } else {
            var datos = table.row($(this).parents("tr")).data();
        }

        // console.log(datos);
        var codigo = datos.codigo;


        $.ajax({
            "url": './controladores/ctr_productos.php',
            type: 'POST',
            data: { "option": 7, codigo: codigo },
            // cache: false,
            // contentType: false,
            // processData: false,
            dataType: "json",
            success: function(res) {
                var categoriaProducto = res["id_cate"];
                var ProveedorProducto = res["id_proveedor"];

                console.log(ProveedorProducto);
                var descripcion = datos.descripcion;
                // var categoriaProducto = datos.categoriaProducto;
                var porcentaje_inpuesto = datos.porcentaje_inpuesto;
                var stock = datos.stock;
                var valor_compraU = datos.valor_compraU;
                var valor_ventaU = datos.valor_ventaU;

                $('#EditarDescripcion').val(descripcion);
                $('#editarCategoriaProducto').val(categoriaProducto);
                $('#editProveedorProducto').val(ProveedorProducto);

                $('#editPorcentajeInpuesto').val(porcentaje_inpuesto);
                $('#editPrecioVenta').val(valor_ventaU);
                $('#editPrecioCompra').val(valor_compraU);
                $('#editStock').val(stock);
                $('#codigo').val(codigo);


            }
        });


    });


    $(tbody).on('click', '#eliminarProducto', function(e) {

        if (table.row(this).child.isShown()) {
            var datos = table.row(this).data();
        } else {
            var datos = table.row($(this).parents("tr")).data();
            var idProd = datos["codigo"];
        }
        console.log(idProd);
        $.ajax({
            "url": './controladores/ctr_productos.php',
            type: 'POST',
            data: { "option": 4, codigo: idProd },
            // cache: false,
            // contentType: false,
            // processData: false,
            dataType: "json",
            success: function(res) {

                if (res == true) {
                    swal({
                        title: 'Producto eliminado eliminado',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                } else {
                    swal({
                        type: "error",
                        title: "¡El producto no se puedo eliminar!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }

                    });
                }
            }
        });



    });

};


function listarcategoriaProductos() {
    $.ajax({
        "url": './controladores/ctr_productos.php',
        data: { "option": 5 },
        type: 'POST'
    }).done(function(resp) {
        // console.log(resp);
        var data = JSON.parse(resp);
        var cadena = ``;

        // console.log(data)
        if (data.length > 0) {

            for (var j in data) {

                cadena += `<option value='${data[j].id_categoria}'> ${data[j].categoria} </option>`;

            }

            $("#categoriaProducto").html(cadena);
            $("#editarCategoriaProducto").html(cadena);



        } else {
            cadena += "<option value=''> NO SE ENCONTRO DATOS</option>";
            $("#categoriaProducto").html(cadena);
        }
    });
};


function listarProveedorProductos() {
    $.ajax({
        "url": './controladores/ctr_productos.php',
        data: { "option": 6 },
        type: 'POST'
    }).done(function(resp) {
        // console.log(resp);
        var data = JSON.parse(resp);
        var cadena = ``;

        // console.log(data)
        if (data.length > 0) {

            for (var j in data) {

                cadena += `<option value='${data[j].id}'> ${data[j].proveedor} </option>`;

            }
            var p = "gola"

            $("#ProveedorProducto").html(cadena);
            $("#editProveedorProducto").html(cadena);


        } else {
            cadena += "<option value=''> NO SE ENCONTRO DATOS</option>";
            $("#ProveedorProducto").html(cadena);
        }
    });
};



// creamos la categoria
function nuevoProducto() {
    $('#nuevoProducto').submit(e => {
        e.preventDefault();
        datos = new FormData($("#nuevoProducto")[0]);
        datos.append('option', 1);
        $.ajax({
            "url": './controladores/ctr_productos.php',
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
                        title: "¡El producto se creo correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "productos";
                        }

                    });
                } else if (res == false) {
                    swal({
                        type: "error",
                        title: "¡El nombre del producto ya existe!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "productos";
                        }

                    });
                } else if (res == "porcentaje error") {
                    swal({
                        type: "error",
                        title: "¡El porcentaje no es permitido solo se permite 0% , 5% , 19% !",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "productos";
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

                            window.location = "productos";
                        }

                    });

                }
            }

        });
    });
}

function editarProductos() {
    $('#editar').submit(e => {
        e.preventDefault();
        datos = new FormData($("#editar")[0]);
        datos.append('option', 3);
        $.ajax({
            "url": './controladores/ctr_productos.php',
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
                        title: "¡El producto se Actualizo correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "productos";
                        }

                    });
                } else if (res == false) {
                    swal({
                        type: "error",
                        title: "¡El nombre del producto ya existe!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "productos";
                        }

                    });
                } else if (res == "porcentaje error") {
                    swal({
                        type: "error",
                        title: "¡El porcentaje no es permitido solo se permite 0% , 5% , 19% !",

                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "productos";
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

                            window.location = "productos";
                        }

                    });

                }
            }

        });
    });
}