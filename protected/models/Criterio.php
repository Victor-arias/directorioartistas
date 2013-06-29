<?php

/**
 * This is the model class for table "criterio".
 *
 * The followings are the available columns in table 'criterio':
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property integer $minimo
 * @property integer $maximo
 * @property integer $convocatorias_id
 * @property integer $areas_id
 * @property integer $tipo_criterio_id
 *
 * The followings are the available model relations:
 * @property Convocatorias $convocatorias
 * @property Areas $areas
 * @property TipoCriterio $tipoCriterio
 * @property Propuestas[] $propuestases
 */
class Criterio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Criterio the static model class
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
		return 'criterio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, minimo, maximo, convocatorias_id, areas_id, tipo_criterio_id', 'required'),
			array('minimo, maximo, convocatorias_id, areas_id, tipo_criterio_id', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>50),
			array('descripcion', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titulo, descripcion, minimo, maximo, convocatorias_id, areas_id, tipo_criterio_id', 'safe', 'on'=>'search'),
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
			'convocatorias' => array(self::BELONGS_TO, 'Convocatorias', 'convocatorias_id'),
			'areas' => array(self::BELONGS_TO, 'Areas', 'areas_id'),
			'tipoCriterio' => array(self::BELONGS_TO, 'TipoCriterio', 'tipo_criterio_id'),
			'propuestases' => array(self::MANY_MANY, 'Propuestas', 'criterio_has_propuestas(criterio_id, propuestas_id)'),
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
			'descripcion' => 'Descripcion',
			'minimo' => 'Minimo',
			'maximo' => 'Maximo',
			'convocatorias_id' => 'Convocatorias',
			'areas_id' => 'Areas',
			'tipo_criterio_id' => 'Tipo Criterio',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('minimo',$this->minimo);
		$criteria->compare('maximo',$this->maximo);
		$criteria->compare('convocatorias_id',$this->convocatorias_id);
		$criteria->compare('areas_id',$this->areas_id);
		$criteria->compare('tipo_criterio_id',$this->tipo_criterio_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}