<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport\TestModels;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;

class TestModelWithConversion extends TestModel
{
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->nonQueued();

        $this->addMediaConversion('keep_original_format')
            ->keepOriginalImageFormat()
            ->nonQueued();
    }
}
