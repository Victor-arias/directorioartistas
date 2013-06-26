<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1024">
    <meta name="description" content="">
    <meta name="author" content="telemedellín">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <!--[if LTE IE 8]>
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" />
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.custom.95570.js"></script>
    <![endif]-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  </head>
  <body>
    <header>
      <h1><?php echo CHtml::link( 'Directorio de artistas' , CHtml::normalizeUrl(Yii::app()->homeUrl) ) ?></h1>
    </header>
    <nav>
      <?php 
        $this->widget( 'zii.widgets.CMenu', 
          array(
            'items'=>array(
              array( 'label' => 'Música' , 'url' => array('/musica') ),
              array( 'label' => 'Danza'  , 'url' => array('/danza') ),
              array( 'label' => 'Teatro' , 'url' => array('/teatro') ),
              array( 'label' => 'Otros'  , 'url' => array('/otros') ),
            ),
          )
        );
      ?>
    </nav>
    <?php if(isset($this->breadcrumbs)): ?>
      <?php 
        $this->widget( 'zii.widgets.CBreadcrumbs', 
          array(
            'homeLink' => CHtml::link( 'Inicio' , CHtml::normalizeUrl(Yii::app()->homeUrl) ),
            'separator'=> ' > ',
            'links'    => $this->breadcrumbs,
          )
        ); 
      ?><!-- breadcrumbs -->
    <?php endif; ?>
    <div id="buscador">
      <?php $form = $this->beginWidget('CActiveForm', array(
          'id'=>'search-form',
          'enableAjaxValidation'=>true,
          'enableClientValidation'=>true,
          'action' => Yii::app()->homeUrl.'directorio/search'
      )); ?>
      <div class="row">
          <?php
          $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
              'name' => 'artista',
              'model' => new Perfiles, 
              //'source'=> array('Los trasnocha perros','cash','El tropicombo'),
              'sourceUrl' => 'directorio/search', 
              // additional javascript options for the autocomplete plugin
              'options'=>array(
                  'minLength'=>'2',
              ),
              'htmlOptions'=>array(
                  //'style'=>'height:20px;',
              ),
          ));
          ?>
      </div>
      <div class="row">
        <?php echo CHtml::submitButton('Buscar', array("class"=>"btn")) ?>
      </div>

      <?php $this->endWidget(); ?>
    </div>
    <div class="container">
      <?php echo $content ?>
    </div> <!-- /container -->  
    <footer></footer>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-41382664-1', 'feriadelasfloresmedellin.gov.co');
      ga('send', 'pageview');
    </script>    
  </body>
</html>
