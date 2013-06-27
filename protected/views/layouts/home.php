<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1024">
    <meta name="description" content="Es el momento para presentar tu propuesta artística y hacer parte de la programación cultural de la Feria de las Flores 2013. Este es el formulario para inscribirte como solista, con una agrupación o un colectivo.">
    <meta name="author" content="telemedellín">
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/base-home.css" />  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <!--[if LTE IE 8]>
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" />
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.custom.95570.js"></script>
    <![endif]-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  </head>
  <body>
    <div class="container">
      <?php echo $content ?>
    </div> <!-- /container -->
    <footer>
      <div class="logos-pie">
        <?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/logo_bureau.png', 'Medellín convention & visitors bureau', array('width' => 146, 'height' => 99)) , CHtml::normalizeUrl('http://www.medellinconventionbureau.com'), array('target' => '_blank') )  ?>
        <?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/logo_alcaldia.png', 'Alcaldía de Medellín', array('width' => 146, 'height' => 99)) , CHtml::normalizeUrl('http://www.medellin.gov.co'), array('target' => '_blank') ) ?>
      </div>
    </footer>
    <div id="fp"></div>

    <!-- Javascript -->
    <?php Yii::app()->clientScript->registerScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js", CClientScript::POS_END) ?>    
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/app.js", CClientScript::POS_END) ?>    
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
