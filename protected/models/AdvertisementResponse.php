<?php

/**
 * This is the model class for table "advertisement_response".
 *
 * The followings are the available columns in table 'advertisement_response':
 * @property integer $id
 * @property integer $advertisement_id
 * @property integer $user_id
 * @property integer $mail_id
 *
 * The followings are the available model relations:
 * @property Advertisement $advertisement
 * @property MailQueue $mail
 * @property User $user
 */
class AdvertisementResponse extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdvertisementResponse the static model class
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
		return 'advertisement_response';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('advertisement_id, user_id, mail_id', 'required'),
			array('advertisement_id, user_id, mail_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, advertisement_id, user_id, mail_id', 'safe', 'on'=>'search'),
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
			'advertisement' => array(self::BELONGS_TO, 'Advertisement', 'advertisement_id'),
			'mail' => array(self::BELONGS_TO, 'MailQueue', 'mail_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'advertisement_id' => 'Advertisement',
			'user_id' => 'User',
			'mail_id' => 'Mail',
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
		$criteria->compare('advertisement_id',$this->advertisement_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('mail_id',$this->mail_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}