$(document).ready(function() {

    // datatable();

});




// /*=============================================
// SideBar Menu
// =============================================*/

$('.sidebar-menu').tree()

// /*=============================================
// Data Table
// =============================================*/







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

// var editDelete = (tbody, table) => {

//     //carga los datos en el modal 
//     $(tbody).on("click", "#editarUsu", function() {

//         if (table.row(this).child.isShown()) {
//             var datos = table.row(this).data();
//         } else {
//             var datos = table.row($(this).parents("tr")).data();
//         }
//         console.log(datos);


//     });


// };