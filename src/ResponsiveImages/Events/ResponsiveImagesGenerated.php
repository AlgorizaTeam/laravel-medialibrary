<?php

namespace AlgorizaTeam\MediaLibrary\ResponsiveImages\Events;

use Illuminate\Queue\SerializesModels;
use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;

class ResponsiveImagesGenerated
{
    use SerializesModels;

    public function __construct(public Media $media)
    {
    }
}
