$(document).ready(function() {

    formularioNuevo();
    datatableUsuarios();
    editarUsuario();
    // errores();
});


// var errores = () => {
//     $.ajax({
//         "url": './controladores/ctr_usuarios.php',
//         type: 'POST',
//         data: { "option": 1 },
//         success: function(res) {
//             console.log(res);

//         }
//     })


// };

function datatableUsuarios() {
    var table = $("#tablaUsuarios").DataTable({
        ajax: {
            "url": './controladores/ctr_usuarios.php',
            data: { "option": 1 },
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
            { "data": "nombre" },
            { "data": "usuario" },
            { "data": "foto_user" },
            { "data": "perfil" },
            { "data": "icon_estado" },
            { "data": "ultimo_login" },
            { "defaultContent": '<div class="text-center"><button id="editarUsu" data-toggle="modal" data-target="#modal_editarUser" class="btn btn-warning  "><li class="fa fa-pencil"></li> </button><button id="eliminandoUsu" class="btn btn-danger btnBorrar btnEditar" aria-hidden="true"><li class="fa fa-times"></li> </button></div>' }
        ],
    });
    funcBotones("#tablaUsuarios tbody", table);
    buttonEditarr("#tablaUsuarios tbody", table);
}

var buttonEditarr = (tbody, table) => {

    $(tbody).on("click", "#editarUsu", function() {
        if (table.row(this).child.isShown()) {
            var datos = table.row(this).data();
        } else {
            var datos = table.row($(this).parents("tr")).data();
        }
        var id = datos.id;
        var nombreUsu = datos.nombre;
        var usuario = datos.usuario;
        var foto = datos.foto_user;
        var perfil = datos.perfil;


        $('#editarNombre').val(nombreUsu);
        $('#editarUsuario').val(usuario);
        $('#editarPerfil').val(perfil);
        $('#id').val(id);
    });
    // /*=============================================
    // ELIMINAR USUARIO
    // =============================================*/

    $(tbody).on('click', '#eliminandoUsu', function(e) {

        if (table.row(this).child.isShown()) {
            var datos = table.row(this).data();
        } else {
            var datos = table.row($(this).parents("tr")).data();
            var idUser = datos["id"];
        }

        $.ajax({
            "url": './controladores/ctr_usuarios.php',
            type: 'POST',
            data: { "option": 5, id_usuario: idUser },
            // cache: false,
            // contentType: false,
            // processData: false,
            // dataType: "json",
            success: function(res) {
                var d = res;
                console.log((d));

                if (res == "true") {
                    swal({
                        title: 'usuario eliminado',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "usuarios";
                        }
                    });
                } else {
                    swal({
                        type: "error",
                        title: "¡El usuario no se puedo eliminar!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result) {
                        if (result.value) {
                            window.location = "usuarios";
                        }

                    });
                }



            }
        });



    });

};

var funcBotones = (tbody, table) => {

    //carga los datos en el modal 
    $(tbody).on("click", "#desactivado", function() {

        if (table.row(this).child.isShown()) {
            var datos = table.row(this).data();
        } else {
            var datos = table.row($(this).parents("tr")).data();
        }
        //cargar datos 

        cambiar_estado(1, datos.id);
    });

    $(tbody).on('click', '#activado', function(e) {
        if (table.row(this).child.isShown()) {
            var datos = table.row(this).data();
        } else {
            var datos = table.row($(this).parents("tr")).data();
        }
        cambiar_estado(0, datos.id);
    });

};

var cambiar_estado = (est, id_user) => {
    $.ajax({
        "url": './controladores/ctr_usuarios.php',
        type: 'POST',
        data: { "option": 2, estado: est, id_usuario: id_user },
        success: function(res) {
            swal({
                title: "El usuario ha sido actualizado",
                type: "success",
                confirmButtonText: "¡Cerrar!"
            })
            $("#tablaUsuarios").DataTable().ajax.reload();

        }
    })


};

