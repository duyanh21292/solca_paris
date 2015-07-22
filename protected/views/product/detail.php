<script type="text/javascript">
    function detectRating(rating){
        /*rating = parseInt(rating);*/
        if(10<=rating && rating<=29){
            rating = 1;
        } else if (30<=rating && rating<=49) {
            rating = 2;
        } else if (50<=rating && rating<=69) {
            rating = 3;
        } else if (70<=rating && rating<=89) {
            rating = 4;
        } else if (90<=rating && rating<=100) {
            rating = 5;
        } else {
            rating = 0;
        }
        setRatingHeart(rating);
    }

    function setRatingHeart(cur_rating){
        $('.rating_icon').each(function(index){
            var rating = parseInt($(this).attr('rating'));
            if(rating <= cur_rating){
                $(this).removeClass('ion-ios7-heart-outline');
                $(this).addClass('ion-ios7-heart');
            } else {
                $(this).removeClass('ion-ios7-heart');
                $(this).addClass('ion-ios7-heart-outline');
            }
        });
    }

    $(function() {
        detectRating(<?php echo $product->rating ?>);
        $('.rating_icon').hover(function(){
            var cur_rating = $(this).attr('rating');
            setRatingHeart(cur_rating);
        });
        $('.wrapper_rating').hover(function(){

        }, function(){
            $('.rating_icon').removeClass('ion-ios7-heart');
            $('.rating_icon').addClass('ion-ios7-heart-outline');
            detectRating(parseInt($(this).attr('rating')));
        });
    });
</script>
<div class="row wrapper_nav">
    <div class="nav_item">
        <a href="/">Trang chủ</a>
    </div>
    <?php for($i = (sizeof($arr_navigate)-1); $i >= 0; $i--): ?>
        <div class="nav_item">
            <div class="nav_icon icon ion-ios7-arrow-forward"></div>
            <a href="/Product/allProduct?menu_id=<?php echo $arr_navigate[$i]->id ?>">
                <?php echo $arr_navigate[$i]->name ?>
            </a>
        </div>
    <?php endfor ?>
    <div class="nav_item cur_nav">
        <div class="nav_icon icon ion-ios7-arrow-forward"></div>
        <?php echo $product->name ?>
    </div>
</div>
<div class="row" style="margin-top: 30px">
    <div class="col-md-6 detail_img">
        <img src="/css/img/<?php echo $product->img_url ?>">
    </div>
    <div class="col-md-6 detail_info">
        <div class="detail_brand">
            <?php echo mb_strtoupper($product->brand_name,'UTF-8') ?>
        </div>
        <div class="detail_product_name">
            <?php echo $product->name ?>
            <span><?php echo '('.$product->code.')' ?></span>
        </div>
        <div class="detail_size">
            <?php
                if($product->capacity > 0) {
                    echo $product->capacity.'ml';
                }
                if($product->weight > 0) {
                    echo $product->weight.'g';
                }
            ?>
        </div>
        <div class="detail_price">
            <?php echo '$'.$product->price ?>
        </div>
        <div class="bt_add_product">THÊM VÀO GIỎ HÀNG</div>
        <br>
        <div class="wrapper_rating" rating="<?php echo $product->rating ?>">
            <?php for($i = 1; $i <= 5 ; $i++): ?>
                <div class="rating_icon icon ion-ios7-heart-outline" rating="<?php echo $i ?>"></div>
            <?php endfor ?>
        </div>
    </div>
    <div class="col-md-12 detail_desc">
        <h4 class="detail_title">
            <span>MÔ TẢ SẢN PHẨM</span>
        </h4>
        <?php echo $product->description ?>
    </div>
    <div class="col-md-12 detail_suggest">
        <h4 class="detail_title">
            <span>TOP SẢN PHẨM CÙNG LOẠI</span>
        </h4>
        <?php foreach ($products_suggest as $product_suggest): ?>
            <a href="/Product/productDetail?product_id=<?php echo $product_suggest->id ?>">
                <div class="col-md-3 product_item product_suggest">
                    <img src="/css/img/<?php echo $product_suggest->img_url ?>">
                    <div class="product_brand"><?php echo $product_suggest->brand_name ?></div>
                    <div class="product_name"><?php echo $product_suggest->name ?></div>
                    <div><?php echo '$'.$product_suggest->price ?></div>
                </div>
            </a>
        <?php endforeach ?>
    </div>
</div>