

<?php
session_start();
echo " <nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
<script src='https://code.jquery.com/jquery-3.4.1.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx' crossorigin='anonymous'></script>

";
if (isset($_SESSION['id'])){
    echo "
    <a class='navbar-brand' href='/Biblioteca/src/inicio.php'>Menú</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNavDropdown'>
        <ul class='navbar-nav'>
        <li class='nav-item active'>
            <a class='nav-link' href='/Biblioteca/Buscador/index.php'>Libros</a>
        </li>";
        if ($_SESSION['admin'] == 1){
            echo "
            <li class='nav-item active'>
                <a class='nav-link' href='/Biblioteca/Administracion/index.php'>Subir libros</a>
            </li>
              <li class='nav-item active'>
                <a class='nav-link' href='/Biblioteca/Administracion/admin_users.php'>Administrar Ususarios</a>
            </li>
            <li class='nav-item active'>
                <a class='nav-link' href='/Biblioteca/Administracion/listado.php'>Editar libros</a>
            </li>
            ";
        }
        echo "
        <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            opciones
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
            <a class='dropdown-item' href='/Biblioteca/Usuarios/Perfil.php'>Perfil</a>
            <form class='dropdown-item' action='/Biblioteca/src/Header/Cerrarsesion.php?link=$_SERVER[REQUEST_URI]' method='POST'>
            <button class='btn btn-outline-success' type='submit'>Cerrar sesión</button>
            </form>
            </div>
        </li>
        </ul>
    </div>
    ";
}
else{
    echo "
    <a class='navbar-brand' href='/Biblioteca/src/inicio.php'>Menú</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNavDropdown'>
        <ul class='navbar-nav'>
        <li class='nav-item active'>
            <a class='nav-link' href='/Biblioteca/Buscador/index.php'>Libros</a>
        </li>
        <form class='form-inline'>
            <a class='btn btn-outline-success' href='/Biblioteca/Usuarios/Login.html'>Ingresarse</a>
            <a class='btn btn-outline-success' href='/Biblioteca/Usuarios/SignUp.html'>Registrarse</a>
        </form>
    </ul>
    ";
}

?>
</nav>
</body>
</html>