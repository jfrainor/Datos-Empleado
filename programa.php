<?php
$empleados = array();

// Obtener datos enviados en el formulario
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$estadoCivil = $_POST['estado_civil'];
$sexo = $_POST['sexo'];
$sueldo = $_POST['sueldo'];

// Agregar los datos al array empleados
$empleado = array(
    'nombre' => $nombre,
    'edad' => $edad,
    'estado_civil' => $estadoCivil,
    'sexo' => $sexo,
    'sueldo' => $sueldo
);
$empleados[] = $empleado;

// Cálculos solicitados
$totalFemenino = 0;
$totalHombresCasados = 0;
$totalMujeresViudas = 0;
$totalEdadHombres = 0;
$contadorHombres = 0;

foreach ($empleados as $empleado) {
    if ($empleado['sexo'] == 'femenino') {
        $totalFemenino++;
        if ($empleado['estado_civil'] == 'viudo' && $empleado['sueldo'] == 'entre_1000_2500') {
            $totalMujeresViudas++;
        }
    }
    if ($empleado['sexo'] == 'masculino') {
        if ($empleado['estado_civil'] == 'casado' && $empleado['sueldo'] == 'mas_de_2500') {
            $totalHombresCasados++;
        }
        
        $totalEdadHombres += $empleado['edad'];
        $contadorHombres++;
    }
}

$promedioEdadHombres = ($contadorHombres > 0) ? $totalEdadHombres / $contadorHombres : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
        <h2>Datos recolectados</h2>
        <p>Total de empleados del sexo femenino: <?php echo $totalFemenino; ?></p>
        <p>Total de hombres casados que ganan más de Bs. 2500: <?php echo $totalHombresCasados; ?></p>
        <p>Total de mujeres viudas que ganan más de Bs. 1000: <?php echo $totalMujeresViudas; ?></p>
        <p>Edad promedio de los hombres: <?php echo $promedioEdadHombres; ?></p>
    </div>
    <script src="script.js"></script>
</body>
</html>
