<?php

/**
* @property string $assetsUrl
*/
class HqModule extends CWebModule
{
	protected $_assetsUrl;
	public $debug=false;

	/**
	* Returns the URL to the published assets folder.
	* @return string the URL
	*/
	public function getAssetsUrl()
	{
			if ($this->_assetsUrl === null)
			$this->_assetsUrl =
				Yii::app()->getAssetManager()->publish(
				Yii::getPathOfAlias($this->getId() . '.assets.css'),
					false,
					-1,
					true
				);
		return $this->_assetsUrl;
	}

	function init()
	{
		parent::init();

		$this->import = array(
		'ext.Hq.HqController.HqController',
		);

		$this->getComponent('bootstrap');

		Yii::app()->clientScript->registerCssFile($this->getAssetsUrl().'/hq.css');
		Yii::app()->errorHandler->errorAction = '/hq/default/error';
	}
}
