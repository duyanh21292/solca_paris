<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid post-content">
	<div class="span8 col-left">
		<?php echo $content; ?>
	</div>
	<div class="span4 col-right">
		<div class="row-fluid"><?php $this->widget('application.components.ca-widgets.FileDownload.FileDownload'); ?></div>
		<div class="row-fluid">
			<a href="<?php echo Yii::app()->homeUrl; ?>" target="_blank"><img typeof="foaf:Image" src="http://ca.fpt.com.vn/sites/default/files/field/image/dich_vu_0.png" alt=""></a>
		</div>
		<div class="row-fluid"><?php $this->widget('application.components.ca-widgets.Support.Support'); ?></div>
	</div>
</div>
<?php $this->endContent(); ?>
