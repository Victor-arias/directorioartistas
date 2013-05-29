<?php

/**
 * This is the model class for table "audios".
 *
 * The followings are the available columns in table 'audios':
 * @property integer $id
 * @property string $nombre
 * @property string $url
 * @property integer $estado
 * @property integer $perfiles_id
 *
 * The followings are the available model relations:
 * @property Perfiles $perfiles
 */
class Audios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Audios the static model class
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
		return 'audios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, url, estado, perfiles_id', 'required'),
			array('estado, perfiles_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			array('url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, url, estado, perfiles_id', 'safe', 'on'=>'search'),
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
			'nombre' => 'Nombre',
			'url' => 'Url',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('perfiles_id',$this->perfiles_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}