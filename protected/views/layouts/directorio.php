<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1024">
    <meta name="description" content="">
    <meta name="author" content="telemedellín">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/base.css" />  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <!--[if LTE IE 8]>
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" />
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.custom.95570.js"></script>
    <![endif]-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  </head>
  <body>
    <header>
      <h1><?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/logo_feria_medium.png', 'Feria de las flores Medellín, 2 al 11 de agosto de 2013', array('width' => 219, 
'height' => 197)), CHtml::normalizeUrl(Yii::app()->homeUrl) ) ?></h1>
      <div class="logos">
        <?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/logo_bureau_medium.png', 'Medellín convention & visitors bureau', array('width' => 100, 'height' => 69)) , CHtml::normalizeUrl('http://www.medellinconventionbureau.com'), array('target' => '_blank') )  ?>
        <?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/logo_alcaldia_medium.png', 'Alcaldía de Medellín', array('width' => 100, 'height' => 69)) , 
CHtml::normalizeUrl('http://www.medellin.gov.co'), array('target' => '_blank') ) ?>
        <?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/galleta_logo.png', 'Medellín, un hogar para la vida', array('width' => 316, 'height' => 166)) , CHtml::normalizeUrl('http://www.medellin.gov.co'), array('target' => '_blank', 'class' => 'galleta') ) ?>
      </div>
      <!--<div class="fechas">
        <div>
          4 de Junio al 30 de Junio de 2013
          <strong class="current">Convocatoria</strong>
        </div>
        <div>
          1 de Julio al 15 de Julio de 2013
          <strong class="next">Evaluación</strong>
        </div>
        <div>
          15 de Julio de 2013
          <strong class="prev">Publicación de resultados</strong>
        </div>
      </div>-->
    </header>
    <nav>
      <?php 
        $this->widget( 'zii.widgets.CMenu', 
          array(
            'items'=>array(
              array( 'label' => 'Música' , 'url' => array('/musica'), 
                'items' => array(
                  array('label' => 'Tropical'           , 'url' => array('/musica/tropical')),
                  array('label' => 'Popular tradicional', 'url' => array('/musica/popular-tradicional')),
                  array('label' => 'Popular urbana'     , 'url' => array('/musica/urbana')),
                  array('label' => 'Clásica'            , 'url' => array('/musica/clasica')),
                  array('label' => 'Folclor'            , 'url' => array('/musica/folclor')),
                  array('label' => 'Jazz y músicas del mundo', 'url' => array('/musica/jazz-y-musicas-del-mundo')),
                  array('label' => 'Fusión'             , 'url' => array('/musica/fusion')),
                  array('label' => 'Experimental'       , 'url' => array('/musica/experimental')),
                  array('label' => 'Infantil'           , 'url' => array('/musica/infantil')),
                ),
              ),
              array( 'label' => 'Danza'  , 'url' => array('/danza') ),
              array( 'label' => 'Teatro' , 'url' => array('/teatro') ),
              array( 'label' => 'Otros'  , 'url' => array('/otros'), 
                'items' => array(
                  array('label' => 'Magia'      , 'url' => array('/otros/magia')),
                  array('label' => 'Clown'      , 'url' => array('/otros/clown')),
                  array('label' => 'Malabarismo', 'url' => array('/otros/malabarismo')),
                  array('label' => 'Mimos'      , 'url' => array('/otros/mimos')),
                  array('label' => 'Cuentería'  , 'url' => array('/otros/cuenteria')),
                  array('label' => 'Humor'      , 'url' => array('/otros/humor')),
                ),
              ),
            ),
          )
        );
      ?>
    </nav>
   
   
    <div class="container">
    
	
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
    
      
      <?php 
        $home = ($this->action->id == 'index') ? $this->action->id : false;
        $this->widget('Buscador', array('home' => $home) ); 
      ?>
        
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
