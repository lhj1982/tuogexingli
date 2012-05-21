<?php

/**
 * This is the model class for table "city".
 *
 * The followings are the available columns in table 'city':
 * @property integer $id
 * @property string $name
 * @property string $name_cn
 * @property integer $parent_id
 * @property integer $country_id
 *
 * The followings are the available model relations:
 * @property Advertisement[] $advertisements
 * @property Advertisement[] $advertisements1
 * @property Country $country
 * @property City $parent
 * @property City[] $cities
 */
class City extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return City the static model class
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
		return 'city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('parent_id, country_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('name_cn', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, name_cn, parent_id, country_id', 'safe', 'on'=>'search'),
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
			'advertisements' => array(self::HAS_MANY, 'Advertisement', 'from_city'),
			'advertisements1' => array(self::HAS_MANY, 'Advertisement', 'to_city'),
			'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
			'parent' => array(self::BELONGS_TO, 'City', 'parent_id'),
			'cities' => array(self::HAS_MANY, 'City', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'name_cn' => 'Name Cn',
			'parent_id' => 'Parent',
			'country_id' => 'Country',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_cn',$this->name_cn,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('country_id',$this->country_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}