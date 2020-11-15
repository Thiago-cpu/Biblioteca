
<?php
$mysqli = new mysqli("localhost", "root", "", "libreria");
// $mysqli = new mysqli("blveo1ybzx7z80x46i4n-mysql.services.clever-cloud.com", "u1dqc2qrqilkz2mq", "mgRy9Tm6tdXFft9aoh3h", "blveo1ybzx7z80x46i4n");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>