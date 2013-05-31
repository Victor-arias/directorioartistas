<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery.fileupload/jquery.fileupload-ui.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery.fileupload/jquery.fileupload-ui.css');
?>
<div class="row-fluid">
	<div class="span12">
		<h2>Inscripción de Artistas para Programación de la Feria de las Flores</h2>
		<p>
			Los campos con el ícono <i class="icon-privado">Privado</i> no son visibles al público, sólo serán tenidos en cuenta internamente para el proceso de selección, evaluación y contacto
		</p>			
		<?php $form = $this->beginWidget('CActiveForm',
			array(
				"htmlOptions"=>array("class"=>"form-horizontal")					
				)); ?>
				<?php echo $form->errorSummary(array($formulario), '', '', array('class' => 'alert alert-error')); ?>
				<legend>Registro para identificarse en el portal</legend>
				<div class="control-group">
					<?php echo $form->label($formulario, "username", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado">Privado</i>
						<div class="input-append">    
							<?php echo $form->textField($formulario, "username") ?>
						</div>						
					</div>
				</div>
				<div class="control-group">
					<?php echo $form->label($formulario, "password", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado">Privado</i>
						<div class="input-append">      
							<?php echo $form->passwordField($formulario, "password") ?>
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
						<i class="icon-privado">Privado</i>
						<div class="input-append">   
							<?php echo $form->textField($formulario, "cedula") ?>           
						</div>						
					</div>
				</div>	
				<div class="control-group">
					<?php echo $form->label($formulario, "telefono", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado">Privado</i>
						<div class="input-append">              
							<?php echo $form->textField($formulario, "telefono") ?>
						</div>						
					</div>
<<<<<<< HEAD
				</div>
				<div class="control-group">
					<?php echo $form->label($formulario, "celular", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado">Privado</i>
						<div class="input-append">              
							<?php echo $form->textField($formulario, "celular") ?>
						</div>						
					</div>
				</div>
				<div class="control-group">
					<?php echo $form->label($formulario, "email", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado">Privado</i>
						<div class="input-append">              
							<?php echo $form->emailField($formulario, "email") ?>
						</div>						
					</div>
				</div>
				<div class="control-group">
					<?php echo $form->label($formulario, "direccion", array("class"=>"control-label")) ?>
					<div class="controls">
						<i class="icon-privado">Privado</i>
						<div class="input-append">   
							<?php echo $form->textField($formulario, "direccion", array("class"=>"input-xlarge")) ?>           
						</div>						
=======
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
							                                                             '3'=>'Teatro', '4'=>'Otros'), array('class'=>'area')); ?>
						</div>						
					</div>
					<div id="areaMusica" style="display:none">
						<div class="control-group">
							<label for="" class="control-label">Géneros:</label>
							<div class="controls">
								<select>
									<option>Tropical</option>
									<option>Popular Tradicional (Corridos, Andina, Pacífico, Atlántico, Llanera)</option>
									<option>Popular Urbana (Rock, Ska, Pop, Reggae, Regaeton, Hip Hop, Cancionistas)</option>
									<option>Clásica</option>
									<option>Folclor</option>
									<option>Jazz y músicas del mundo</option>
									<option>Fusión</option>
									<option>Experimental</option>
									<option>Infantil</option>
								</select>
							</div>						
						</div>
						<label class="control-label" for="audio">Archivos de Audio</label>
						<div class="controls">
						    <div id="audio">
						        <!-- Mensaje cuando el Javascript se encuentra deshabilitado -->
						        <noscript>Debes tener habilitado Javascript en tu navegador</noscript>
						        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
						        <div class="row fileupload-buttonbar">
						            <div class="span8">
						                <!-- The fileinput-button span is used to style the file input field as button -->
						                <span class="btn btn-success fileinput-button">
						                    <i class="icon-plus icon-white"></i>
						                    <span>Seleccionar archivos...</span>
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
							<?php echo $form->numberField($formulario, "numeroIntegrantes", array("class"=>"input-mini","min"=>"0")) ?>
						</div>
>>>>>>> ea482a2bb24a6820aa61905524d35fd7f2930a71
					</div>
				</div>	
				<legend>Información de la propuesta</legend>
				<div class="control-group">
					<?php echo $form->label($formulario, "area", array("class"=>"control-label")) ?>
					<div class="controls">
						<?php echo $form->radioButtonList($formulario, "area", array('1'=>'Música','2'=>'Danza',
						                                                             '3'=>'Teatro', '4'=>'Otros')
						                                                             , array('separator'=>'' )); ?>
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
<<<<<<< HEAD
				</div>
				<div class="control-group">
					<?php echo $form->label($formulario, "numeroIntegrantes", array("class"=>"control-label")) ?>
					<div class="controls">
						<?php echo $form->numberField($formulario, "numeroIntegrantes", array("class"=>"input-mini")) ?>
=======
					<div class="control-group">
						<label class="control-label" for="fotoPerfil">Foto del perfil</label>
						<div class="controls">
						    <div id="fotoPerfil">
						        <!-- Mensaje cuando el Javascript se encuentra deshabilitado -->
						        <noscript>Debes tener habilitado Javascript en tu navegador</noscript>
						        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
						        <div class="row fileupload-buttonbar">
						            <div class="span8">
						                <!-- The fileinput-button span is used to style the file input field as button -->
						                <span class="btn btn-success fileinput-button">
						                    <i class="icon-plus icon-white"></i>
						                    <span>Seleccionar archivos...</span>
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
>>>>>>> ea482a2bb24a6820aa61905524d35fd7f2930a71
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
					    <div id="fotoPerfil">
					        <!-- Mensaje cuando el Javascript se encuentra deshabilitado -->
					        <noscript>Debes tener habilitado Javascript en tu navegador</noscript>
					        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					        <div class="row fileupload-buttonbar">
					            <div class="span8">
					                <!-- The fileinput-button span is used to style the file input field as button -->
					                <span class="btn btn-success fileinput-button">
					                    <i class="icon-plus icon-white"></i>
					                    <span>Seleccionar archivos...</span>
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
				<div class="control-group">
					<label class="control-label" for="fotosAdicionales">Fotos Adicionales</label>
					<div class="controls">
					    <div id="fotos">
					        <!-- Mensaje cuando el Javascript se encuentra deshabilitado -->
					        <noscript>Debes tener habilitado Javascript en tu navegador</noscript>
					        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					        <div class="row fileupload-buttonbar">
					            <div class="span8">
					                <!-- The fileinput-button span is used to style the file input field as button -->
					                <span class="btn btn-success fileinput-button">
					                    <i class="icon-plus icon-white"></i>
					                    <span>Seleccionar archivos...</span>
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
                <button class="btn btn-primary start">
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