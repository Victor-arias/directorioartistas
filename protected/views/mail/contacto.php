<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="language" content="es" />
</head>
<body bgcolor="#eee" style="background-color: #eee;">
	<center>
	<table  bgcolor="#fff" style="display: inline-table; margin:0 auto" border="0" cellpadding="0" cellspacing="0" width="605">
		<tr>
			<td>
				<!--<img src="" width="605" height="154" />-->
			</td>
		</tr>
		<tr>
			<td>
				<center>
				<table style="display: inline-table; margin:0 auto" border="0" cellpadding="0" cellspacing="0" width="500">
					<p>Hola, <?php echo $datos['nombre'] ?> te ha enviado el siguiente mensaje a través de <?php echo CHtml::link('El directorio de artistas de la feria de las flores', CHtml::normalizeUrl('http://www.feriadelasfloresmedellin.gov.c/directorio') ); ?>: </p>
					<p><?php echo nl2br($datos['mensaje']); ?></p>
				</table>
				</center>
			</td>
		</tr>
		<tr>
			<td>
				<!--<img src="" width="605" height="113" />-->
			</td>
		</tr>
	</table>
	</center>
</body>
</html>