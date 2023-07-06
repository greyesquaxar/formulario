

<!DOCTYPE html>
<html>
<head>
    <title>Formulario</title>
    <link rel="stylesheet" type="text/css" href="estilos.css" >
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Usuarios</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Pasatiempo</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['pasatiempo']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    
</body>
</html>

