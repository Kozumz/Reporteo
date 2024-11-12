// Obtener los privilegios del usuario desde PHP
const userPrivileges = priv;

// Añadir evento de clic a los elementos del menú de navegación
document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', function(event) {
        console.log (userPrivileges);
        if(userPrivileges === 'admin') {return;}
        else {
        const pressBt = this.getAttribute('data-value');
        if((userPrivileges == 'nu' && pressBt == 'usuarios-link') || (userPrivileges == 'nu' && pressBt == 'reportes-link')) {
            event.preventDefault();
            alert('No tienes permisos para acceder a esta página.');
        }
        else if((userPrivileges == 'su' && pressBt == 'usuarios-link')){
            event.preventDefault();
            alert('No tienes permisos para acceder a esta página.');
        }
    }
    });
});
