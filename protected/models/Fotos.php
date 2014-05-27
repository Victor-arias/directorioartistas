<?php

/**
 * This is the model class for table "fotos".
 *
 * The followings are the available columns in table 'fotos':
 * @property integer $id
 * @property string $titulo
 * @property string $src
 * @property string $thumb
 * @property integer $ancho
 * @property integer $alto
 * @property integer $es_perfil
 * @property integer $estado
 * @property integer $perfiles_id
 *
 * The followings are the available model relations:
 * @property Perfiles $perfiles
 */
class Fotos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fotos the static model class
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
		return 'fotos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, src, thumb, ancho, alto, es_perfil, perfiles_id', 'required'),
			array('ancho, alto, es_perfil, estado, perfiles_id', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>100),
			array('src, thumb', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titulo, src, thumb, ancho, alto, es_perfil, estado, perfiles_id', 'safe', 'on'=>'search'),
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
			'titulo' => 'Titulo',
			'src' => 'Src',
			'thumb' => 'Thumb',
			'ancho' => 'Ancho',
			'alto' => 'Alto',
			'es_perfil' => 'Es Perfil',
			'estado' => 'Estado',
			'perfiles_id' => 'Perfiles',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('src',$this->src,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('ancho',$this->ancho);
		$criteria->compare('alto',$this->alto);
		$criteria->compare('es_perfil',$this->es_perfil);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('perfiles_id',$this->perfiles_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}