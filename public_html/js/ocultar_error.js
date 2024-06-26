function on_page_load() {
    setTimeout(hide_error, 3000);
}
function hide_error() {
    var error_element = document.querySelector(".estilo_error");
    if (error_element) {
        error_element.style.display = "none";
    }
}
window.onload = on_page_load();
cambiar_pantallas();