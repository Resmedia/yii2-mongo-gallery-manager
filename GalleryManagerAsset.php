<?php

namespace resmedia\yii2\mongoGalleryManager;

use Yii;
use yii\web\AssetBundle;

class GalleryManagerAsset extends AssetBundle
{
    public $sourcePath = '@resmedia/yii2/mongoGalleryManager/assets';
    public $js = [
        'iframe-transport.min.js',
        'gallery-manager.min.js',
    ];
    public $css = [
        'gallery-manager.css'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset'
    ];

}