function editarUsuario() {
    $('#editarUser').submit(e => {
        e.preventDefault();

        datos = new FormData($("#editarUser")[0]);
        datos.append('option', 4);
        $.ajax({
            "url": './controladores/ctr_usuarios.php',
            type: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                var resp = res;
                console.log(res);

                if (res != null) {
                    swal({
                        type: "success",
                        title: "¡El usuario ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "usuarios";
                        }

                    });
                } else {
                    swal({
                        type: "error",
                        title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result) {
                        if (result.value) {
                            window.location = "usuarios";
                        }

                    });
                }
            }

        });
    });
}

function formularioNuevo() {
    $('#nuevoUser').submit(e => {
        e.preventDefault();
        datos = new FormData($("#nuevoUser")[0]);
        datos.append('option', 3);
        $.ajax({
            "url": './controladores/ctr_usuarios.php',
            type: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                var resp = res;
                console.log(resp);

                if (res != null) {
                    swal({
                        type: "success",
                        title: "¡El usuario ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {

                            window.location = "usuarios";
                        }

                    });
                } else {
                    swal({
                        type: "error",
                        title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result) {
                        if (result.value) {
                            window.location = "usuarios";
                        }

                    });
                }
            }

        });
    });
}





/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function() {

    var imagen = this.files[0];

    /*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })

    }
})

// /*=============================================
// EDITAR USUARIO
// =============================================*/
// $(document).on("click", ".btnEditarUsuario", function(){

// 	var idUsuario = $(this).attr("idUsuario");

// 	var datos = new FormData();
// 	datos.append("idUsuario", idUsuario);

// 	$.ajax({

// 		url:"ajax/usuarios.ajax.php",
// 		method: "POST",
// 		data: datos,
// 		cache: false,
// 		contentType: false,
// 		processData: false,
// 		dataType: "json",
// 		success: function(respuesta){

// 			$("#editarNombre").val(respuesta["nombre"]);
// 			$("#editarUsuario").val(respuesta["usuario"]);
// 			$("#editarPerfil").html(respuesta["perfil"]);
// 			$("#editarPerfil").val(respuesta["perfil"]);
// 			$("#fotoActual").val(respuesta["foto"]);

// 			$("#passwordActual").val(respuesta["password"]);

// 			if(respuesta["foto"] != ""){

// 				$(".previsualizar").attr("src", respuesta["foto"]);

// 			}

// 		}

// 	});

// })

// /*=============================================
// ACTIVAR USUARIO
// =============================================*/
// $(document).on("click", ".btnActivar", function(){

// 	var idUsuario = $(this).attr("idUsuario");
// 	var estadoUsuario = $(this).attr("estadoUsuario");

// 	var datos = new FormData();
//  	datos.append("activarId", idUsuario);
//   	datos.append("activarUsuario", estadoUsuario);

//   	$.ajax({

// 	  url:"ajax/usuarios.ajax.php",
// 	  method: "POST",
// 	  data: datos,
// 	  cache: false,
//       contentType: false,
//       processData: false,
//       success: function(respuesta){

// if(window.matchMedia("(max-width:767px)").matches){

// 	 swal({
//       	title: "El usuario ha sido actualizado",
//       	type: "success",
//       	confirmButtonText: "¡Cerrar!"
//     	}).then(function(result) {

//         	if (result.value) {

//         	window.location = "usuarios";

//         }

//       });


// }
//   }

// })

//   	if(estadoUsuario == 0){

//   		$(this).removeClass('btn-success');
//   		$(this).addClass('btn-danger');
//   		$(this).html('Desactivado');
//   		$(this).attr('estadoUsuario',1);

//   	}else{

//   		$(this).addClass('btn-success');
//   		$(this).removeClass('btn-danger');
//   		$(this).html('Activado');
//   		$(this).attr('estadoUsuario',0);

//   	}

// })

// /*=============================================
// REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
// =============================================*/

$("#nuevoUsuario").change(function() {

    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            if (respuesta) {

                $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                $("#nuevoUsuario").val("");

            }

        }

    })
})