<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport\TestModels;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

class TestModelWithResponsiveImages extends TestModel
{
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->withResponsiveImages()
            ->width(50)
            ->nonQueued();

        $this->addMediaConversion('otherImageConversion')
            ->greyscale();

        $this->addMediaConversion('pngtojpg')
            ->width(700)
            ->quality(1)
            ->background('blue')
            ->format(Manipulations::FORMAT_JPG)
            ->withResponsiveImages();

        $this->addMediaConversion('lowerQuality')
             ->withResponsiveImages()
             ->quality(60)
             ->nonQueued();

        $this->addMediaConversion('standardQuality')
             ->withResponsiveImages()
             ->nonQueued();
    }
}
