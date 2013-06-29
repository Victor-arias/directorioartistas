<?php /* @var $this Controller */ 
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1024">
    <meta name="description" content="Es el momento para presentar tu propuesta artística y hacer parte de la programación cultural de la Feria de las Flores 2013. Este es el formulario para inscribirte como solista, con una agrupación o un colectivo.">
    <meta name="author" content="telemedellín">
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <!--[if LTE IE 8]>
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" />
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.custom.95570.js"></script>
    <![endif]-->
    <style>
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        padding-left: 20px;
        padding-right: 20px;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  </head>
  <body>
 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo CHtml::link('Feria de las Flores', array('propuestas/listar'), array("class"=>"brand")) ?>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li class="active"><a href="#"><?php echo $this->user->username ?></a></li>
              <li class="divider"></li>
              <li><?php echo CHtml::link('Salir', array('site/logout')) ?></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      <?php echo $content ?>
  </body>
</html>
