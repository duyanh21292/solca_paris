<?php

class FooterWidget extends CWidget{
    public function run()
    {
        $all_menu = Menu::getAllMenu();
        $map_information = Information::getArrInformationFooter();
        $this->render('footer',array(
            'all_menu' => $all_menu,
            'map_information' => $map_information
        ));
    }

}
/**
 * Created by PhpStorm.
 * User: DUYANH
 * Date: 14/06/2015
 * Time: 10:02 CH
 */