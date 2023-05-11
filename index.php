<!DOCTYPE html>
<style type="text/css">
body{font-family:arial;display:flex;justify-content:center;align-items:center;height:100vh;background-color:black}h1{font-size:4em;color:#fff5d6;text-align:center}
</style>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Feriados</title>
</head>
<body>
<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
$feriados = array(
    '01-01',  // Año Nuevo
    '02-20',  // Carnaval
    '02-21',  // Carnaval       
    '03-24',  // Día Nacional de la Memoria por la Verdad y la Justicia
    '04-02',  // Día del Veterano y de los Caídos en la Guerra de Malvinas
    '05-01',  // Día del Trabajador
    '05-25',  // Día de la Revolución de Mayo
    '05-26',  // Fines Turisticos    
    '06-17',  // Paso a la Inmortalidad del Gral. Don Martín Miguel de Güemes
    '06-19',  // Fines turisticos    
    '06-20',  // Paso a la Inmortalidad del Gral. Manuel Belgrano
    '07-09',  // Día de la Independencia
    '11-20'   // Día de la Soberanía Nacional    
    '12-08',  // Inmaculada Concepción de María
    '12-25'   // Navidad
);

$hoy = date('m-d');
foreach ($feriados as $feriado) {
    if ($feriado >= $hoy) {
        break;
    }
}
// Calcular los días restantes hasta el próximo feriado
$fecha_feriado = date_create_from_format('m-d', $feriado);
$fecha_actual = date_create_from_format('m-d', $hoy);
$dias_restantes = date_diff($fecha_actual, $fecha_feriado)->format('%a');

// Mostrar el resultado
echo '<h1>Faltan ' . $dias_restantes . ' días para el próximo feriado (' . $fecha_feriado->format('d-m-Y') . ').<h1/>';
?>
</body></html>