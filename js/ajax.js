function cargarProducto() {
	
	var ajax = new XMLHttpRequest();
	 //div donde se mostrará lo resultados
  	divResultado = document.getElementById('prodCargados');
  	idProdcuto=document.agregarProductos.producto.value;
  	Cantidad=document.agregarProductos.cantidad.value;
  	dcto=document.agregarProductos.id_dcto.value;
    ruta=document.agregarProductos.idruta.value;
    fecha=document.agregarProductos.fecha.value;
  	ajax.open("POST","cargarProducto.php",true);
  	ajax.onreadystatechange=function () {
  		if (ajax.readyState==4){
  			divResultado.innerHTML=ajax.responseText

  		}
  	}
    console.log("!!!!!!!!!!!!"+"fecha"+fecha+"dcto"+dcto+"Producto"+idProdcuto);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  	//enviando los valores a registro.php para que inserte los datos
	ajax.send("id_dcto="+dcto+"&id_prod="+idProdcuto+"&cantidad="+Cantidad+"&idruta="+ruta+"&fecha="+fecha);
}


function eliminar(id_mov){
  //donde se mostrará el resultado de la eliminacion
  divResultado = document.getElementById('prodCargados');
  dcto=document.agregarProductos.id_dcto.value;
  console.log(" Elemento a eliminar" +id_mov);
  //usaremos un cuadro de confirmacion  
  var eliminar = confirm("De verdad desea eliminar este dato?")
  if ( eliminar ) {
    //instanciamos el objetoAjax
    var xmlhttp= new XMLHttpRequest();
    //uso del medotod GET
    //indicamos el archivo que realizará el proceso de eliminación
    //junto con un valor que representa el id del empleado
    xmlhttp.open("GET", "eliminacion.php?id_mov="+id_mov);
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4) {
        //mostrar resultados en esta capa
        divResultado.innerHTML = xmlhttp.responseText
      }
    }
    //como hacemos uso del metodo GET
    //colocamos null
    xmlhttp.send(null);
  }
}

function verProdsRuta() {
  
  var ajax = new XMLHttpRequest();
   //div donde se mostrará lo resultados
    divResultado = document.getElementById('prodCargados');
    idProdcuto=document.agregarProductos.producto.value;
    Cantidad=document.agregarProductos.cantidad.value;
    ruta=document.agregarProductos.idruta.value;
    dcto=document.agregarProductos.id_dcto.value;
    ajax.open("POST","productosRuta.php",true);
    ajax.onreadystatechange=function () {
      if (ajax.readyState==4){
        divResultado.innerHTML=ajax.responseText

      }
    }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
  ajax.send("id_prod="+idProdcuto+"&cantidad="+Cantidad+"&idruta="+ruta+"&id_dcto="+dcto);
}
