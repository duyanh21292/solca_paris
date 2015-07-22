<div class="row wrapper_footer">
    <div class="col-md-8 wrapper_footer_menu">
        <?php foreach($all_menu as $menu): ?>
            <div class="menu_item">
                <?php echo $menu->name ?>
                <div class="sub_menu_icon icon ion-ios7-arrow-right"></div>
            </div>
        <?php endforeach ?>
        <div class="row" style="text-align: center;margin-top: 40px;">
            <div class="social_icon icon ion-social-facebook"></div>
            <div class="social_icon icon ion-social-googleplus"></div>
            <div class="social_icon icon ion-ios7-email"></div>
        </div>
    </div>
    <div class="col-md-4 wrapper_footer_contact">
        <div class="contact_line shop_name">
            <?php
            foreach($map_information[Information::NAME] as $key=>$info):
                if ($key > 0)
                    echo ' - ';
                echo mb_strtoupper($info->content,'UTF-8');
            endforeach
            ?>
        </div>
        <div class="contact_line">
            <?php
                foreach($map_information[Information::ADDRESS] as $key=>$info):
                    if ($key > 0)
                        echo ' - ';
                    echo $info->content;
                endforeach
            ?>
        </div>
        <div class="contact_line">
            <div class="phone_icon icon ion-ios7-telephone"></div>
            Paris :
            <?php
                foreach($map_information[Information::PARIS_PHONE] as $key=>$info):
                    if ($key > 0)
                        echo ' - ';
                    echo '('.$info->content.')';
                endforeach
            ?>
        </div>
        <div class="contact_line">
            <div class="phone_icon icon ion-ios7-telephone"></div>
            Vietnam :
            <?php
                foreach($map_information[Information::VIETNAM_PHONE] as $key=>$info):
                    if ($key > 0)
                        echo ' - ';
                    echo '('.$info->content.')';
                endforeach
            ?>
        </div>
        <div class="contact_line">
            <div class="phone_icon icon ion-ios7-email"></div>
            Email :
            <?php
                foreach($map_information[Information::EMAIL] as $key=>$info):
                    if ($key > 0)
                        echo ' - ';
                    echo $info->content;
                endforeach
            ?>
        </div>
    </div>
    <div class="col-md-12 wrapper_copyright">
        Copyright © 2015 Shop Online Châu Âu, Việt Nam. All rights reserved.
    </div>
</div>