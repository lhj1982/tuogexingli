<?php

/**
 * This is the model class for table "user_recommendation".
 *
 * The followings are the available columns in table 'user_recommendation':
 * @property integer $from_user
 * @property integer $to_user
 * @property string $key
 * @property string $status
 * @property string $created
 *
 * The followings are the available model relations:
 * @property User $toUser
 * @property User $fromUser
 */
class UserRecommendation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserRecommendation the static model class
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
		return 'user_recommendation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('from_user, to_user, key', 'required'),
			array('from_user, to_user', 'numerical', 'integerOnly'=>true),
			array('key', 'length', 'max'=>45),
			array('status', 'length', 'max'=>11),
			array('created', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('from_user, to_user, key, status, created', 'safe', 'on'=>'search'),
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
			'toUser' => array(self::BELONGS_TO, 'User', 'to_user'),
			'fromUser' => array(self::BELONGS_TO, 'User', 'from_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'from_user' => 'From User',
			'to_user' => 'To User',
			'key' => 'Key',
			'status' => 'Status',
			'created' => 'Created',
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

		$criteria->compare('from_user',$this->from_user);
		$criteria->compare('to_user',$this->to_user);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}