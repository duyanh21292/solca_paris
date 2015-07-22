<div class="row wrapper_header">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <div class="logo">
                        <div>SOLCA</div>
                    </div>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <?php foreach ($all_menu as $menu): ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="/Product/allProduct?menu_id=<?php echo $menu->id ?>">
                                <?php echo mb_strtoupper($menu->name,'UTF-8') ?>
                                <?php if ($map_sub_menu[$menu->id] != null): ?>
                                    <span class="caret"></span>
                                <?php endif ?>
                            </a>
                            <?php if ($map_sub_menu[$menu->id] != null): ?>
                                <ul class="dropdown-menu">
                                    <li>
                                    <?php $sub_menu_count = 0; foreach($map_sub_menu[$menu->id] as $key=>$sub_menu): ?>
                                        <?php if($sub_menu_count == 0) echo '<div class="col_sub_menu">'; ?>
                                        <?php $sub_menu_count++; ?>
                                        <a href="/Product/allProduct?menu_id=<?php echo $sub_menu->id ?>"><div class="sub_menu lv0"><?php echo mb_strtoupper($sub_menu->name,'UTF-8') ?></div></a>
                                        <?php if ($map_sub_menu[$sub_menu->id] != null): ?>
                                            <?php foreach($map_sub_menu[$sub_menu->id] as $sub_menu_lv1): ?>
                                                <?php $sub_menu_count++; ?>
                                                <a href="/Product/allProduct?menu_id=<?php echo $sub_menu_lv1->id ?>"><div class="sub_menu lv1">
                                                    <?php echo $sub_menu_lv1->name ?>
                                                </div></a>
                                                <?php if ($map_sub_menu[$sub_menu_lv1->id] != null): ?>
                                                    <?php foreach($map_sub_menu[$sub_menu_lv1->id] as $sub_menu_lv2): ?>
                                                        <?php $sub_menu_count++; ?>
                                                        <a href="/Product/allProduct?menu_id=<?php echo $sub_menu_lv2->id ?>"><div class="sub_menu lv2">
                                                                <?php echo $sub_menu_lv2->name ?>
                                                        </div></a>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                        <?php if($sub_menu_count >= 15 || ($key+1) == sizeof($map_sub_menu[$menu->id])){echo '</div>';$sub_menu_count=0;}   ?>
                                    <?php endforeach ?>
                                    </li>
                                </ul>
                            <?php endif ?>
                        </li>
                    <?php endforeach ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <span class="shopping-icon icon ion-bag"></span>
                    </li>
                    <!--<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
                </ul>
            </div>
        </div>
    </nav>
</div>
