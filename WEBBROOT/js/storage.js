// evento boton enviar un evento cuando recordar 

function storage1(){
    var chx = document.getElementById("check").checked;
 
   if(chx){
     var boton =document.getElementById("usuario").value; 
    localStorage.setItem("key",boton);
   }
};


function cargar(){ 
    var sesion1 = localStorage.getItem("key");
    console.log(sesion1);  
  if(sesion1){
      document.getElementById("usuario").value=sesion1;
  }
  var boton =document.getElementById("enviar"); 
 boton.addEventListener("click",storage1,false);
 
 //tengo storage
 //si tengo escribnelo en el input
 
};


window.addEventListener("load",cargar,false);

