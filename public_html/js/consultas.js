
const checkType = () => {
  const type = document.getElementById('consulta').value;
  const reservation = document.getElementById('reservation');
  const message = document.getElementById('message');
  if (type === 'reservacion') {
    reservation.classList.remove('hidden');
    message.classList.add('hidden');
  } else {
    reservation.classList.add('hidden');
    message.classList.remove('hidden');
  }
}