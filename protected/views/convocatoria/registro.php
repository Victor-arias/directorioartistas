<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery.fileupload/jquery.fileupload-ui.css');
?>
<div class="row-fluid">
	<div class="span12">
		<h2>Inscripción de Artistas para Programación de la Feria de las Flores</h2>
		<p>
			Los campos con el ícono <i class="icon-privado"></i> no son visibles al público, sólo serán tenidos en cuenta internamente para el proceso de selección, evaluación y contacto
		</p>			
		<?php $form = $this->beginWidget('CActiveForm',
			array(
				"htmlOptions"=>array("class"=>"form-horizontal")					
				)); ?>
				<?php //echo $form->errorSummary(array($formulario), '', '', array('class' => 'alert alert-error')); ?>
			<fieldset>
				<legend>Registro para identificarse en el portal</legend>
				<div class="control-group <?php if($form->error($formulario, 'username')) echo ' error' ?>" >
					<?php echo $form->label($formulario, "username", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado"></i>
						<div class="input-append">    
							<?php echo $form->textField($formulario, "username", array("rel"=>"popover", "data-original-title"=>$formulario->getAttribute('username'), "data-content"=>$formulario->getTooltip('username'))) ?>
						</div>
						<?php echo $form->error($formulario, 'username') ?>						
					</div>
				</div>
				<div class="control-group <?php if($form->error($formulario, 'password')) echo ' error' ?>">
					<?php echo $form->label($formulario, "password", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado"></i>
						<div class="input-append">      
							<?php echo $form->passwordField($formulario, "password", array("rel"=>"popover", "data-original-title"=>$formulario->getAttribute('password'), "data-content"=>$formulario->getTooltip('password'))) ?>
						</div>
						<?php echo $form->error($formulario, 'password') ?>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Propuesta</legend>
				<div class="control-group <?php if($form->error($formulario, 'nombrePropuesta')) echo ' error' ?>">
					<?php echo $form->label($formulario, "nombrePropuesta", array("class"=>"control-label")) ?>
					<div class="controls">
						<?php echo $form->textField($formulario, "nombrePropuesta", array("rel"=>"popover", "data-original-title"=>$formulario->getAttribute('nombrePropuesta'), "data-content"=>$formulario->getTooltip('nombrePropuesta'))) ?>
						<?php echo $form->error($formulario, 'nombrePropuesta') ?>
					</div>
				</div>	
				<legend>Datos del Representante y Datos de Contacto</legend>
				<div class="control-group <?php if($form->error($formulario, 'representante')) echo ' error' ?>">
					<?php echo $form->label($formulario, "representante", array("class"=>"control-label")) ?>
					<div class="controls">
						<?php echo $form->textField($formulario, "representante", array("rel"=>"popover", "data-original-title"=>$formulario->getAttribute('representante'), "data-content"=>$formulario->getTooltip('representante'))) ?>
						<?php echo $form->error($formulario, 'representante') ?>
					</div>
				</div>
				<div class="control-group  <?php if($form->error($formulario, 'cedula')) echo ' error' ?>">
					<?php echo $form->label($formulario, "cedula", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado"></i>
						<div class="input-append">   
							<?php echo $form->textField($formulario, "cedula", array("rel"=>"popover", "data-original-title"=>$formulario->getAttribute('cedula'), "data-content"=>$formulario->getTooltip('cedula'))) ?>           
						</div>
						<?php echo $form->error($formulario, 'cedula') ?>						
					</div>
				</div>	
				<div class="control-group <?php if($form->error($formulario, 'telefono')) echo ' error' ?>">
					<?php echo $form->label($formulario, "telefono", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado"></i>
						<div class="input-append">              
							<?php echo $form->textField($formulario, "telefono", array("rel"=>"popover", "data-original-title"=>$formulario->getAttribute('telefono'), "data-content"=>$formulario->getTooltip('telefono'))) ?>
						</div>
						<?php echo $form->error($formulario, 'telefono') ?>						
					</div>
				</div>
				<div class="control-group <?php if($form->error($formulario, 'celular')) echo ' error' ?>">
					<?php echo $form->label($formulario, "celular", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado"></i>
						<div class="input-append">              
							<?php echo $form->textField($formulario, "celular", array("rel"=>"popover", "data-original-title"=>$formulario->getAttribute('celular'), "data-content"=>$formulario->getTooltip('celular'))) ?>
						</div>
						<?php echo $form->error($formulario, 'celular') ?>						
					</div>
				</div>
				<div class="control-group <?php if($form->error($formulario, 'email')) echo ' error' ?>">
					<?php echo $form->label($formulario, "email", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado"></i>
						<div class="input-append">              
							<?php echo $form->emailField($formulario, "email", array("rel"=>"popover", "data-original-title"=>$formulario->getAttribute('email'), "data-content"=>$formulario->getTooltip('email'))) ?>
						</div>
						<?php echo $form->error($formulario, 'email') ?>						
					</div>
				</div>
				<div class="control-group <?php if($form->error($formulario, 'direccion')) echo ' error' ?>">
					<?php echo $form->label($formulario, "direccion", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado"></i>
						<div class="input-append">   
							<?php echo $form->textField($formulario, "direccion", array("class"=>"input-xlarge","rel"=>"popover", "data-original-title"=>$formulario->getAttribute('direccion'), "data-content"=>$formulario->getTooltip('direccion'))) ?>           
						</div>
						<?php echo $form->error($formulario, 'direccion') ?>						
					</div>
				</div>
			</fieldset>
			<fieldset>	
				<legend>Información de la propuesta</legend>
				<div class="control-group <?php if($form->error($formulario, 'area')) echo ' error' ?>">
					<?php echo $form->label($formulario, "area", array("class"=>"control-label")) ?>
					<div class="controls">
						<?php echo $form->radioButtonList($formulario, "area", array('1'=>'Música','2'=>'Danza',
						                                                             '3'=>'Teatro', '4'=>'Otros')
						                                                             , array('separator'=>'', 'class' => 'area' )); ?>
					</div>
					<?php echo $form->error($formulario, 'area') ?>						
				</div>
				<div id="areaMusica" style="display:none">
					<div class="control-group">
						<label for="" class="control-label">Géneros:</label>
						<div class="controls">							
							<select id="otrosMusica" name="subgenero" class="input-xxlarge">								
								<option value="Tropical">Tropical</option>
								<option value="Popular Tradicional">Popular Tradicional (Corridos, Andina, Pacífico, Atlántico, Llanera)</option>
								<option value="Urbana">Popular Urbana (Rock, Ska, Pop, Reggae, Regaeton, Hip Hop, Cancionistas)</option>
								<option value="Clásica">Clásica</option>
								<option value="Folclor">Folclor</option>
								<option value="Jazz y músicas del mundo">Jazz y músicas del mundo</option>
								<option value="Fusión">Fusión</option>
								<option value="Experimental">Experimental</option>
								<option value="Infantil">Infantil</option>
							</select>
						</div>						
					</div>
					<div class="control-group">
						<label class="control-label" for="audio">Archivos de Audio: MP3</label>
						<div class="controls">
						    <div id="audio">
						        <!-- Mensaje cuando el Javascript se encuentra deshabilitado -->
						        <noscript>Debes tener habilitado Javascript en tu navegador</noscript>
						        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
						        <div class="row fileupload-buttonbar">
						            <div class="span8">
						                <!-- The fileinput-button span is used to style the file input field as button -->
						                <span class="btn btn-success fileinput-button">
						                    <span>Añadir archivos</span>
						                    <i class="icon-plus icon-white"></i>
						                    <input id="archivoAudio" type="file" name="files[]" multiple>
						                </span>              
						                <span class="fileupload-loading"></span>
						            </div>
						            <!-- The global progress information -->
						            <div class="span5 fileupload-progress fade">
						                <!-- The global progress bar -->
						                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
						                    <div class="bar" style="width:0%;"></div>
						                </div>
						                <!-- The extended global progress information -->
						                <div class="progress-extended">&nbsp;</div>
						            </div>
						        </div>
						        <!-- The table listing the files available for upload/download -->
						        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
						    </div>
						</div>
					</div>							
				</div>
				<div id="areaOtros" style="display:none">
					<div class="control-group">
						<label for="" class="control-label">Seleccione:</label>
						<div class="controls">
							<select name="subgenero" id="otrosOtro">								
								<option>Humor</option>
								<option>Magia</option>
								<option>Clown</option>
								<option>Malabarismo</option>
								<option>Mimos</option>
								<option>Cuentería</option>
							</select>
						</div>						
					</div>					
				</div>										
				<div class="control-group <?php if($form->error($formulario, 'trayectoria')) echo ' error' ?>">
					<?php echo $form->label($formulario, "trayectoria", array("class"=>"control-label")) ?>
					<div class="controls">
						<?php echo $form->dropDownList($formulario, "trayectoria", array(
						                                                                ""=>"Seleccione trayectoria",
						                                                                "1"=>"De 1 a 5 Años",
						                                                                "2"=>"De 5 a 10 Años",
						                                                                "3"=>"De 10 Años en adelante")) ?>
					<?php echo $form->error($formulario, 'trayectoria') ?>
					</div>
				</div>
				<div class="control-group <?php if($form->error($formulario, 'numeroIntegrantes')) echo ' error' ?>">
					<?php echo $form->label($formulario, "numeroIntegrantes", array("class"=>"control-label")) ?>
					<div class="controls">
						<?php echo $form->numberField($formulario, "numeroIntegrantes", array("class"=>"input-mini","min"=>"1","rel"=>"popover", "data-original-title"=>$formulario->getAttribute('numeroIntegrantes'), "data-content"=>$formulario->getTooltip('numeroIntegrantes'))) ?>
						<?php echo $form->error($formulario, 'numeroIntegrantes') ?>
					</div>
				</div>
				<div class="control-group <?php if($form->error($formulario, 'resena')) echo ' error' ?>">
					<?php echo $form->label($formulario, "resena", array("class"=>"control-label")) ?>
					<div class="controls">
						<?php echo $form->textArea($formulario, "resena", array("class"=>"input-xlarge","rows"=>"10","rel"=>"popover", "data-original-title"=>$formulario->getAttribute('resena'), "data-content"=>$formulario->getTooltip('resena'))) ?>
						<?php echo $form->error($formulario, 'resena') ?>
						<p class="help">Máximo 950 Caracteres</p>
					</div>
				</div>	
				<div class="control-group">
					<label class="control-label" for="fotoPerfil">Foto del perfil: JPG o PNG</label>
					<div class="controls">
					    <div id="fotoPerfil">
					        <!-- Mensaje cuando el Javascript se encuentra deshabilitado -->
					        <noscript>Debes tener habilitado Javascript en tu navegador</noscript>
					        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					        <div class="row fileupload-buttonbar">
					            <div class="span8">
					                <!-- The fileinput-button span is used to style the file input field as button -->
					                <span class="btn btn-success fileinput-button">
					                    <span>Añadir archivos</span>
					                    <i class="icon-plus icon-white"></i>
					                    <input id="archivoFotoPerfil" type="file" name="files[]" multiple>
					                </span>              
					                <span class="fileupload-loading"></span>
					            </div>
					            <!-- The global progress information -->
					            <div class="span5 fileupload-progress fade">
					                <!-- The global progress bar -->
					                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
					                    <div class="bar" style="width:0%;"></div>
					                </div>
					                <!-- The extended global progress information -->
					                <div class="progress-extended">&nbsp;</div>
					            </div>
					        </div>
					        <!-- The table listing the files available for upload/download -->
					        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
					    </div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="fotosAdicionales">Fotos Adicionales: JPG o PNG</label>
					<div class="controls">
					    <div id="fotos">
					        <!-- Mensaje cuando el Javascript se encuentra deshabilitado -->
					        <noscript>Debes tener habilitado Javascript en tu navegador</noscript>
					        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					        <div class="row fileupload-buttonbar">
					            <div class="span8">
					                <!-- The fileinput-button span is used to style the file input field as button -->
					                <span class="btn btn-success fileinput-button">
					                    <span>Añadir archivos</span>
					                    <i class="icon-plus icon-white"></i>
					                    <input type="file" name="files[]" multiple>
					                </span>              
					                <span class="fileupload-loading"></span>
					            </div>
					            <!-- The global progress information -->
					            <div class="span5 fileupload-progress fade">
					                <!-- The global progress bar -->
					                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
					                    <div class="bar" style="width:0%;"></div>
					                </div>
					                <!-- The extended global progress information -->
					                <div class="progress-extended">&nbsp;</div>
					            </div>
					        </div>
					        <!-- The table listing the files available for upload/download -->
					        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
					    </div>
					</div>
				</div>
				<div class="control-group <?php if($form->error($formulario, 'video')) echo ' error' ?>">
					<?php echo $form->label($formulario, "video", array("class"=>"control-label")) ?>
					<div class="controls">
						<div class="input-prepend">              
							<span class="add-on">http://</span>
							<?php echo $form->textField($formulario, "video", array("class"=>"input-xlarge","rel"=>"popover", "data-original-title"=>$formulario->getAttribute('video'), "data-content"=>$formulario->getTooltip('video'))) ?>    
						</div>
						<?php echo $form->error($formulario, 'video') ?>
					</div>
				</div>
				<div class="control-group <?php if($form->error($formulario, 'twitter')) echo ' error' ?>">
					<?php echo $form->label($formulario, "twitter", array("class"=>"control-label")) ?>
					<div class="controls">
						<div class="input-prepend">              
							<span class="twitter"></span>
							<?php echo $form->textField($formulario, "twitter", array("class"=>"input-xlarge","rel"=>"popover", "data-original-title"=>$formulario->getAttribute('twitter'), "data-content"=>$formulario->getTooltip('twitter'))) ?>
						</div>
						<?php echo $form->error($formulario, 'twitter') ?>
					</div>
				</div>
				<div class="control-group <?php if($form->error($formulario, 'fb')) echo ' error' ?>">
					<?php echo $form->label($formulario, "fb", array("class"=>"control-label")) ?>
					<div class="controls">
						<div class="input-prepend">              
							<span class="facebook"></span>
							<?php echo $form->textField($formulario, "fb", array("class"=>"input-xlarge","rel"=>"popover", "data-original-title"=>$formulario->getAttribute('fb'), "data-content"=>$formulario->getTooltip('fb'))) ?>
						</div>
						<?php echo $form->error($formulario, 'fb') ?>
					</div>
				</div>	
				<div class="control-group <?php if($form->error($formulario, 'web')) echo ' error' ?>">
					<?php echo $form->label($formulario, "web", array("class"=>"control-label")) ?>
					<div class="controls">
						<div class="input-prepend">              
							<span class="add-on">http://</span>
							<?php echo $form->textField($formulario, "web", array('class'=>'input-xlarge',"rel"=>"popover", "data-original-title"=>$formulario->getAttribute('web'), "data-content"=>$formulario->getTooltip('web'))) ?>
						</div>
					</div>
				</div>
				<div class="control-group <?php if($form->error($formulario, 'valor')) echo ' error' ?>">
					<?php echo $form->label($formulario, "valor", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado"></i>
						<div class="input-prepend">              
							<?php echo $form->numberField($formulario, "valor", array('class'=>'input-large',"min"=>"0","rel"=>"popover", "data-original-title"=>$formulario->getAttribute('valor'), "data-content"=>$formulario->getTooltip('valor'))) ?>
						</div>
						<?php echo $form->error($formulario, 'valor') ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="rider">Rider técnico: PDF</label>
					<div class="controls">
					    <div id="rider">
					        <!-- Mensaje cuando el Javascript se encuentra deshabilitado -->
					        <noscript>Debes tener habilitado Javascript en tu navegador</noscript>
					        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					        <div class="row fileupload-buttonbar">
					            <div class="span8">
					                <!-- The fileinput-button span is used to style the file input field as button -->
					                <span class="btn btn-success fileinput-button">
					                    <span>Añadir archivos</span>
					                    <i class="icon-plus icon-white"></i>
					                    <input type="file" name="files[]" multiple>
					                </span>              
					                <span class="fileupload-loading"></span>
					            </div>
					            <!-- The global progress information -->
					            <div class="span5 fileupload-progress fade">
					                <!-- The global progress bar -->
					                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
					                    <div class="bar" style="width:0%;"></div>
					                </div>
					                <!-- The extended global progress information -->
					                <div class="progress-extended">&nbsp;</div>
					            </div>
					        </div>
					        <!-- The table listing the files available for upload/download -->
					        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
					    </div>
					</div>
				</div>				
			</fieldset>					
				<div class="form-actions">
					<?php echo CHtml::submitButton('Enviar mi propuesta', array("class"=>"btn btn-large")) ?>
				</div>																																																																									
		<?php $this->endWidget(); ?>	
	</div>		
</div>

<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            {% if (file.error) { %}
                <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <p class="size">{%=o.formatFileSize(file.size)%}</p>
            {% if (!o.files.error) { %}
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            {% } %}
        </td>
        <td>
            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
                <button class="btn btn-success start">
                    <i class="icon-upload icon-white"></i>
                    <span>Cargar</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnail_url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </p>
            {% if (file.error) { %}
                <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            <button class="btn btn-danger delete" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                <i class="icon-trash icon-white"></i>
                <span>Borrar</span>
            </button>
        </td>
    </tr>
{% } %}
</script>