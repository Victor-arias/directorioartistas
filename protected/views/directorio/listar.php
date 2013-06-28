<?php
/* @var $this DirectorioController */
$np  = count($perfiles);
$sub = (isset($subgenero))? $subgenero:'';
$url = CHtml::normalizeUrl( Yii::app()->homeUrl . Utility::createSlug($categoria) .'/' . Utility::createSlug($sub) );
Yii::app()->clientScript->registerScript(
	'cargar-mas', 
	'	var perfiles = $("#perfiles");
	var	pagina 	 = '.($pagina+1).';
	var np 		 = ' . $np . '	  ;

	if(np)
	{
		perfiles.append("<a href=\''.$url.'?page='.($pagina+1).'\' class=\'cargar-mas\'>Cargar más</a>");
	}	
	
	$(".cargar-mas").on("click", cargar_mas);

	function cargar_mas(e)
	{
		e.preventDefault();
		$.get( 
			"'.$url.'", 
			{page:pagina}, 
			function(data){
				//console.log(data.perfiles);
				if(Object.keys(data.perfiles).length >= 12){
					pagina = parseInt(data.pagina)+1;
					var link = $(".cargar-mas").attr("href");
					link = link.trim();
					link = link.substr(0, link.length-1);
					link += pagina;
					$(".cargar-mas").attr("href", link);
					cargar_perfiles(data);
					
					/*

					PILAS, ACTUALIZAR LA URL

					*/
				}else{
					$(".cargar-mas").off("click", cargar_mas).remove();
				}
					
			}
		);
		
	}//cargar-mas

	function cargar_perfiles(data)
	{
		$.each(data.perfiles, function(index, value){
			console.log(value);
			var html = "";
			html += "<div class=\'perfil\'>";
			html += "	<div class=\'categoria\'>";
			html += "		<span class=\'\'>"+data.categoria+"</span>";
			if(data.subgenero) html += "		<span>"+data.subgenero+"</span>";
			html += "	</div>";
			html += "	<img src=\'\' width=\'140\' height=\'130\' alt=\'value.nombre\' />";
			html += "";
			html += "";
			html += "";
			html += "";
			html += "";
			html += "";
			html += "</div>";
			//perfiles.append( cargar_perfil() );
		});
		
	}//cargar-perfiles
	', 
	CClientScript::POS_READY
);

$bc = array();
$bc[ucfirst($categoria)] = array('/'.$categoria);
if($subgenero) array_push($bc, ucfirst($subgenero));
$this->breadcrumbs = $bc;
?>
<h2>Artistas de la categoría <?php echo ucfirst($categoria) ?> <?php echo ucfirst($subgenero) ?></h2>

<div id="perfiles">
	<?php if( $np ): ?>
		<?php foreach($perfiles as $perfil): ?>
			<?php $this->renderPartial( '_perfil' , array( 'perfil' => $perfil, 'subgenero' => $subgenero ) );?>
		<?php endforeach; ?>
	<?php else: ?>
		<p>¡Ooops! No hemos encontrado artistas, puedes usar el menú o el buscador para ver otros artístas.</p>
	<?php endif; ?>
</div>