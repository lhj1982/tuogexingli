<?php

/**
 * This is the model class for table "advertisement".
 *
 * The followings are the available columns in table 'advertisement':
 * @property integer $id
 * @property integer $user_id
 * @property string $type
 * @property integer $from_city
 * @property integer $to_city
 * @property string $departure_time
 * @property string $arrival_time
 * @property string $title
 * @property string $description
 * @property integer $weight
 * @property string $password
 * @property string $status
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property City $fromCity
 * @property City $toCity
 * @property User $user
 * @property Message[] $messages
 * @property AdvertisementResponse[] $advertisementResponses
 */
class Advertisement extends CActiveRecord
{
	const DRAFT = 'draft';
	const ACTIVE = 'active';
	const DELETED = 'deleted';
	const CLOSED = 'closed';
	const EXPIRED = 'expired';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Advertisement the static model class
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
		return 'advertisement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, from_city, to_city, departure_time, title, password, created, modified', 'required'),
			array('user_id, from_city, to_city, weight', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>5),
			array('title, password', 'length', 'max'=>100),
			array('status', 'length', 'max'=>7),
			array('arrival_time, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, type, from_city, to_city, departure_time, arrival_time, title, description, weight, password, status, created, modified', 'safe', 'on'=>'search'),
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
			'fromCity' => array(self::BELONGS_TO, 'City', 'from_city'),
			'toCity' => array(self::BELONGS_TO, 'City', 'to_city'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'messages' => array(self::MANY_MANY, 'Message', 'advertisement_message(advertisement_id, message_id)'),
			'advertisementResponses' => array(self::HAS_MANY, 'AdvertisementResponse', 'advertisement_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'type' => 'Type',
			'from_city' => 'From City',
			'to_city' => 'To City',
			'departure_time' => 'Departure Time',
			'arrival_time' => 'Arrival Time',
			'title' => 'Title',
			'description' => 'Description',
			'weight' => 'Weight',
			'password' => 'Password',
			'status' => 'Status',
			'created' => 'Created',
			'modified' => 'Modified',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('from_city',$this->from_city);
		$criteria->compare('to_city',$this->to_city);
		$criteria->compare('departure_time',$this->departure_time,true);
		$criteria->compare('arrival_time',$this->arrival_time,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Find all valid advertisment to show.
	 * 
	 * @see CActiveRecord::findAll()
	 */
	public function findAllValidToShow() {
		return Yii::app()->db->createCommand()
		->select(array("advertisement.*","user.name as username"))
		->from("advertisement")
		->join("user", "user.id=advertisement.user_id")
		->where("advertisement.status=:status", array(':status'=>self::ACTIVE))
		->order("advertisement.created DESC")
		->queryAll();
	}
	
	/**
	 * Find advertisement by id, bring together information of fromCity and toCity.
	 * 
	 * @param $advertisementId
	 * @return advertisement obj
	 */
	public function findById($advertisementId) {
		return Advertisement::model()->with('fromCity', 'toCity')->findByPk($advertisementId);
	}
}