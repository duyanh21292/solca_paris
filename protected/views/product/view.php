<div class="row wrapper_nav">
    <div class="nav_item">
        <a href="/">Trang chủ</a>
    </div>
    <?php for($i = (sizeof($arr_navigate)-1); $i >= 0; $i--): ?>
        <div class="nav_item <?php if($i==0) echo 'cur_nav' ?>">
            <div class="nav_icon icon ion-ios7-arrow-forward"></div>
            <?php if($i==0): ?>
                <?php echo $arr_navigate[$i]->name ?>
                <span><?php echo '('.$total_product.' sản phẩm)' ?></span>
            <?php else: ?>
                <a href="/Product/allProduct?menu_id=<?php echo $arr_navigate[$i]->id ?>">
                <?php echo $arr_navigate[$i]->name ?>
                </a>
            <?php endif ?>
        </div>
    <?php endfor ?>
</div>
<div class="row">
    <div class="col-md-3 wrapper_filter">
        <?php $this->widget('FilterWidget') ?>
    </div>
    <div class="col-md-9 wrapper_products">
        <div class="col-md-12 wrapper_tool">
            <div class="wrapper_sort">
                <div class="sort_title">sắp xếp theo</div>
                <select name="sort" onchange="sortByStateChange()">
                    <option value="1">Giá tăng dần</option>
                    <option value="2">Giá giảm dần</option>
                    <option value="3">Tên hãng A-Z</option>
                    <option value="4">Tên hãng Z-A</option>
                    <option value="5">Xếp hạng giảm dần</option>
                    <option value="6">Xếp hạng tăng dần</option>
                </select>
            </div>
        </div>
        <?php foreach ($products as $product): ?>
            <a href="/Product/productDetail?product_id=<?php echo $product->id ?>">
                <div class="col-md-4 product_item">
                    <img src="/css/img/<?php echo $product->img_url ?>">
                    <div class="product_brand"><?php echo $product->brand_name ?></div>
                    <div class="product_name"><?php echo $product->name ?></div>
                    <div><?php echo '$'.$product->price ?></div>
                    <div class="bt_view">XEM</div>
                </div>
            </a>
        <?php endforeach ?>
        <div class="col-md-12 wrapper_tool">
            <div class="wrapper_page">
                <?php if($total_product > 0): ?>
                    <div class="page_title">trang</div>
                    <?php for($i = 0 ; $i < $page_num ; $i++ ): ?>
                        <div class="page_tick <?php if(($i+1) == $page) echo 'current_page' ?>"><?php echo ($i+1) ?></div>
                    <?php endfor ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>