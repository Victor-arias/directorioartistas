<?php
date_default_timezone_set('America/Bogota');
switch ($area) {
	case '1':
		$nArea = "Musica";
		$criterio = 1;
		break;
	case '2':
		$nArea = "Danza";
		$criterio = 11;
		break;
	case '3':
		$nArea = "Teatro";
		$criterio = 21;
		break;
	default:
		$nArea = "Otro";
		$criterio = 31;
		break;
}
$archivo = 'Faltantes'.$nArea.'_' .date('Y-m-d_H-i-s') .".xls";
header('Content-type: application/vnd.ms-excel; charset=UTF-8');
header("Content-Disposition: attachment; filename=" . $archivo);
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>
	<tr>
		<td>ID</td>
		<td>Nombre</td>
		<td>Nombre Propuesta</td>
		<td>Representante<td>
		<td>C&eacute;dula Representante</td>
		<td>Tel&eacute;fono</td>
		<td>Celular</td>
		<td>Email</td>
		<td>Direcci&oacute;n</td>
		<td>Trayectoria</td>
		<td># Integrantes</td>
		<td>Valor Presentaci&oacute;n</td>
		<td>&Aacute;rea</td>
		<td>Jurado</td>
	</tr>
	<?php foreach($perfiles as $perfil): ?>
	<?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=$criterio AND propuestas_id=".$perfil->propuestases[0]->id); ?>		
	<?php if(is_null($p->puntaje)): ?>	
	<tr>		
		<td><?php echo $perfil->id ?></td>
		<td><?php echo utf8_decode($perfil->nombre) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->nombre) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->representante) ?><td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->cedula) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->telefono) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->celular) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->email) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->direccion) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->trayectoria) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->numero_integrantes) ?></td>
		<td><?php echo number_format($perfil->propuestases[0]->valor_presentacion) ?></td>
		<td><?php echo $nArea ?></td>
		<?php $suma = 0; ?>
		<td><?php echo utf8_decode($perfil->propuestases[0]->jurado->nombre_completo) ?></td>
	</tr>
<?php endif; ?>
	<?php endforeach; ?>	
<table>