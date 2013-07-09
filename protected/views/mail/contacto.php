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
					<p>Has recibido un mensaje a través del perfil de <?php echo $datos['nombre'] ?> en el <?php echo CHtml::link('Directorio Artísticio de la Feria de las Flores', CHtml::normalizeUrl('http://www.feriadelasfloresmedellin.gov.co/directorio') ); ?>. </p>
					<p>El mensaje es el siguiente:</p>
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