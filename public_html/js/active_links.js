const linksNav = document.querySelectorAll('.nav-link');
linksNav.forEach(link => {
    const path = window.location.pathname;
    const linkPath = new URL(link.href).pathname;
    if (path === linkPath) {
        link.classList.add('text-light', 'active');
    } else {
        link.classList.remove('text-light', 'active');
    }
});