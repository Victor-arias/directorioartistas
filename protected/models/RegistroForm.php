<?php

/**
 * RegistroForm class.
 * RegistroForm is the data structure for keeping
 * Registro form data. It is used by the 'registro' action of 'ConvocatoriaController'.
 */
class RegistroForm extends CFormModel
{
	public $username;
	public $password;
	public $nombrePropuesta;
	public $representante;
	public $cedula;
	public $telefono;
	public $celular;
	public $email;
	public $direccion;
	public $area;
	public $trayectoria;
	public $numeroIntegrantes;
	public $resena;
	public $video;
	public $twitter;
	public $fb;
	public $web;
	public $valor;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// Required fields
			array('username, password, nombrePropuesta, representante, cedula, telefono, celular, email, direccion, 
				  area, trayectoria, numeroIntegrantes, resena, video, twitter, fb, valor', 'required','message'=>'El campo {attribute} es obligatorio.'),
			// email has to be a valid email address
			array('email', 'email'),			// 
			array('numeroIntegrantes', 'numerical', 'integerOnly' => true),
			array('username', 'unique', 'className'=>'Usuarios', 'message'=>"El {attribute} \"{value}\" Ya se encuentra registrado"),
			array('email', 'unique', 'className'=>'Propuestas', 'message'=>"El {attribute} \"{value}\" Ya se encuentra registrado"),
			array('web', 'safe'),			
			array('web', 'url', 'defaultScheme'=>'http', 'message'=>'El {attribute} no es una URL válida'),
			array('username','match', 'allowEmpty'=>false,'pattern'=>'/^[a-zA-Z0-9_\\_\ü]+$/', 'message'=>"El  {attribute} no es válido. No puede contener Espacios ni caracteres especiales.")
		); 
	}

	public function getAttribute($label="username"){
		$array = $this->attributeLabels();
		if(array_key_exists($label, $array)){
			return $array[$label];
		}
		else{
			return "No existe el atributo";
		}
	}

	public function getTooltip($label="username"){
		$array = $this->attributeTooltips();
		if(array_key_exists($label, $array)){
			return $array[$label];
		}
		else{
			return "No existe el atributo";
		}
	}	

	public function attributeTooltips(){
		return array(
			'username'=>'Este es el nombre de usuario que usará en adelante para identificarse en el portal',
			'password'=>'Utilice una contraseña entre 8 y 20 caracteres, que no tenga espacios, que sea diferente a la de su correo electrónico y que le dará el ingreso a este portal',
			'nombrePropuesta'=>'Utilice este campo para indicar su nombre artístico o el nombre de su entidad cultural',
			'representante'=>'Indique el nombre de la persona que será la encargada de manejar la comunicación entre la organización de la Feria de las Flores y el artista o grupo',
			'cedula'=>'Documento de identidad del representante',
			'telefono'=>'Número telefónico fijo del representante',
			'celular'=>'Numéro celular del representante',
			'email'=>'Correo electrónico del representante que revise constantemente.',
			'direccion'=>'Dirección de correspondencia física del representante',
			'area'=>'Tipo de propuesta artística',
			'trayectoria'=>'Defina el tiempo total de experiencia que la agrupación o proyecto artístico lleva trabajando junta.',
			'numeroIntegrantes'=>'Indique cuántas personas hacen parte del show, incluyendo ingenieros, roadies, personal detrás del escenario, equipo técnico, manager, etc',
			'resena'=>'Descripción de la agrupación y su propuesta artística, trayectoria, duración de la presentación, público al que va dirigida y demás detalles útiles para contextualizar al jurado',
			'video'=>'Agregue un enlace a YouTube o Vimeo, con un video de su proyecto para que el jurado pueda conocer mejor su propuesta.',
			'twitter'=>"Incluya la dirección o url de su perfil en Twitter",
			'rider' => 'El documento en formato PDF para anexar en este campo debe incluir información detallada sobre los requerimientos técnicos necesarios para su presentación: dimensiones de escenario, iluminación, micrófonos, consolas, marcas de equipos back line, utilería, etc. Todos los escenarios son al aire libre.',
			'fb'=>'Incluya la dirección o url de su perfil en Facebook',
			'web'=>'Si su proyecto artístico tiene sitio web ingréselo en este campo',
			'valor'=>'Indique el precio que su show tiene para un evento como la Feria de las Flores. La cifra debe ir en números, sin espacios o puntos. Ejemplo: 1000000'
		);		
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'Nombre de Usuario',
			'password'=>'Contraseña',
			'nombrePropuesta'=>'Nombre propuesta',
			'representante'=>'Representante',
			'cedula'=>'Cédula',
			'telefono'=>'Teléfono Fijo',
			'celular'=>'Teléfono Celular',
			'email'=>'Correo',
			'direccion'=>'Dirección',
			'area'=>'Área',
			'trayectoria'=>'Trayectoria',
			'numeroIntegrantes'=>'Integrantes',
			'resena'=>'Reseña',
			'video'=>'Video',
			'twitter'=>"Twitter",
			'rider' => 'Rider técnico: PDF',
			'fb'=>'FaceBook',
			'web'=>'Sitio Web',
			'valor'=>'Valor Presentación'
		);
	}
}