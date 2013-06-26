<?php
/* @var $this DirectorioController */
$this->breadcrumbs = array('Resultados de búsqueda');
?>
<h2>Resultados de búsqueda</h2>
<div id="perfiles">
<?php
	$dataProvider = $perfiles;
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider' => $dataProvider,
	    'itemView'=>'_perfil',   // refers to the partial view named '_post'
	    'sortableAttributes'=>array(
	        'nombre'	        
	    ),
	));
?>
</div>