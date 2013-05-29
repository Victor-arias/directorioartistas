<?php

/**
 * This is the model class for table "redes_has_perfiles".
 *
 * The followings are the available columns in table 'redes_has_perfiles':
 * @property integer $id
 * @property integer $redes_id
 * @property integer $perfiles_id
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Redes $redes
 * @property Perfiles $perfiles
 */
class RedesHasPerfiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RedesHasPerfiles the static model class
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
		return 'redes_has_perfiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('redes_id, perfiles_id, url', 'required'),
			array('redes_id, perfiles_id', 'numerical', 'integerOnly'=>true),
			array('url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, redes_id, perfiles_id, url', 'safe', 'on'=>'search'),
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
			'redes' => array(self::BELONGS_TO, 'Redes', 'redes_id'),
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
			'redes_id' => 'Redes',
			'perfiles_id' => 'Perfiles',
			'url' => 'Url',
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
		$criteria->compare('redes_id',$this->redes_id);
		$criteria->compare('perfiles_id',$this->perfiles_id);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}