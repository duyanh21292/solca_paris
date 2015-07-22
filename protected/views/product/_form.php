<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rating'); ?>
		<?php echo $form->textField($model,'rating'); ?>
		<?php echo $form->error($model,'rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rating_num'); ?>
		<?php echo $form->textField($model,'rating_num'); ?>
		<?php echo $form->error($model,'rating_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'capacity'); ?>
		<?php echo $form->textField($model,'capacity'); ?>
		<?php echo $form->error($model,'capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_id'); ?>
		<?php echo $form->textField($model,'menu_id'); ?>
		<?php echo $form->error($model,'menu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->textField($model,'brand_id'); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pack_id'); ?>
		<?php echo $form->textField($model,'pack_id'); ?>
		<?php echo $form->error($model,'pack_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'color_id'); ?>
		<?php echo $form->textField($model,'color_id'); ?>
		<?php echo $form->error($model,'color_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skin_id'); ?>
		<?php echo $form->textField($model,'skin_id'); ?>
		<?php echo $form->error($model,'skin_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'smelling_id'); ?>
		<?php echo $form->textField($model,'smelling_id'); ?>
		<?php echo $form->error($model,'smelling_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'material_id'); ?>
		<?php echo $form->textField($model,'material_id'); ?>
		<?php echo $form->error($model,'material_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suite_id'); ?>
		<?php echo $form->textField($model,'suite_id'); ?>
		<?php echo $form->error($model,'suite_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'special'); ?>
		<?php echo $form->textField($model,'special'); ?>
		<?php echo $form->error($model,'special'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_id'); ?>
		<?php echo $form->textField($model,'img_id'); ?>
		<?php echo $form->error($model,'img_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->