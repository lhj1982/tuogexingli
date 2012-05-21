<?php

/**
 * This is the model class for table "user_comment".
 *
 * The followings are the available columns in table 'user_comment':
 * @property integer $id
 * @property integer $message_id
 * @property integer $target_user
 *
 * The followings are the available model relations:
 * @property Message $message
 * @property User $targetUser
 */
class UserComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserComment the static model class
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
		return 'user_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message_id, target_user', 'required'),
			array('message_id, target_user', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, message_id, target_user', 'safe', 'on'=>'search'),
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
			'message' => array(self::BELONGS_TO, 'Message', 'message_id'),
			'targetUser' => array(self::BELONGS_TO, 'User', 'target_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'message_id' => 'Message',
			'target_user' => 'Target User',
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
		$criteria->compare('message_id',$this->message_id);
		$criteria->compare('target_user',$this->target_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}