<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	"htmlOptions"=>array("class"=>"form-horizontal"),
	'id'=>'login-form',
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<fieldset>
		<legend>Iniciar Sesión</legend>
		<div class="control-group <?php if($form->error($model, 'username')) echo ' error' ?>" >
			<?php echo $form->label($model, "username", array("class"=>"control-label")) ?>
			<div class="controls"> 
				<?php echo $form->textField($model, "username") ?>
				<?php echo $form->error($model, 'username') ?>						
			</div>
		</div>
		<div class="control-group <?php if($form->error($model, 'password')) echo ' error' ?>">
			<?php echo $form->label($model, "password", array("class"=>"control-label")) ?>
			<div class="controls">
				<?php echo $form->passwordField($model, "password") ?>
				<?php echo $form->error($model, 'password') ?>
			</div>
		</div>
		<div class="control-group <?php if($form->error($model, 'rememberMe')) echo ' error' ?>">
			<div class="controls">
			  <label class="checkbox">
			    <?php echo $form->checkBox($model,'rememberMe'); ?> <?php echo $form->label($model,'rememberMe'); ?>
			  </label>			  
			</div>
		</div>
		<div class="form-actions">
			<?php echo CHtml::submitButton('Login', array('class'=>"btn btn-large")); ?>				
		</div>				
	</fieldset>
	<?php $this->endWidget(); ?>
