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