const checkType = () => {
  const type = document.getElementById("consulta").value;
  const reservation = document.getElementById("reservation");
  if (type === "reservacion") {
    reservation.classList.remove("hidden");
  } else {
    reservation.classList.add("hidden");
  }
};

const checkRequired = (event) => {
  const type = document.getElementById("consulta").value;
  const error = document.getElementById("error");
  error.classList.add("hidden");
  const message = document.getElementById("message");
  if (type === "reservacion") {
    const partners = document.getElementById("partners");
    const date = document.getElementById("day_selected");
    const time = document.getElementById("time");
    if (!partners.value || !date.value || !time.value || !message.value) {
      event.preventDefault();
      error.classList.remove("hidden");
      error.innerHTML = "Todos los campos requeridos, ingresalos por favor";
    }
  } else {
    if (!message.value) {
      event.preventDefault();
      error.classList.remove("hidden");
      error.innerHTML = "Todos los campos requeridos, ingresalos por favor";
    }
  }
};