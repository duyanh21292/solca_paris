<?php

Yii::import('ext.Hq.HqController.HqController');

class YiiLogViewerController extends HqController
{

	public $modelClassName='YiiLog';

	public $defaultAction='admin';

	function init()
	{
		parent::init();

		require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'YiiLog.php';
	}

	/**
	* @inheritdoc
	*/
	public function getViewPath()
	{
		return dirname(__FILE__).DIRECTORY_SEPARATOR.'views';
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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new $this->modelClassName('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[$this->modelClassName]))
			$model->attributes=$_GET[$this->modelClassName];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model= new $this->modelClassName;
		$model=$model->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='yii-log-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
