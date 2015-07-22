<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $icon_url
 * @property integer $order
 * @property integer $parent_id
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
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
		return 'menu';
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
			array('order, parent_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('description, icon_url', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, icon_url, order, parent_id', 'safe', 'on'=>'search'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getMenuById($id)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'id = :id';
        $criteria->params = array(':id'=>$id);
        $menu = MenuWithParent::model() -> find($criteria);
        return $menu;
    }

    public static function getAllMenu()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'parent_id is NULL order by `order` asc';
        $categories = Menu::model() -> findAll($criteria);
        return $categories;
    }

    public static function getArrSubMenu()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'parent_id is NOT NULL order by `order` asc';
        $sub_categories = MenuWithParent::model() -> findAll($criteria);

        $map_sub_categories = array();

        foreach ($sub_categories as $sub_category):
            $arr_sub_categories = array($sub_category);
            if ($map_sub_categories[$sub_category->parent_id] != null):
                $arr_sub_categories = $map_sub_categories[$sub_category->parent_id];
                array_push($arr_sub_categories,$sub_category);
            endif;
            $map_sub_categories[$sub_category->parent_id] = $arr_sub_categories;
        endforeach;
        return $map_sub_categories;
    }

    public static function disableYiiCssJs(){
        $cs = Yii::app()->clientScript;
        $cs->scriptMap['bootstrap.js'] = false;
        $cs->scriptMap['bootstrap.css'] = false;
        $cs->scriptMap['bootstrap-yii.css'] = false;
    }

    public static function getArrSubMenuById($parent_id,$arr)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'parent_id = :parent_id';
        $criteria->params = array(':parent_id'=>$parent_id);
        $sub_categories = MenuWithParent::model() -> findAll($criteria);
        foreach($sub_categories as $sub_category):
            array_push($arr,$sub_category->id);
            $arr = Menu::getArrSubMenuById($sub_category->id,$arr);
        endforeach;
        return $arr;
    }

    public static function getArrMenuNavigate($parent_id)
    {
        $parent_menu = Menu::getMenuById($parent_id);
        $arr = array($parent_menu);
        if ($parent_menu->parent_id != null) {
            $arr_par = Menu::getArrMenuNavigate($parent_menu->parent_id);
            return array_merge($arr,$arr_par);
        } else {
            return $arr;
        }
    }
}