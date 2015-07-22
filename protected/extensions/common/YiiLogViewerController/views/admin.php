<?php
$this->breadcrumbs=array(
	'Yii Logs'=>array('admin'),
	'List',
);

Yii::app()->clientScript->registerCss('yiiLogViewer.admin', '.grid-view .items tr.error {background-color: #FFC0CB !important;}');

?>

<h1>Manage Yii Logs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'yii-log-grid',
	'rowCssClassExpression'=>'($row % 2 ? "even":"odd")." ".$data->level',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'level',
		'category',
		array(
			'name'=>'logtime',
			'value'=>'date("Y-m-d H:i:s", $data->logtime)',
		),
		array(
			'name'=>'message',
			'type'=>'raw',
			'value'=>'CHtml::link(htmlspecialchars(substr($data->message, 0, strpos($data->message, "\n")===false ? PHP_INT_MAX:strpos($data->message, "\n"))), array("view", "id"=>$data->id))',
		),
		
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>
