<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;

class TestUuidPathGenerator extends TestPathGenerator
{
    public function getPath(Media $media): string
    {
        return "{$media->uuid}/";
    }
}
