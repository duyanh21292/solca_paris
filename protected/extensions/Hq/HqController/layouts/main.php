<!doctype html>
<html lang="<?php echo Yii::app()->language ?>">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="<?php echo Yii::app()->language; ?>" name="language">
</head>
<body>
	<style type="text/css">#globalbar .navbar-inner .container {width:auto;}</style>
	<div id='globalbar'>
		<?php if (is_file($this->globalBarViewfile)): ?>
        	<?php include $this->globalBarViewfile; ?>
        <?php else: ?>
<!--            <h3>--><?php //echo  $this->globalBarViewfile; ?><!--</h3>-->
		<?php endif; ?>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
				'homeLink'=>array('label'=>'HQ', 'url'=>array('/hq/')),
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
		</div>

		<div class="row-fluid">
			<div class="page-header">
				<h1 class="pull-left"><?= $this->pageHeader; ?></h1>

				<div class="pull-right">
					<?php $this->widget('bootstrap.widgets.BootMenu', array(
						'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
					    'stacked'=>false, // whether this is a stacked menu
					    'items'=>$this->menu,
					)); ?>
				</div>
			</div>
		</div>

		<div class="row-fluid"><?php echo $content; ?></div>
	</div>

	<hr>
</body>
</html>