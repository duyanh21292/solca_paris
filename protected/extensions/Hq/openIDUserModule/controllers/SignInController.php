<?php

class SignInController extends UserBaseController
{
	function processAfterLogIn()
	{
		assert('!Yii::app()->user->isGuest');

		$this->returnLastUrl();
	}

	function accessRules()
	{
		return array(
        	array('allow', 'actions'=>array('*')),
		);
	}

	/**
	* @inheritdoc
	*/
	protected function beforeAction($action)
	{
		if (!Yii::app()->user->isGuest) {
			$this->processAfterLogIn();
			return false;
		}

		return true;
	}

	function actions()
	{
		Yii::import($this->module->getId() . '.controllers.login.*');

		return array(
			'baokim'		=>	array(
				'class'=>$this->module->getId().'.controllers.login.OpenIDAction',
				'openIDIdentity'=>'https://www.baokim.vn/openid/server/',
//				'openIDIdentity'=>'http://x.x/openid/server/',
				'sourceIdentify'=>'BAO KIM',
			),
			'google'		=>	array(
				'class'=>$this->module->getId().'.controllers.login.OpenIDAction',
				'openIDIdentity'=>'https://www.google.com/accounts/o8/id',
				'sourceIdentify'=>'GOOGLE',
			),
			'yahoo'		=>	array(
				'class'=>$this->module->getId().'.controllers.login.OpenIDAction',
				'openIDIdentity'=>'http://open.login.yahooapis.com/openid20/www.yahoo.com/xrds',
				'sourceIdentify'=>'YAHOO',
			),
//			'facebook'	=>	$this->module->getId() . '.controllers.login.FacebookAction',
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}
}

?>