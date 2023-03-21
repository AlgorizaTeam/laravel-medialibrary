<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport\TestModels;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

class TestModelWithPreviewConversion extends TestModel
{
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
}
