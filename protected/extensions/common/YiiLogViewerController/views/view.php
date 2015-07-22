<?php
$this->breadcrumbs=array(
	'Yii Logs'=>array('admin'),
	$model->id,
);

?>

<h1>View YiiLog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'level',
		'category',
		array(
			'name'=>'logtime',
			'value'=>date("Y-m-d H:i:s", $model->logtime),
		),
		array(
			'name'=>'message',
			'type'=>'raw',
			'value'=>$this->renderPartial('_text_pad', array('text'=>$model->message), true),
		),
	),
)); ?>
