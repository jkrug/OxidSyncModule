<?php

class ONGREvents
{
    /**
     * Execute action on activate event
     */
    public static function onActivate()
    {
        //Don't show errors. This happens by default in ADODbLight
        error_reporting(E_NONE);

        // Add new table to configurate landing pages
        self::recalculateSeoUrls();
    }
    
    /**
     * Recalculate the SEOUrls as preparation for the import
     */
    private static function recalculateSeoUrls()
    {
        $list = oxNew('oxlist');
        $list->init('oxarticle');
        $list->selectString('select * from oxarticles');

        foreach ($list as $article) {
            $article->save();
        }
        
        $list = oxNew('oxlist');
        $list->init('oxcategory');
        $list->selectString('select * from oxcategories');

        foreach ($list as $cat) {
            $cat->save();
        }
        
        $list = oxNew('oxlist');
        $list->init('oxcontent');
        $list->selectString('select * from oxcontents');

        foreach ($list as $content) {
            $content->save();
        }
    }
    
}