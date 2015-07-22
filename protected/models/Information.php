<?php

/**
 * This is the model class for table "information".
 *
 * The followings are the available columns in table 'information':
 * @property integer $id
 * @property string $content
 * @property integer $type
 */
class Information extends CActiveRecord
{
    const NAME = 1;
    const ADDRESS = 2;
    const FACEBOOK = 3;
    const FAN_PAGE = 4;
    const PARIS_PHONE = 5;
    const VIETNAM_PHONE = 6;
    const EMAIL = 7;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Information the static model class
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
		return 'information';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, type', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, content, type', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'content' => 'Content',
			'type' => 'Type',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getArrInformationFooter()
    {
        $informations = Information::model() -> findAll();
        $map_informations = array();

        foreach ($informations as $information):
            $arr_informations = array($information);
            if ($map_informations[$information->type] != null):
                $arr_informations = $map_informations[$information->type];
                array_push($arr_informations,$information);
            endif;
            $map_informations[$information->type] = $arr_informations;
        endforeach;
        return $map_informations;
    }

    public static function getSlogan()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'type = :type';
        $criteria->params = array(':type'=>Information::SLOGAN);
        $information = Information::model() -> find($criteria);

        return $information->content;
    }
}