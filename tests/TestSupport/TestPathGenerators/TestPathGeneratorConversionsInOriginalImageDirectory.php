<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport\TestPathGenerators;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use AlgorizaTeam\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;
use AlgorizaTeam\MediaLibrary\Support\PathGenerator\PathGenerator;

class TestPathGeneratorConversionsInOriginalImageDirectory extends DefaultPathGenerator implements PathGenerator
{
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media);
    }
}
