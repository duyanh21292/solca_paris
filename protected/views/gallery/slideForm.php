<script type="text/javascript">
    $(function(){
        $('.current_item').removeClass('current_item');
        $('#slide_mng').addClass('current_item');
    });
    function selectedImg(id){
        return;
    }
</script>
<div class="wrapper_form">
    <?php $this->widget('UploadImageWidget',array('folder'=>Gallery::SLIDE)) ?>
</div>