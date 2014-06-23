<?php

/**
 * This is the model class for table "ocupation".
 *
 * The followings are the available columns in table 'ocupation':
 * @property integer $id_ocupation
 * @property integer $ocu_id_ocupation
 * @property string $name_ocupation
 *
 * The followings are the available model relations:
 * @property Ocupation $ocuIdOcupation
 * @property Ocupation[] $ocupations
 * @property User[] $users
 */
class Ocupation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ocupation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_ocupation', 'required'),
			array('ocu_id_ocupation', 'numerical', 'integerOnly'=>true),
			array('name_ocupation', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ocupation, ocu_id_ocupation, name_ocupation', 'safe', 'on'=>'search'),
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
			'ocuIdOcupation' => array(self::BELONGS_TO, 'Ocupation', 'ocu_id_ocupation'),
			'ocupations' => array(self::HAS_MANY, 'Ocupation', 'ocu_id_ocupation'),
			'users' => array(self::HAS_MANY, 'User', 'id_ocupation'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ocupation' => 'Id Ocupation',
			'ocu_id_ocupation' => 'Ocu Id Ocupation',
			'name_ocupation' => 'Name Ocupation',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_ocupation',$this->id_ocupation);
		$criteria->compare('ocu_id_ocupation',$this->ocu_id_ocupation);
		$criteria->compare('name_ocupation',$this->name_ocupation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ocupation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
