<?php

namespace resmedia\yii2\mongoGalleryManager;

use Yii;
use yii\web\AssetBundle;

class GalleryManagerAsset extends AssetBundle
{
    public $sourcePath = '@resmedia/yii2/mongoGalleryManager/assets';
    public $js = [
        'jquery.iframe-transport.js',
        'jquery.galleryManager.js',
    ];
    public $css = [
        'galleryManager.css'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset'
    ];

}
