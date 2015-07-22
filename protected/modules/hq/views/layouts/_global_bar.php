<?php
	$moduleId = $this->module->getId();
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile($this->getModule()->assetsUrl.'/hq.css');

	$this->widget('bootstrap.widgets.BootNavbar', array(
		'fixed'=>false,
		'brand'=>'HQ',
		'brandUrl'=>'/hq/',
		#'collapse'=>true, // requires bootstrap-responsive.css
		'items'=>array(
			array(
				'class'=>'bootstrap.widgets.BootMenu',
				'items'=>array(
					//				array('label'=>Yii::t('label', 'Giao dịch thẻ'), 'url'=>array('/hq/cardTransaction')),
				),
			),
			array(
				'class'=>'bootstrap.widgets.BootMenu',
				'htmlOptions'=>array('class'=>'pull-right'),
				'items'=>array(
					array('label'=>Yii::t('label', 'Tài khoản quản trị'), 'url'=>array('/hq/user/role')),


					array('label'=>Yii::t('label', 'Log'), 'url'=>array('#'), 'items'=>array(
						array('label'=>'Yii Log', 'url'=>array('/hq/yiiLog')),
					)),
					'----',
					array('label'=>'Đăng xuất ('.Yii::app()->hqUser->name.')', 'url'=>array('/hq/user/signOut', 'ru'=>Yii::app()->request->requestUri), 'visible'=>!Yii::app()->hqUser->isGuest),
					array('label'=>'Đăng nhập', 'url'=>array('/hq/user/signIn', 'ru'=>Yii::app()->request->requestUri), 'visible'=>Yii::app()->hqUser->isGuest),
				),
			),
		),
	)); ?>
<script>
	//$('#globalbar .navbar-inner').css({'background-color':'transparent',
//    	'background-image':'-webkit-linear-gradient(top, #ffffff, #f2f2f2)',
//	});
</script>