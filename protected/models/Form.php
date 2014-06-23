<?php

/**
 * This is the model class for table "form".
 *
 * The followings are the available columns in table 'form':
 * @property integer $id_form
 * @property integer $id_type_form
 * @property string $name_form
 * @property string $url_form
 *
 * The followings are the available model relations:
 * @property TypeForm $idTypeForm
 * @property RolForm[] $rolForms
 */
class Form extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'form';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_type_form, name_form, url_form', 'required'),
			array('id_type_form', 'numerical', 'integerOnly'=>true),
			array('name_form', 'length', 'max'=>80),
			array('url_form', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_form, id_type_form, name_form, url_form', 'safe', 'on'=>'search'),
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
			'idTypeForm' => array(self::BELONGS_TO, 'TypeForm', 'id_type_form'),
			'rolForms' => array(self::HAS_MANY, 'RolForm', 'id_form'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_form' => 'Id Form',
			'id_type_form' => 'Id Type Form',
			'name_form' => 'Name Form',
			'url_form' => 'Url Form',
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

		$criteria->compare('id_form',$this->id_form);
		$criteria->compare('id_type_form',$this->id_type_form);
		$criteria->compare('name_form',$this->name_form,true);
		$criteria->compare('url_form',$this->url_form,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Form the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
