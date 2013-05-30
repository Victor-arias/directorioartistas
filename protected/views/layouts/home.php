<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1024">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/base-home.css" />  
    <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" />-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  </head>
  <body>
    <div class="container">
      <?php echo $content ?>
    </div> <!-- /container -->
    <footer>
      <div class="logos-pie">
        <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/logo_bureau.png', 'Medellín convention & visitors bureau', array('width' => 146, 'height' => 99)) ?>
        <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/logo_alcaldia.png', 'Alcaldía de Medellín', array('width' => 146, 'height' => 99)) ?>
      </div>
    </footer>

    <!-- Javascript -->
    <?php Yii::app()->clientScript->registerScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js", CClientScript::POS_END) ?>    
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/app.js", CClientScript::POS_END) ?>    
  </body>
</html>
