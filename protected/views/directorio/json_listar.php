<?php header('Content-Type: application/json; charset="UTF-8"'); ?>
<?php 
$json = '';
$json .= '{';
	if(isset($contenido['categoria']))	$json .= '"categoria":"'.$contenido['categoria'].'",';
	if(isset($contenido['subgenero'])) $json .= '"subgenero":"'.$contenido['subgenero'].'",';
	if(isset($contenido['pagina'])) $json .= '"pagina":"'.$contenido['pagina'].'",';
	$json .= '"perfiles":';
	$json .= '[';
		foreach($contenido['perfiles'] as $perfil):
		//$json .= '"perfil":';
		$json .= '{';
			$json .= '"nombre":"'.CHtml::encode($perfil->nombre).'",';
			$json .= '"slug":"'.$perfil->slug.'",';
			if($perfil->fotoses)
			{
			$json .= '"fotos":';
				$json .= '[';
				foreach($perfil->fotoses as $foto):
				//$json .= '"foto":';
				$json .= '{';
					$json .= '"url":"'.$foto->src.'",';
					$json .= '"es_perfil":"'.$foto->es_perfil.'"';
				$json .= '},';
				endforeach;
				$json = substr($json, 0, -1);
			$json .= '],';
			}else{
				$json = substr($json, 0, -1);
			}
			if($perfil->propuestases)
			{
			$json .= '"propuestas":';
			$json .= '[';
				foreach($perfil->propuestases as $propuesta):
				//$json .= '"propuesta":';
				$json .= '{';
					if($propuesta->subgenero) $json .= '"subgenero":"'.$propuesta->subgenero.'"';
				$json .= '},';
				endforeach;
				$json = substr($json, 0, -1);
			$json .= ']';
			}elseif($perfil->fotoses){
				$json = substr($json, 0, -1);
			}
		$json .= '},';
		endforeach;
		$json = substr($json, 0, -1);
	$json .= ']';
$json .= '}';
echo $json;
?>
<?php Yii::app()->end();?>