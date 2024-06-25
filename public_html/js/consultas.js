const type = document.getElementById('consulta').value;
const checkType = () => {
  const reservation = document.getElementById('reservation');
  if (type === 'reservacion') {
    reservation.classList.remove('hidden');
  } else {
    reservation.classList.add('hidden');
  }
};

const checkRequired = (event) => {
  const error = document.getElementById('error');
  error.classList.add('hidden');
  const partners = document.getElementById('partners').value;
  const date = document.getElementById('date_selected').value;
  const time = document.getElementById('time_selected').value;
  const message = document.getElementById('message').value;
  if (type === 'reservacion') {
    console.log(partners, date, time);
    if (partners === '' || date === '' || time === '', message === '') {
      event.preventDefault();
      error.classList.remove('hidden');
      error.innerHTML = 'Todos los campos requeridos, ingresalos por favor';
    }
  }else{
    if (message === '') {
      event.preventDefault();
      error.classList.remove('hidden');
      error.innerHTML = 'Todos los campos requeridos, ingresalos por favor';
    }
  }
};