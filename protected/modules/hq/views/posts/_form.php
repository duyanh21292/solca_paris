

<div class="form">

	<?php
	/**
	 * @var $form BootActiveForm
	 * @var $model Library
	 */
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
		'id' => 'library-form',
		'enableAjaxValidation' => false,
		'htmlOptions' => array('enctype' => 'multipart/form-data','class' => 'well'),
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model, 'f_name'); ?>
		<?php echo $form->textField($model, 'f_name', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'f_name'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model, 'f_alias'); ?>
		<?php echo $form->textField($model, 'f_alias', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'f_alias'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'category_id');?>
		<?php echo $form->dropDownList($model,'category_id',$model->getArticleCategory()); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model, 'link_demo'); ?>
		<?php echo $form->textField($model, 'link_demo', array('size' => 60, 'maxlength' => 250)); ?>
		<?php echo $form->error($model, 'link_demo'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array('1'=>'True','0'=>'False')); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model, 'url_download');?>
		<?php echo $form->fileField($model, 'url_download', array('size' => 60, 'maxlength' => 200)); ?>
		<?php echo $form->error($model, 'url_download'); ?>
	</div>

	<div>
		<?php echo $form->hiddenField($model, 'created', array('value'=>(empty($model->created)) ? date("Y-m-d H:i:s") : $model->created)); ?>
	</div>

	<?php
	if(!$model->isNewRecord):
	?>
	<div>
		<?php echo $form->labelEx($model, 'update');?>
		<?php echo $form->textField($model, 'update', array('value'=>md5($model->f_update))); ?>
	</div>
	<?php endif; ?>

	<div>
		<?php echo $form->labelEx($model, 'f_logo');?>
		<?php echo $form->textField($model, 'f_logo', array('size' => 60, 'maxlength' => 100)); ?>
		<?php echo $form->error($model, 'f_logo'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model, 'description'); ?>
		<div class="controls" style="margin-bottom: 10px;">
			<?php
			$this->widget('ext.helpers.ckeditor.widgets.ExtEditMe', array(
				'model' => $model,
				'value' => $model['description'],
				'attribute'=>'description',
				"toolbar"=>"Full",
				'height' => '400px',
				'width' => '100%',
			));
			?>
			<?php echo $form->error($model, 'description'); ?>
		</div>
		<?php echo $form->error($model, 'description'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model, 'bpn'); ?>
		<div class="controls" style="margin-bottom: 10px;">
			<?php
			$this->widget('ext.helpers.ckeditor.widgets.ExtEditMe', array(
				'model' => $model,
				'value' => $model['bpn'],
				'attribute'=>'bpn',
				"toolbar"=>"Full",
				'height' => '400px',
				'width' => '100%',
			));
			?>
			<?php echo $form->error($model, 'bpn'); ?>
		</div>
		<?php echo $form->error($model, 'bpn'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model, 'f_update'); ?>
		<div class="controls" style="margin-bottom: 10px;">
			<?php
			$this->widget('ext.helpers.ckeditor.widgets.ExtEditMe', array(
				'model' => $model,
				'value' => $model['f_update'],
				'attribute'=>'f_update',
				"toolbar"=>"Full",
				'height' => '400px',
				'width' => '100%',
			));
			?>
			<?php echo $form->error($model, 'f_update'); ?>
		</div>
		<?php echo $form->error($model, 'f_update'); ?>
	</div>

	<div class="row-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array('buttonType' => 'submit', 'type' => 'primary', 'icon' => 'ok', 'label' => $model->isNewRecord ? 'Create' : 'Save')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->