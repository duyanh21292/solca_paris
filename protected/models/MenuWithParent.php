<?php

/**
 * This is the model class for table "menu_with_parent".
 *
 * The followings are the available columns in table 'menu_with_parent':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $icon_url
 * @property integer $order
 * @property integer $parent_id
 * @property string $parent_name
 */
class MenuWithParent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MenuWithParent the static model class
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
		return 'menu_with_parent';
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
			array('id, order, parent_id', 'numerical', 'integerOnly'=>true),
			array('name, parent_name', 'length', 'max'=>255),
			array('description, icon_url', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, icon_url, order, parent_id, parent_name', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'description' => 'Description',
			'icon_url' => 'Icon Url',
			'order' => 'Order',
			'parent_id' => 'Parent',
			'parent_name' => 'Parent Name',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('icon_url',$this->icon_url,true);
		$criteria->compare('order',$this->order);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('parent_name',$this->parent_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}