<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mundovision";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST["nombre"]);
    $correo = $conn->real_escape_string($_POST["correo"]);
    $contraseña = $conn->real_escape_string($_POST["contraseña"]);

    // Verificar que las contraseñas coincidan
    if ($_POST["contraseña"] === $_POST["confirmar"]) {
        $sql = "INSERT INTO registrar (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar: " . $conn->error;
        }
    } else {
        echo "Las contraseñas no coinciden.";
    }
}

$conn->close();
?>