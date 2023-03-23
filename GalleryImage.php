<?php

namespace resmedia\yii2\mongoGalleryManager;

class GalleryImage
{
    public $name;
    public $description;
    public $id;
    public $rank;
    /**
     * @var GalleryBehavior
     */
    protected $galleryBehavior;

    public function __toString(): string
    {
        return 'parent';
    }

    /**
     * @param GalleryBehavior $galleryBehavior
     * @param array           $props
     */
    function __construct(GalleryBehavior $galleryBehavior, array $props)
    {

        $this->galleryBehavior = $galleryBehavior;

        $this->name = isset($props['name']) ? $props['name'] : '';
        $this->description = isset($props['description']) ? $props['description'] : '';
        $this->id = isset($props['_id']) ? $props['_id'] : '';
        $this->rank = isset($props['rank']) ? $props['rank'] : '';
    }

    /**
     * @param string $version
     *
     * @return string
     */
    public function getUrl($version)
    {
        return $this->galleryBehavior->getUrl($this->id, $version);
    }
}
