<?php

class UploadImageWidget extends CWidget{

    public $folder;

    public function run()
    {
        $criteria = new CDbCriteria();
        if($this->folder == Gallery::UPLOADED) {
            $criteria->condition = 'type = 1';
        } else if ($this->folder == Gallery::SLIDE){
            $criteria->condition = 'type = 2';
        }
        $galleries = Gallery::model() -> findAll($criteria);
        $this->render('upload',array(
            'galleries' => $galleries,
            'folder' => $this->folder
        ));
    }

}
/**
 * Created by PhpStorm.
 * User: DUYANH
 * Date: 14/06/2015
 * Time: 10:02 CH
 */