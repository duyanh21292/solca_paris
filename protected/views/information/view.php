<div class="wrapper_content wrapper_category">
    <div class="wrapper_nav">
        <a href="/"><div class="nav_item">Trang chủ</div></a>
        <div class="nav_icon icon ion-ios7-arrow-right"></div>
        <div class="nav_item current">Giới thiệu</div>
        <div class="nav_icon icon ion-ios7-arrow-right"></div>
    </div>
    <div id="present" class="category_title">Giới thiệu</div>
    <div class="category_content" style="padding-top: 10px;"><?php echo $information[Information::PRESENT]->content ?></div>
    <div id="contact" class="category_title" style="margin-top: 50px">Liên hệ</div>
    <div class="category_content" style="padding: 10px 0px;">
        <div class="company_name" style="font-size: 18px;color: #0AA0BB;margin-bottom: 10px">
            Công ty TNHH Tư vấn Hiếu Gia
        </div>
        <div class="social_item info_icon icon ion-ios7-location"></div>
        <div class="contact_label">
            Địa chỉ:
        </div>
        <div class="contact_info">
            <?php echo $information[Information::ADDRESS]->content ?>
        </div>
        <br>
        <div class="social_item info_icon icon ion-ios7-telephone"></div>
        <div class="contact_label">
            Số điện thoại:
        </div>
        <div class="contact_info">
            <?php echo $information[Information::MOBILE]->content ?>
        </div>
        <br>
        <div class="social_item info_icon icon ion-ios7-email"></div>
        <div class="contact_label">
            Email:
        </div>
        <div class="contact_info">
            <?php echo $information[Information::EMAIL]->content ?>
        </div>
    </div>
</div>