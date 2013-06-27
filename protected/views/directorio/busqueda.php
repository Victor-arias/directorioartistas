<?php
/* @var $this DirectorioController */
$this->breadcrumbs = array('Resultados de búsqueda');
?>
<h2>Resultados de búsqueda para "<?php echo $termino; ?>"</h2>
<div id="perfiles">
	<?php foreach($perfiles as $perfil): ?>
		<?php $this->renderPartial( '_perfil' , array( 'perfil' => $perfil ) );?>
	<?php endforeach; ?>
<div class="pagination">
	<?php $this->widget('CLinkPager', array(
	    'currentPage' 			=> $paginas->getCurrentPage(),
	    'pages' 				=> $paginas,
	    'htmlOptions' 			=> array('class'=>''),
	    'firstPageLabel'		=> 'Primero',
	    'prevPageLabel' 		=> '< Anterior',
	    'selectedPageCssClass' 	=> 'active',
	    'nextPageLabel' 		=> 'Siguiente >',
	    'lastPageLabel' 		=> 'Último'
	)) ?>
</div>
</div>