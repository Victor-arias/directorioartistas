<?php

/**
 * This is the model class for table "criterio_has_propuestas".
 *
 * The followings are the available columns in table 'criterio_has_propuestas':
 * @property integer $criterio_id
 * @property integer $propuestas_id
 * @property string $puntaje
 */
class CriterioHasPropuestas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CriterioHasPropuestas the static model class
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
		return 'criterio_has_propuestas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('criterio_id, propuestas_id, puntaje', 'required'),
			array('criterio_id, propuestas_id', 'numerical', 'integerOnly'=>true),
			array('puntaje', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('criterio_id, propuestas_id, puntaje', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'criterio_id' => 'Criterio',
			'propuestas_id' => 'Propuestas',
			'puntaje' => 'Puntaje',
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

		$criteria->compare('criterio_id',$this->criterio_id);
		$criteria->compare('propuestas_id',$this->propuestas_id);
		$criteria->compare('puntaje',$this->puntaje,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}