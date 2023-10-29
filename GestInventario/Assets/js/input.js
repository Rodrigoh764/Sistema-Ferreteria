const dato = document.getElementById("flexSwitchCheckDefault");
const dato2 = document.getElementById("mostrar");
dato.addEventListener("click",(e)=>{
   console.log(dato.checked);
   if(dato.checked==true){
    dato2.style.display ="block";
   }
   if(dato.checked==false){
    dato2.style.display ="none";
   }  
});