<script type="text/javascript">
    $(function(){
        $('.current_item').removeClass('current_item');
        $('#categories_mng').addClass('current_item');
    });
</script>
<div class="wrapper_form">
    <div class="admin_list_title">Thông tin danh mục</div>
    <form name="new_category" method="post" action="saveMenu">
        <input type="hidden" name="id" value="<?php if($category!= null) echo $category->id ?>"/>
        <table>
            <tr>
                <td>
                    Tên:
                </td>
                <td>
                    <input type="text" name="name" value="<?php if($category!= null) echo $category->name ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Mô tả:
                </td>
                <td>
                    <textarea name="desc"><?php if($category!= null) echo $category->description ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Thứ tự:
                </td>
                <td>
                    <input type="number" name="order" value="<?php if($category!= null) echo $category->order; else echo '0' ?>" contenteditable="false"/>
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <input type="submit" value="<?php if($category!= null) echo 'Cập nhật'; else echo 'Tạo mới'; ?>"/>
                </td>
            </tr>
        </table>
    </form>
</div>
