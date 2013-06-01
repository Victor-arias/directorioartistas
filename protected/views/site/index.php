<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="logo-medellin">
	<?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/galleta_logo.png', 'Medellín, un hogar para la vida', array('width' => 316, 'height' => 166)) , CHtml::normalizeUrl('http://www.medellin.gov.co'), array('target' => '_blank') ) ?>
</div>
<div class="row">
	<div class="span8">
		<h1 class="logo-feria">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/logo_feria.png', 'Feria de las flores Medellín, 2 al 11 de agosto de 2013', array('width' => 400, 'height' => 363)) ?>
		</h1>
		<p class="btns">
			<?php echo CHtml::link( 'Versión en español', array('/'), array('class'=> 'vespanol btn', 'target' => '_blank') ); ?> 
			<?php echo CHtml::link( 'English version', array('/'), array('class'=> 'venglish btn','target' => '_blank', 'lang' => 'en') ); ?>
		</p>
		<span id="fucking-flor"></span>
	</div>
</div>