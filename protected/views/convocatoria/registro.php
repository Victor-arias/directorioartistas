<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery.fileupload/jquery.fileupload-ui.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery.fileupload/jquery.fileupload-ui.css');
?>
<div class="masthead">
	<h3 class="muted">Logo Convocatoria</h3>
</div>
<div class="row-fluid">
	<div class="row">
		<div class="span12">
			<h3>Inscripción de Artistas para Programación de la Feria de las Flores</h3>
			<p>
				Tenga en cuenta que los campos que cuente con el ícono <i class="icon-lock"></i> son los datos que no serán públicos, 
				solo se utilizarán para el proceso de selección, evaluación y contacto.
			</p>
			<?php $form = $this->beginWidget('CActiveForm',
				array(
					"htmlOptions"=>array("class"=>"form-horizontal")					
					)); ?>
					<?php echo $form->errorSummary(array($formulario), '', '', array('class' => 'alert alert-error')); ?>
					<legend>Información para el ingreso al portal</legend>
					<div class="control-group">
						<?php echo $form->label($formulario, "username", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-append">    
								<?php echo $form->textField($formulario, "username") ?>          
								<span class="add-on"><i class="icon-lock"></i></span>
							</div>						
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "password", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-append">      
								<?php echo $form->passwordField($formulario, "password") ?>
								<span class="add-on"><i class="icon-lock"></i></span>
							</div>
						</div>
					</div>
					<legend>Propuesta</legend>
					<div class="control-group">
						<?php echo $form->label($formulario, "nombrePropuesta", array("class"=>"control-label")) ?>
						<div class="controls">
							<?php echo $form->textField($formulario, "nombrePropuesta") ?>
						</div>
					</div>	
					<legend>Datos del Representante y Datos de Contacto</legend>
					<div class="control-group">
						<?php echo $form->label($formulario, "representante", array("class"=>"control-label")) ?>
						<div class="controls">
							<?php echo $form->textField($formulario, "representante") ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "cedula", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-append">   
								<?php echo $form->textField($formulario, "cedula") ?>           
								<span class="add-on"><i class="icon-lock"></i></span>
							</div>						
						</div>
					</div>	
					<div class="control-group">
						<?php echo $form->label($formulario, "telefono", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-append">              
								<?php echo $form->textField($formulario, "telefono") ?>
								<span class="add-on"><i class="icon-lock"></i></span>
							</div>						
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "celular", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-append">              
								<?php echo $form->textField($formulario, "celular") ?>
								<span class="add-on"><i class="icon-lock"></i></span>
							</div>						
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "email", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-append">              
								<?php echo $form->emailField($formulario, "email") ?>
								<span class="add-on"><i class="icon-lock"></i></span>
							</div>						
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "direccion", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-append">   
								<?php echo $form->textField($formulario, "direccion", array("class"=>"input-xxlarge")) ?>           
								<span class="add-on"><i class="icon-lock"></i></span>
							</div>						
						</div>
					</div>	
					<legend>Información de la propuesta</legend>
					<div class="control-group">
						<?php echo $form->label($formulario, "area", array("class"=>"control-label")) ?>
						<div class="controls">
							<?php echo $form->radioButtonList($formulario, "area", array('1'=>'Música','2'=>'Danza',
							                                                             '3'=>'Teatro', '4'=>'Otros')); ?>
						</div>						
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "trayectoria", array("class"=>"control-label")) ?>
						<div class="controls">
							<?php echo $form->dropDownList($formulario, "trayectoria", array(
							                                                                ""=>"Seleccione trayectoria",
							                                                                "1"=>"De 1 a 5 Años",
							                                                                "2"=>"De 5 a 10 Años",
							                                                                "3"=>"De 10 Años en adelante")) ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "numeroIntegrantes", array("class"=>"control-label")) ?>
						<div class="controls">
							<?php echo $form->numberField($formulario, "numeroIntegrantes", array("class"=>"input-mini")) ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "resena", array("class"=>"control-label")) ?>
						<div class="controls">
							<?php echo $form->textArea($formulario, "resena", array("class"=>"input-xxlarge","rows"=>"20")) ?>
							<p class="help">Máximo 950 Caracteres</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="fotoPerfil">Foto del perfil</label>
						<div class="controls">
							<input type="file" id="fotoPerfil" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="fotosAdicionales">Fotos Adicionales</label>
						<div class="controls">
							<input type="file" id="fotosAdicionales" />
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "video", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-prepend">              
								<span class="add-on">http://</span>
								<?php echo $form->textField($formulario, "video", array("class"=>"input-xlarge")) ?>    
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="fotosAdicionales">Archivos de Audio</label>
						<div class="controls">
							<input type="file" id="fotosAdicionales" />
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "twitter", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-prepend">              
								<span class="add-on">t</span>
								<?php echo $form->textField($formulario, "twitter", array("class"=>"input-xlarge")) ?>
							</div>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "fb", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-prepend">              
								<span class="add-on">f</span>
								<?php echo $form->textField($formulario, "fb", array("class"=>"input-xlarge")) ?>
							</div>
						</div>
					</div>	
					<div class="control-group">
						<?php echo $form->label($formulario, "web", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-prepend">              
								<span class="add-on">http://</span>
								<?php echo $form->textField($formulario, "web", array('class'=>'input-xlarge')) ?>
							</div>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->label($formulario, "valor", array("class"=>"control-label")) ?>
						<div class="controls">
							<div class="input-prepend">              
								<?php echo $form->numberField($formulario, "valor", array('class'=>'input-large')) ?>
							</div>
						</div>
					</div>					
					<div class="form-actions">
						<?php echo CHtml::submitButton('Enviar mi propuesta', array("class"=>"btn btn-large btn-primary")) ?>
					</div>																																																																									
				<?php $this->endWidget(); ?>	
			</div>		
		</div>
	</div>
	<hr/>