<script type="text/javascript">
    $(function(){
        $('.current_item').removeClass('current_item');
        $('#info_mng').addClass('current_item');
    });
</script>
<div class="admin_list_categories">
    <div class="admin_list_title">Danh sách thông tin</div>
    <!--<a href="/Categories/categoryForm"><div class="admin_bt_create_new">Tạo mới</div></a>-->
    <table border="1">
        <tr>
            <th class="list_col_id">
                No.
            </th>
            <th class="list_col_name">
                Loại
            </th>
            <th class="list_col_desc">
                Nội dung
            </th>
            <th class="list_col_tools">
                Công cụ
            </th>
        </tr>
        <?php foreach($list_informations as $key=>$information): ?>
            <tr>
                <td>
                    <?php echo $key+1; ?>
                </td>
                <td>
                    <?php echo $information->type_name ?>
                </td>
                <td>
                    <div class="cell_category_content">
                        <?php echo $information->content ?>
                    </div>
                </td>
                <td style="text-align: center">
                    <a href="/Information/informationForm?id=<?php echo $information->id ?>"><div class="go_to">
                            <span>Sửa</span>
                            <div class="go_to_icon icon ion-edit"></div>
                    </div></a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>