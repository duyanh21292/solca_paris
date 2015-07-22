<?php

/**
 * This is the model class for table "product_detail".
 *
 * The followings are the available columns in table 'product_detail':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property double $price
 * @property string $description
 * @property integer $rating
 * @property string $create_date
 * @property integer $capacity
 * @property integer $weight
 * @property integer $menu_id
 * @property integer $brand_id
 * @property integer $pack_id
 * @property integer $color_id
 * @property integer $skin_id
 * @property integer $smelling_id
 * @property integer $material_id
 * @property integer $suite_id
 * @property integer $special
 * @property integer $img_id
 * @property string $img_url
 * @property string $brand_name
 */
class ProductDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductDetail the static model class
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
		return 'product_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, create_date', 'required'),
			array('id, rating, capacity, weight, menu_id, brand_id, pack_id, color_id, skin_id, smelling_id, material_id, suite_id, special, img_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('code', 'length', 'max'=>45),
			array('name, brand_name', 'length', 'max'=>255),
			array('description, img_url', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, name, price, description, rating, create_date, capacity, weight, menu_id, brand_id, pack_id, color_id, skin_id, smelling_id, material_id, suite_id, special, img_id, img_url, brand_name', 'safe', 'on'=>'search'),
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
			'code' => 'Code',
			'name' => 'Name',
			'price' => 'Price',
			'description' => 'Description',
			'rating' => 'Rating',
			'create_date' => 'Create Date',
			'capacity' => 'Capacity',
			'weight' => 'Weight',
			'menu_id' => 'Menu',
			'brand_id' => 'Brand',
			'pack_id' => 'Pack',
			'color_id' => 'Color',
			'skin_id' => 'Skin',
			'smelling_id' => 'Smelling',
			'material_id' => 'Material',
			'suite_id' => 'Suite',
			'special' => 'Special',
			'img_id' => 'Img',
			'img_url' => 'Img Url',
			'brand_name' => 'Brand Name',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('capacity',$this->capacity);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('pack_id',$this->pack_id);
		$criteria->compare('color_id',$this->color_id);
		$criteria->compare('skin_id',$this->skin_id);
		$criteria->compare('smelling_id',$this->smelling_id);
		$criteria->compare('material_id',$this->material_id);
		$criteria->compare('suite_id',$this->suite_id);
		$criteria->compare('special',$this->special);
		$criteria->compare('img_id',$this->img_id);
		$criteria->compare('img_url',$this->img_url,true);
		$criteria->compare('brand_name',$this->brand_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}