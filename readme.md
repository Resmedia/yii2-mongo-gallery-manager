# Yii2 Gallery Manager for MongoDB

#### This is rebuild of https://github.com/zxbodya/yii-gallery-manager

## Features
AJAX image upload
Optional name and description for each image
Possibility to arrange images in gallery
Ability to generate few versions for each image with different configurations
Drag & Drop

## Decencies
Yii2
Twitter bootstrap assets (version 3)
Imagine library
JQuery UI (included with Yii)
Installation:
The preferred way to install this extension is through composer.

## Install

run
```bash
php composer.phar require resmedia/yii2-mongo-gallery-manager
```
or run
```bash
composer require resmedia/yii2-mongo-gallery-manager
```
or add to composer
```json
{
  "resmedia/yii2-mongo-gallery-manager": "^1.0"
}
```

## Usage

### 1) Add widget where you need to upload images

```php
GalleryManager::widget([
    'model' => $model,
    'behaviorName' => 'galleryBehavior',
    'apiRoute' => 'galleryApi'
])
```

### 2) Add to controller examples

### with actions and behaviors

```php
$actions['galleryApi'] = [
   'class' => GalleryManagerAction::class,
   'types' => [
       'news' => News::class
   ]
];
```

```php
$behaviors['access']['rules'] = [
      [
           'actions' => [
                    ......, 'galleryApi',
           ],
           'allow' => true,
           'roles' => ['@'],
      ],
];
```

or only actions

```php
class NewsController extends Controller
{
...
public function actions()
{
    return [
       'galleryApi' => [
           'class' => GalleryManagerAction::class,
           // mappings between type names and model classes (should be the same as in behaviour)
           'types' => [
               'news' => News::class
           ]
       ],
    ];
}
```

### 3) Add to model

```php
'galleryBehavior' => [
       'class' => GalleryBehavior::class,
       'type' => 'news',
       'extension' => 'jpg',
       // image dimmentions for preview in widget
       'previewWidth' => 300,
       'previewHeight' => 200,
       // path to location where to save images
       'directory' => Yii::getAlias('@api') . '/web/bucket/items',
          'url' => Yii::$app->params['domainFrontend'] . '/bucket/items',
          // additional image versions
          'versions' => [
              'original' => function ($img) {
                  $width = 1000;
                  $height = 550;
                  return $img
                      ->copy()
                      ->thumbnail(new Box($width, $height), ImageInterface::THUMBNAIL_OUTBOUND);
              },
              'medium' => function ($img) {
                  $width = 600;
                  $height = 328;
                  return $img
                      ->copy()
                      ->thumbnail(new Box($width, $height), ImageInterface::THUMBNAIL_OUTBOUND);
              },
              'preview' => function ($img) {
                  $width = 300;
                  $height = 164;
                  return $img
                      ->copy()
                      ->thumbnail(new Box($width, $height), ImageInterface::THUMBNAIL_OUTBOUND);
              },
          ]
      ],
 ]
```

See also [documentations of imagine](https://imagine.readthedocs.io/en/master/usage/introduction.html) for image transformations.

### 4)  To get images

```php
foreach($model->getBehavior('galleryBehavior')->getImages() as $image) {
    echo Html::img($image->getUrl('medium'));
}
```


## TODO

*Make alert on big or small size*
