<?php

class HeaderMenuWidget extends CWidget{
    public function run()
    {
        $all_menu = Menu::getAllMenu();
        $map_sub_menu = Menu::getArrSubMenu();
        $this->render('menu',array(
            'all_menu' => $all_menu,
            'map_sub_menu' => $map_sub_menu
        ));
    }

}
/**
 * Created by PhpStorm.
 * User: DUYANH
 * Date: 14/06/2015
 * Time: 10:02 CH
 */