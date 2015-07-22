<?php
/**
 * Created by PhpStorm.
 * User: DUYANH
 * Date: 28/06/2015
 * Time: 12:30 CH
 */
class SlideWidget extends CWidget{

    public function run()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'type = 2';
        $galleries = Gallery::model() -> findAll($criteria);
        $this->render('slide',array(
           'galleries' => $galleries
        ));
    }

}