document.addEventListener("DOMContentLoaded", () => {
    const pathSegments = window.location.pathname.split('/');
    const rootFolder = pathSegments.length > 1 ? pathSegments[1] : '';
    const basePath = `/${rootFolder}`;
    const elements = document.querySelectorAll('a[route], button[route], div[route]');
    
    elements.forEach(element => {
        const routeAttribute = element.getAttribute('route');
        const route = `${basePath}${routeAttribute}`;
        if (element.tagName === 'A') {
            element.href = route;
        } else if (['BUTTON', 'DIV'].includes(element.tagName)) {
            element.onclick = () => window.location.href = route;
        }
    });
});