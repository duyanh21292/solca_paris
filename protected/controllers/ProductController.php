<?php

class ProductController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','allProduct','productDetail'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Product;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Product');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Product the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionAllProduct(){
        Menu::disableYiiCssJs();
        $menu_id = Yii::app()->request->getParam("menu_id");
        $brand_id = Yii::app()->request->getParam("brand");
        $price_range = Yii::app()->request->getParam("price_range");
        $capacity_range = Yii::app()->request->getParam("capacity_range");
        $weight_range = Yii::app()->request->getParam("weight_range");
        $rating = Yii::app()->request->getParam("rating");
        $color_id = Yii::app()->request->getParam("color");
        $skin_id = Yii::app()->request->getParam("skin");
        $smelling_id = Yii::app()->request->getParam("smelling");
        $material_id = Yii::app()->request->getParam("material");
        $pack_id = Yii::app()->request->getParam("pack");
        $suite_id = Yii::app()->request->getParam("suite");
        $sort_by_id = Yii::app()->request->getParam("sort_by_id");
        $page = Yii::app()->request->getParam("page");

        $arr_menu_id = array($menu_id);
        $arr_menu_id = Menu::getArrSubMenuById($menu_id,$arr_menu_id);
        $where_menu_id = 'menu_id in ('.implode(',',$arr_menu_id).')';

        $where_brand_id = '';
        if($brand_id != null){
            $where_brand_id = ' AND brand_id in ('.implode(',',$brand_id).')';
        }

        $where_rating = '';
        if($rating != null){
            $where_rating = ' AND rating in ('.implode(',',$rating).')';
        }

        $where_color_id = '';
        if($color_id != null){
            $where_color_id = ' AND color_id in ('.implode(',',$color_id).')';
        }

        $where_skin_id = '';
        if($skin_id != null){
            $where_skin_id = ' AND skin_id in ('.implode(',',$skin_id).')';
        }

        $where_smelling_id = '';
        if($smelling_id != null){
            $where_smelling_id = ' AND smelling_id in ('.implode(',',$smelling_id).')';
        }

        $where_material_id = '';
        if($material_id != null){
            $where_material_id = ' AND material_id in ('.implode(',',$material_id).')';
        }

        $where_pack_id = '';
        if($pack_id != null){
            $where_pack_id = ' AND pack_id in ('.implode(',',$pack_id).')';
        }

        $where_suite_id = '';
        if($suite_id != null){
            $where_suite_id = ' AND suite_id in ('.implode(',',$suite_id).')';
        }

        $where_price = '';
        if($price_range != null) {
            $arr_price_range = explode(' - ',$price_range);
            $price_min = str_replace('$','',$arr_price_range[0]);
            $price_max = str_replace('$','',$arr_price_range[1]);
            $where_price = ' AND (price >= '.$price_min.' AND price <= '.$price_max.')';
        }

        $where_capacity = '';
        if($capacity_range != null) {
            $arr_capacity_range = explode(' - ',$capacity_range);
            $capacity_min = str_replace('ml','',$arr_capacity_range[0]);
            $capacity_max = str_replace('ml','',$arr_capacity_range[1]);
            $where_capacity = ' AND (capacity >= '.$capacity_min.' AND capacity <= '.$capacity_max.')';
        }

        $where_weight = '';
        if($weight_range != null) {
            $arr_weight_range = explode(' - ',$weight_range);
            $weight_min = str_replace('g','',$arr_weight_range[0]);
            $weight_max = str_replace('g','',$arr_weight_range[1]);
            $where_weight = ' AND (weight >= '.$weight_min.' AND weight <= '.$weight_max.')';
        }

        $order_by = ' order by price asc';
        if($sort_by_id != null) {
            switch ($sort_by_id){
                case '1':
                    $order_by = ' order by price asc';
                    break;
                case '2':
                    $order_by = ' order by price desc';
                    break;
                case '3':
                    $order_by = ' order by brand_name asc';
                    break;
                case '4':
                    $order_by = ' order by brand_name desc';
                    break;
                case '5':
                    $order_by = ' order by rating desc';
                    break;
                case '5':
                    $order_by = ' order by rating asc';
                    break;
                default:
                    $order_by = ' order by price asc';
            }
        }

        if($page == null) {
            $page = 1;
        }

        $condition = $where_menu_id.$where_brand_id.$where_rating.
            $where_color_id.$where_skin_id.$where_smelling_id.
            $where_material_id.$where_pack_id.$where_suite_id.
            $where_price.$where_capacity.$where_weight.$order_by;

        $total_product = $this::productCount($condition);
        $page_number = 1;
        if($total_product%6 == 0){
            $page_number = $total_product/6;
        } else {
            $page_number = ceil($total_product/6);
        }
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->limit = 6;
        $criteria->offset = ($page-1)*6;
        $products = ProductDetail::model() -> findAll($criteria);

        $arr_navigate = Menu::getArrMenuNavigate($menu_id);
        $this->layout = '//layouts/ajaxLayout';
        $this->render('view',array(
            'products' => $products,
            'arr_navigate' => $arr_navigate,
            'page_num' => $page_number,
            'page' => $page,
            'total_product' => $total_product
        ));
    }

    public static function productCount($condition){
        return ProductDetail::model() -> count($condition);
    }

    public function actionProductDetail(){
        Menu::disableYiiCssJs();
        $product_id = Yii::app()->request->getParam("product_id");
        $criteria = new CDbCriteria();
        $criteria->condition = 'id = :id';
        $criteria->params = array(':id'=>$product_id);
        $product = ProductDetail::model() -> find($criteria);
        $arr_navigate = Menu::getArrMenuNavigate($product->menu_id);

        $criteria->condition = 'menu_id = :menu_id and id != :id ORDER BY rating DESC';
        $criteria->params = array(':menu_id'=>$product->menu_id, ':id'=>$product_id);
        $criteria->limit = 8;
        $criteria->offset = 0;
        $products_suggest = ProductDetail::model() -> findAll($criteria);

        $this->layout = '//layouts/ajaxLayout';
        $this->render('detail',array(
            'product' => $product,
            'arr_navigate' => $arr_navigate,
            'products_suggest' => $products_suggest
        ));

    }

    public function actionRating(){
        $product_id = Yii::app()->request->getParam("product_id");
        $rating = Yii::app()->request->getParam("rating");
        if($rating == null || $product_id == null)
            echo null;
        $criteria = new CDbCriteria();
        $criteria->condition = 'id = :id';
        $criteria->params = array(':id'=>$product_id);
        $product = Product::model() -> find($criteria);
        $rating_num = $product->rating_num;
        $old_rating = $product->rating;
        $new_rating = round((($old_rating * $rating_num) + $rating)/($rating_num+1));
        $product->rating_num = $rating_num + 1;
        $product->rating = $new_rating;
        if($product->save()){
            echo $new_rating;
        } else {
            echo null;
        }
    }
}
