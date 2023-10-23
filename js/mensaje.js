const btnEliminar = document.getElementById("btnEliminar");

btnEliminar.addEventListener("click", (e) => {
	console.log("mensaje");
 
    Swal.fire({
        title: 'Seguro que quiere eliminar este registro?',
        text: "Una vez eliminado no podra recuperar la información!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si,eliminar registro!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Registro eliminado!',
            'Se elimino de manera exitosa.',
            'success',
     
          )          
          if (result.value) {
             
            setTimeout(() => {
              location.href ='http://localhost/Sistema-Ferreteria-Marly/controlador/delete.php';
            }, "5000");
                    console.log("*se elimina la venta*");
                } else {
                    
                    console.log("*NO se elimina la venta*");
                }
        }
        
      })



      
});