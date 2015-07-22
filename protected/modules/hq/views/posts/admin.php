<?php
/* @var $this PostsController */
/* @var $model Posts */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Posts', 'url'=>array('index')),
	array('label'=>'Create Posts', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#posts-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Posts</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'posts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'post_title',
		'post_alias',

		array(
			'name'=>'category_id',
			'filter' => $model->getCategoryList(),
			'type'=>'raw',
			'value'=> 'isset($data->category->title) ? $data->category->title : ""'
		),
		array(
			'name'=>'post_status',
			'filter'=> array(1=>'True',0=>'False'),
			'type'=> 'raw',
			'value'=>'($data->post_status == 1)? "True" : "False"'
		),
		array(
			'name'=>'on_home',
			'filter' => array(1 =>'True',0=>'False'),
			'type'=> 'raw',
			'value'=>'($data->on_home == 1)? "True" : "False"'
		),
		'post_date',
		'post_modified',
		/*
		'post_status',
		'on_home',

		*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
	),
)); ?>
