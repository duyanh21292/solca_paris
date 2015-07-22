<?php
class ImageSelect extends CWidget{
	private $id;
	public $text = 'Chọn ảnh';
	private $assetsDir;
	public $path;
	public $alt = '';
	public $uploadUrl;
	public $htmlOptions=array();
	public $uploadAjax='';
	public $id_img;

	public function init(){
		$this->id = uniqid();
		$dir = dirname(__FILE__) . '/assets';
		$this->assetsDir = Yii::app()->assetManager->publish($dir);
		$this->register();
		Yii::app()->clientScript->registerScript('script_'.$this->id,
			"$('#div_image_select_".$this->id." form').hide();
			$('#div_image_select_".$this->id." a').file().choose(function(e, input) {
				$('#image-select-loading-".$this->id."').show();
				input.appendTo('#div_image_select_".$this->id." form');
				$('#div_image_select_".$this->id." form').ajaxSubmit({
					success : function(responseText){
						if(responseText=='2' || responseText=='3'){
							$('#image_error').css('display','block');
							$('#image-select-loading-".$this->id."').hide();
						}else if(responseText=='1' || responseText=='4' || responseText=='5'){
							$('#image_error_2').css('display','block');
							$('#image-select-loading-".$this->id."').hide();
						}else{
							var src = '/".SAVE_URL."'+responseText;
							$('#div_image_select_".$this->id." img').attr('src', src);
							$('#".$this->id_img."').attr('value', responseText);
							$('#image_error').css('display','none');
							var uploadAjax = '".$this->uploadAjax."';
							if(uploadAjax == 'on'){
								 image_change($('#img_name').val());
							}
							$('#image_error_2').css('display','none');
						}
					},
					failure: function() {
						$('#alert_error').css('display','block');
						$('#image-select-loading-".$this->id."').hide();
					}
				});
			});
			$('#div_image_select_".$this->id." img').load(function() {
				$('#image-select-loading-".$this->id."').hide();
			});"
			,CClientScript::POS_READY);
	}

	public function run(){
		echo '<div style="position: relative;">';
		echo '<div class="image-select-loading" id="image-select-loading-'.$this->id.'" style="display: none;">&nbsp;</div>';
		echo '<div id="div_image_select_'.$this->id.'" style="display: inline-block; margin-left: auto; margin-right: auto; position: relative; direction: ltr;">';
		echo CHtml::image($this->path, $this->alt, $this->htmlOptions);
		echo '<a id="btn_change_image" class="image-select-edit" style="position: absolute; left: 20px; top: 20px;">'.$this->text.'</a>';
		echo '<form id="frm_img_select" action="'.$this->uploadUrl.'" method="POST" enctype="multipart/form-data"></form>';
		echo '</div>';
		echo '</div>';
	}

	public function register($rtl=false){
		$this->registerCss($rtl);
		$this->registerScripts($rtl);
	}

	public function registerCss($rtl=false){
		Yii::app()->clientScript->registerCssFile($this->assetsDir.'/css/hidden-file-input.css');
		Yii::app()->clientScript->registerCssFile($this->assetsDir.'/css/image-select.css');
	}

	public function registerScripts($rtl){
		Yii::app()->clientScript->registerScriptFile($this->assetsDir.'/js/jquery.form.js',CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($this->assetsDir.'/js/jquery-custom-file-input.js',CClientScript::POS_HEAD);
	}
}
