function mostrar_formulario(divId) {
  // Obtén todos los elementos con la clase común a los divs
  var elementos = document.querySelectorAll(".Formulario");
  document.getElementById("miFrame").style.display = "none";


  elementos.forEach(function (elemento) {
    elemento.style.display = "none";
  });

  var div = document.getElementById(divId);

  if (div.style.display === "none") {
    div.style.display = "block";
  } else {
    div.style.display = "none";
  }

}

function cargarNuevaPagina(r) {

  var elementos = document.querySelectorAll(".Formulario");

  // Oculta todos los divs
  elementos.forEach(function (elemento) {
    elemento.style.display = "none";
  });


  
  var iframe = document.getElementById("miFrame");
  iframe.src = r;
  iframe.style.display = "block";
}

