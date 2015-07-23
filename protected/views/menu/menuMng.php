<style type="text/css">
    .go_to.remove{
        color: #CC1B1B;
    }
</style>
<script type="text/javascript">
    $(function(){
        $('.current_item').removeClass('current_item');
        $('#categories_mng').addClass('current_item');
    });

    function confirmDelCategory(name,id){
        var result = confirm('Xác nhận xóa Danh mục "'+name+'" ?');
        if(result) {
            $.ajax({
                type: 'GET',
                url: '/Menu/delMenu',
                data: {
                    'id' : id
                }
            }).success(function(data){
                if(data === '1'){
                    window.location = '/Menu/menuManagement'
                }
            });
        }
    }

</script>
<div class="admin_list_categories">
    <div class="admin_list_title">Các danh mục chính</div>
    <a href="/Menu/menuForm"><div class="admin_bt_create_new">Tạo mới</div></a>
    <table border="1">
        <tr>
            <th class="list_col_id">
                No.
            </th>
            <th class="list_col_name">
                Tên
            </th>
            <th class="list_col_desc">
                Mô tả
            </th>
            <th class="list_col_order">
                Thứ tự
            </th>
            <th class="list_col_tools">
                Công cụ
            </th>
        </tr>
        <?php foreach($categories as $key=>$category): ?>
            <tr>
                <td>
                    <?php echo $key+1; ?>
                </td>
                <td>
                    <?php echo $category->name ?>
                </td>
                <td>
                    <?php echo $category->description ?>
                </td>
                <td>
                    <?php echo $category->order ?>
                </td>
                <td style="text-align: center">
                    <a href="/Menu/menuForm?id=<?php echo $category->id ?>"><div class="go_to">
                        <span>Sửa</span>
                        <div class="go_to_icon icon ion-edit"></div>
                    </div></a>
                    <div class="go_to remove" onclick="confirmDelCategory('<?php echo $category->name ?>','<?php echo $category->id ?>')">
                        <span>Xóa</span>
                        <div class="go_to_icon icon ion-android-trash"></div>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>

<div class="admin_list_categories">
    <div class="admin_list_title">Các danh mục con</div>
    <a href="/Categories/subCategoryForm">
        <div class="admin_bt_create_new">Tạo mới</div>
    </a>
    <table border="1">
        <tr>
            <th class="list_col_id">
                No.
            </th>
            <th class="list_col_name">
                Tên
            </th>
            <th class="list_col_desc">
                Mô tả
            </th>
            <th class="list_col_parent">
                Danh mục trực thuộc
            </th>
            <th class="list_col_tools">
                Công cụ
            </th>
        </tr>
        <?php foreach($sub_categories as $key=>$sub_category): ?>
            <tr>
                <td>
                    <?php echo $key+1; ?>
                </td>
                <td>
                    <?php echo $sub_category->name ?>
                </td>
                <td>
                    <?php echo $sub_category->description ?>
                </td>
                <td>
                    <?php echo $sub_category->parent_name ?>
                </td>
                <td style="text-align: center">
                    <a href="/Categories/subCategoryForm?id=<?php echo $sub_category->id ?>"><div class="go_to">
                        <span>Sửa</span>
                        <div class="go_to_icon icon ion-edit"></div>
                    </div></a>
                    <div class="go_to remove" onclick="confirmDelCategory('<?php echo $sub_category->name ?>','<?php echo $sub_category->id ?>')">
                        <span>Xóa</span>
                        <div class="go_to_icon icon ion-android-trash"></div>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>