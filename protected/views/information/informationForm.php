<script type="text/javascript">
    $(function(){
        $('.current_item').removeClass('current_item');
        $('#info_mng').addClass('current_item');
    });
</script>
<div class="wrapper_form">
    <div class="admin_list_title">Thông tin</div>
    <form name="new_category" method="post" action="saveInformation">
        <input type="hidden" name="id" value="<?php echo $information->id ?>"/>
        <table>
            <tr>
                <td>
                    Loại:
                </td>
                <td>
                    <input type="text" name="name" value="<?php echo $information->type_name ?>" disabled="disabled"/>
                </td>
            </tr>
            <tr>
                <td>
                    Nội dung:
                </td>
                <td>
                    <textarea name="content"><?php echo $information->content ?></textarea>
                    <script>
                        CKEDITOR.replace('content',{
                            skin: 'office2013'
                        });
                    </script>
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <input type="submit" value="Cập nhật"/>
                </td>
            </tr>
        </table>
    </form>
    <?php /*$this->widget('UploadImageWidget',array('folder'=>Gallery::UPLOADED)) */?>
</div>