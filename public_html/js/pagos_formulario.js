const online = document.getElementById("online");
const contraentrega = document.getElementById("contraentrega");

const btnOnline = document.getElementById("pago-completo");
const btnContraentrega = document.getElementById("pago-contraentrega");

btnOnline.addEventListener("click", () => {
  online.classList.remove("hidden");
  contraentrega.classList.add("hidden");
});

btnContraentrega.addEventListener("click", () => {
  contraentrega.classList.remove("hidden");
  online.classList.add("hidden");

});

