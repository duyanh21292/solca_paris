<style type="text/css">
    div.wrapper_upload_content{
        border: 1px dotted;
        padding: 10px;
        display: inline-block;
    }
    div.wrapper_upload_content td{
        padding: 5px;
    }
    div.wrapper_upload_content tr.img_preview{
        border: 1px solid #BEBEBE;
        background-color: #E6E6E6;
    }
    div.gallery_content{
        width: 820px;
        height: 300px;
        border: 1px solid #c0c0c0;
        overflow: auto;
        background-color: #F4F4F4;
        resize: vertical;
    }
    div.gallery_item{
        width: 250px;
        height: auto;
        display: inline-block;
        text-align: center;

        margin: 5px;
    }

    div.gallery_item input[type="text"]{
        margin-top: 5px;
        width: 200px;
    }
    div.img_item{
        margin: 2px auto 0px auto;
        width: 200px;
        height: 100px;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        border: 2px solid #F4F4F4;
        cursor: pointer;
    }
    div.img_item.selected{
        border-color: #2B579A;
    }
    .gallery_item .go_to_icon{
        cursor: pointer;
        color: #CC1B1B;
        vertical-align: inherit;
    }
</style>
<script type="text/javascript">
    function upload_file(folder){
        if(typeof $('input[name="image"]').val() === 'undefined' || $.isEmptyObject($('input[name="image"]').val())) {
            return;
        }
        var fd = new FormData($('#upload_img')[0]);
        var url = '/Gallery/uploadImage'
        if (folder === SLIDE) {
            url = '/Gallery/uploadImageSlide';
        }
        $.ajax({
            url: url,
            type: 'POST',
            cache: false,
            data: fd,
            processData: false,
            contentType: false,
            success: function (data) {
                if(data === 'ERROR') {
                    return;
                }
                var gallery = jQuery.parseJSON(data);
                var url = 'http://' + window.location.host + '/css/img/' + gallery.img_url;
                var img_preview = '<div id="gallery_'+gallery.id+'" class="gallery_item" imgId="' + gallery.id + '">'
                                + '<div class="img_item" style="background-image: url(\'../../../css/img/' + gallery.img_url + '\')" onclick="selectedImg('+gallery.id+')"></div>'
                                + '<input type="text" value="' + url + '" disabled="disabled" />'
                                + '<div class="go_to_icon icon ion-android-trash" onclick="del_file('+gallery.id+')"></div>'
                                + '</div>';
                $('.gallery_content').append(img_preview);
                $('input[name="image"]').val('');
            },
            error: function () {
                alert("Tải lên không thành công!");
            }
        });
    }

    function del_file(id){
        var img_url = $('#gallery_'+id).children('input').val();
        var result = confirm('Xác nhận xóa ảnh "'+img_url+'" ?');
        if(result){
            var url = '/Gallery/deleteImage?id=' + id;
            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                success: function(data) {
                    if(data != '1') {
                        return;
                    }
                    $('#gallery_'+id).remove();
                },
                error: function () {
                    alert("Tải lên không thành công!");
                }
            });
        }
    }
</script>
<div class="wrapper_upload_content">
    <h4>Thư viện ảnh</h4>
    <div class="gallery_content">
        <?php foreach($galleries as $gallery): ?>
            <div id="gallery_<?php echo $gallery->id ?>" class="gallery_item" imgId="<?php echo $gallery->id ?>">
                <div class="img_item" style="background-image: url('../../../css/img/<?php echo $gallery->img_url ?>')"
                    onclick="selectedImg('<?php echo $gallery->id ?>')"></div>
                <input type="text" value="<?php echo "http://".$_SERVER['SERVER_NAME']."/css/img/".$gallery->img_url ?>" disabled="disabled" />
                <div class="go_to_icon icon ion-android-trash" onclick="del_file('<?php echo $gallery->id ?>')"></div>
            </div>
        <?php endforeach ?>
    </div>
    <h4>Tải hình ảnh</h4>
    <form id="upload_img" method="post" enctype="multipart/form-data">
        <table id="upload_img_content">
            <tr>
                <td>
                    <input name="image" type="file" accept="image/*"/>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="Tải lên" onclick="upload_file(<?php echo $folder ?>)"/>
                </td>
            </tr>
        </table>
    </form>
</div>