<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdform";

// Conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y filtrar los datos
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $edad = $_POST['edad'];
    $pasatiempo = htmlspecialchars($_POST['pasatiempo']);

    // Consulta de inserción
    $sql = "INSERT INTO usuarios (nombre, correo, edad, pasatiempo) VALUES (?, ?, ?, ?)";
    
    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    
    // Asignar los valores y ejecutar la consulta
    $stmt->bind_param("ssis", $nombre, $correo, $edad, $pasatiempo);
    if ($stmt->execute()) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }
    // Cerrar el statement
    $stmt->close();
}

// Consulta para obtener los datos de la tabla
$sql = "SELECT id, nombre, correo, pasatiempo FROM usuarios";
$result = $conn->query($sql);

// Cerrar la conexión
$conn->close();


?>

<form method="POST" action="">
        <!-- campos del formulario -->
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="number" name="edad" placeholder="Edad" min="1" pattern="^[0-9]+" required>
        <textarea name="pasatiempo" placeholder="Pasatiempo favorito" required></textarea>

        <button onclick="redireccionar()" >Enviar</button>
</form>

<script>
        function redireccionar() {
            window.location.href = "formulario.php";
        }
</script>