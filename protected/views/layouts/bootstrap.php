<?php /* @var $this Controller */ 
Yii::app()->clientScript->registerScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/vendor/jquery.ui.widget.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/tmpl.min.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/load-image.min.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/canvas-to-blob.min.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.iframe-transport.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.fileupload.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.fileupload-process.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.fileupload-resize.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.fileupload-validate.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.fileupload-ui.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/app.js", CClientScript::POS_END);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
      <h1><?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/logo_feria_medium.png', 'Feria de las flores Medellín, 2 al 11 de agosto de 2013', array('width' => 219, 'height' => 197)), array('/') ) ?></h1>
      <div class="logos">
        <?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/logo_bureau_medium.png', 'Medellín convention & visitors bureau', array('width' => 100, 'height' => 69)) , CHtml::normalizeUrl('http://www.medellinconventionbureau.com'), array('target' => '_blank') )  ?>
        <?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/logo_alcaldia_medium.png', 'Alcaldía de Medellín', array('width' => 100, 'height' => 69)) , CHtml::normalizeUrl('http://www.medellin.gov.co'), array('target' => '_blank') ) ?>
        <?php echo CHtml::link( CHtml::image(Yii::app()->request->baseUrl . '/images/galleta_logo.png', 'Medellín, un hogar para la vida', array('width' => 316, 'height' => 166)) , CHtml::normalizeUrl('http://www.medellin.gov.co'), array('target' => '_blank', 'class' => 'galleta') ) ?>
      </div>
      <div class="fechas">
        <div>
          1 de Junio al 30 de Junio de 2013
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
      </div>
    </header>
    <div class="container">
      <?php echo $content ?>
    </div> <!-- /container -->  
    <input type="hidden" value="<?php echo Yii::app()->request->baseUrl ?>" id="PUBLIC_PATH"/>
  </body>
</html>
