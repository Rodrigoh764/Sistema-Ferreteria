const btneliminar = document.getElementById("#btnEliminar");

btneliminar.addEventListener("click",()=>{
  alert("diste click");
})

const $btnOcultar = document.querySelector("#btnOcultar"),
	$btnMostrar = document.querySelector("#btnMostrar"),
	$parrafo = document.querySelector("#parrafo");

$btnMostrar.addEventListener("click", () => {
	$parrafo.style.display = "block";
});


$btnOcultar.addEventListener("click", () => {
	$parrafo.style.display = "none";
});

// setTimeout(function pagina(){
//   location.href ='http://localhost/Sistema-Ferreteria-Marly/vista/ActualizarEliminar.php';
// },10000)

// function animacionEliminar(){
//     Swal.fire({
//         title: 'Seguro que quiere eliminar este registro?',
//         text: "Una vez eliminado no podra recuperar la información!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Si,eliminar registro!'
//       }).then((result) => {
//         if (result.isConfirmed) {
//           Swal.fire(
//             'Registro eliminado!',
//             'Se elimino de manera exitosa.',
//             'success'
//           ) 
//         }
//       })
//     }

    // btneliminar.addEventListener("click", () => {
        // animacionEliminar();
        // Swal.fire({
        //   title: 'Seguro que quiere eliminar este registro?',
        //   text: "Una vez eliminado no podra recuperar la información!",
        //   icon: 'warning',
        //   showCancelButton: true,
        //   confirmButtonColor: '#3085d6',
        //   cancelButtonColor: '#d33',
        //   confirmButtonText: 'Si,eliminar registro!'
        // }).then((result) => {
        //   if (result.isConfirmed) {
        //     Swal.fire(
        //       'Registro eliminado!',
        //       'Se elimino de manera exitosa.',
        //       'success'
        //     ) 
        //   }
        // })
       
    // });

