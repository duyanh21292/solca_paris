<?php

class FilterWidget extends CWidget{
    public function run()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'name asc';
        $brands = Brand::model() -> findAll($criteria);
        $criteria->condition = 'parent_id = 1';
        $colors = Filter::model() -> findAll($criteria);
        $criteria->condition = 'parent_id = 2';
        $skins = Filter::model() -> findAll($criteria);
        $criteria->condition = 'parent_id = 3';
        $smells = Filter::model() -> findAll($criteria);
        $criteria->condition = 'parent_id = 4';
        $materials = Filter::model() -> findAll($criteria);
        $criteria->condition = 'parent_id = 5';
        $packs = Filter::model() -> findAll($criteria);
        $criteria->condition = 'parent_id = 18';
        $suites = Filter::model() -> findAll($criteria);
        $this->render('filter',array(
            'brands' => $brands,
            'colors' => $colors,
            'skins' => $skins,
            'smells' => $smells,
            'materials' => $materials,
            'packs' => $packs,
            'suites' => $suites
        ));
    }
}
/**
 * Created by PhpStorm.
 * User: DUYANH
 * Date: 12/07/2015
 * Time: 10:42 CH
 */