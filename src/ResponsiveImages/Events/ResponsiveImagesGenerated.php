<?php

namespace AlgorizaTeam\MediaLibrary\ResponsiveImages\Events;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Queue\SerializesModels;

class ResponsiveImagesGenerated
{
    use SerializesModels;

    public function __construct(public Media $media)
    {
    }
}
