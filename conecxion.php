<?php
// --- CONFIGURACIÓN DE CONEXIÓN ---
$host = "mysql-cesar1500.alwaysdata.net"; // Servidor de AlwaysData
$usuario = "cesar1500";                    // Tu usuario MySQL
$contrasena = "TU_CONTRASEÑA_AQUÍ";       // ⚠️ Reemplaza con tu contraseña
$base_datos = "cesar1500_bd_colegio_respaldo"; // Nombre completo de la base

// --- CONECTAR A LA BASE DE DATOS ---
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("❌ Error al conectar: " . $conexion->connect_error);
}

// --- CONSULTA (muestra los primeros 100 registros de una tabla) ---
// ⚠️ Reemplaza 'nombre_de_tu_tabla' por el nombre real (por ejemplo 'Alumnos')
$sql = "SELECT * FROM nombre_de_tu_tabla LIMIT 100";
$resultado = $conexion->query($sql);

// --- MOSTRAR RESULTADOS ---
if ($resultado->num_rows > 0) {
    echo "<h2>Primeros 100 registros de la tabla</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";

    // Encabezados de columnas
    $campos = $resultado->fetch_fields();
    foreach ($campos as $campo) {
        echo "<th>" . htmlspecialchars($campo->name) . "</th>";
    }
    echo "</tr>";

    // Filas de datos
    $resultado->data_seek(0); // Reiniciar puntero
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        foreach ($fila as $valor) {
            echo "<td>" . htmlspecialchars($valor) . "</td>";
        }
        echo "</tr>";
    }

    echo "</tables>";
} else {
    echo "No hay registros en la tabla seleccionada.";
}

// --- CERRAR CONEXIÓN ---
$conexion->close();
?>
