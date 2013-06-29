<?php

/**
 * This is the model class for table "propuestas".
 *
 * The followings are the available columns in table 'propuestas':
 * @property integer $id
 * @property string $nombre
 * @property string $representante
 * @property string $cedula
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property string $direccion
 * @property integer $trayectoria
 * @property integer $numero_integrantes
 * @property string $resena
 * @property string $video
 * @property integer $estado
 * @property double $valor_presentacion
 * @property string $rider
 * @property string $created_at
 * @property string $updated_at
 * @property integer $convocatorias_id
 * @property integer $perfiles_id
 * @property string $subgenero
 * @property integer $jurado_id
 *
 * The followings are the available model relations:
 * @property Criterio[] $criterios
 * @property Jurado $jurado
 * @property Convocatorias $convocatorias
 * @property Perfiles $perfiles
 */
class Propuestas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Propuestas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'propuestas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, representante, cedula, telefono, celular, email, direccion, trayectoria, numero_integrantes, resena, video, valor_presentacion, rider, created_at, convocatorias_id, perfiles_id', 'required'),
			array('trayectoria, numero_integrantes, estado, convocatorias_id, perfiles_id, jurado_id', 'numerical', 'integerOnly'=>true),
			array('valor_presentacion', 'numerical'),
			array('nombre, cedula', 'length', 'max'=>100),
			array('representante', 'length', 'max'=>150),
			array('telefono, celular', 'length', 'max'=>45),
			array('email', 'length', 'max'=>50),
			array('direccion, video, rider', 'length', 'max'=>255),
			array('subgenero', 'length', 'max'=>30),
			array('updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, representante, cedula, telefono, celular, email, direccion, trayectoria, numero_integrantes, resena, video, estado, valor_presentacion, rider, created_at, updated_at, convocatorias_id, perfiles_id, subgenero, jurado_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'criterios' => array(self::MANY_MANY, 'Criterio', 'criterio_has_propuestas(propuestas_id, criterio_id)'),
			'jurado' => array(self::BELONGS_TO, 'Jurado', 'jurado_id'),
			'convocatorias' => array(self::BELONGS_TO, 'Convocatorias', 'convocatorias_id'),
			'perfiles' => array(self::BELONGS_TO, 'Perfiles', 'perfiles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'representante' => 'Representante',
			'cedula' => 'Cedula',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'email' => 'Email',
			'direccion' => 'Direccion',
			'trayectoria' => 'Trayectoria',
			'numero_integrantes' => 'Numero Integrantes',
			'resena' => 'Resena',
			'video' => 'Video',
			'estado' => 'Estado',
			'valor_presentacion' => 'Valor Presentacion',
			'rider' => 'Rider',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'convocatorias_id' => 'Convocatorias',
			'perfiles_id' => 'Perfiles',
			'subgenero' => 'Subgenero',
			'jurado_id' => 'Jurado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('representante',$this->representante,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('trayectoria',$this->trayectoria);
		$criteria->compare('numero_integrantes',$this->numero_integrantes);
		$criteria->compare('resena',$this->resena,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('valor_presentacion',$this->valor_presentacion);
		$criteria->compare('rider',$this->rider,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('convocatorias_id',$this->convocatorias_id);
		$criteria->compare('perfiles_id',$this->perfiles_id);
		$criteria->compare('subgenero',$this->subgenero,true);
		$criteria->compare('jurado_id',$this->jurado_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave(){
			if($this->isNewRecord){
				$this->created_at = date("Y-m-d H:i:s");
			}
			else{
				$this->updated_at = date("Y-m-d H:i:s");	
			}

			return parent::beforeSave();
	}	
}