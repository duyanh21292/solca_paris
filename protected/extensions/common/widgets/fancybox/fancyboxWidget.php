<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SilverHand
 * Date: 5/9/13
 * Time: 3:57 PM
 * To change this template use File | Settings | File Templates.
 *
 * @property $assetsUrl
 */

Class FancyboxWidget extends CWidget{

	protected $_debug;

	public function setDebug($debug)
	{
		$this->_debug = $debug;
	}

	public function getDebug()
	{
		if(!isset($this->_debug)){
			$this->_debug = defined('YII_DEBUG') && YII_DEBUG ? true : false;
		}
		return $this->_debug;
	}

	public function init()
	{
		Yii::app()->clientScript->registerCssFile($this->getAssetsUrl().'/css/jquery.fancybox.css');
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/js/jquery.fancybox.pack.js');
	}

	protected $_assetsUrl;

	public function setAssetsUrl($assetsUrl)
	{
		$this->_assetsUrl = $assetsUrl;
	}

	public function getAssetsUrl()
	{
		if (!isset($this->_assetsUrl)){
			$assetsPath = dirname(__FILE__) . '/assets';

			if ($this->debug)
				$assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, true);
			else
				$assetsUrl = Yii::app()->assetManager->publish($assetsPath);

			return $this->_assetsUrl = $assetsUrl;
		}
		return $this->_assetsUrl;
	}
	public  $link;
	public  $label;

	public  $htmlOptionsTitle = array(
		'color'=>'#000',
	);

	public $autoSize = true;
	public $id = 'box';
	public  $htmlOptions = array(
		'width'=>'545px',
		'height'=>'100%',
		'class' => null,
		'afterClose'=>'function(){alert("sdsd")}'
	);
	public function run()
	{
		$this->render('index',array(
			'link'=>$this->link,
			'label'=>$this->label,
			'htmlOptionTitle'=>$this->_parseHtmlOptionTitle($this->htmlOptionsTitle),
			'htmlOption'=>$this->htmlOptions,
			'autoSize' => $this->autoSize,
			'id' => $this->id,
		));
	}

	function _parseHtmlOptionTitle($htmlOptionsTitle)
	{
		$a = array();
		foreach($htmlOptionsTitle as $k=>$v)
		{
			$t = "$k:$v";
			array_push($a, $t);
		}
		return implode(';', $a);
	}
}