<?php
/* @var $this DirectorioController */
$sub = (isset($subgenero))? $subgenero:'';
$url = CHtml::normalizeUrl( Yii::app()->homeUrl . Utility::createSlug($categoria) .'/' . Utility::createSlug($sub) );
Yii::app()->clientScript->registerScript(
	'cargar-mas', 
	'	var perfiles = $("#perfiles");
	var	pagina 	 = '.($pagina+1).';

	perfiles.append("<a href=\''.$url.'?page='.($pagina+1).'\' class=\'cargar-mas\'>Cargar más</a>");
	
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

					/*


					PILAS, ACTUALIZAR LA URL
					TAMBIEN PILAS CUANDO SE CARGA UNA PÁGINA SIN ELEMENTOS



					*/
				}else{
					$(".cargar-mas").off("click", cargar_mas).remove();
				}
					
			}
		);
		
	}//cargar-mas', 
	CClientScript::POS_READY
);

$bc = array();
$bc[ucfirst($categoria)] = array('/'.$categoria);
if($subgenero) array_push($bc, ucfirst($subgenero));
$this->breadcrumbs = $bc;
?>
<h2>Artistas de la categoría <?php echo ucfirst($categoria) ?> <?php echo ucfirst($subgenero) ?></h2>

<div id="perfiles">
	<?php foreach($perfiles as $perfil): ?>
		<?php $this->renderPartial( '_perfil' , array( 'perfil' => $perfil, 'subgenero' => $subgenero ) );?>
	<?php endforeach; ?>
	<?php //echo CHtml::link( 'Cargar más' , $url, array('class' => 'cargar-mas') ); ?>
</div>