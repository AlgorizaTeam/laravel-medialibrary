<?php

namespace AlgorizaTeam\MediaLibrary\MediaCollections\Events;

use Illuminate\Queue\SerializesModels;
use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;

class MediaHasBeenAdded
{
    use SerializesModels;

    public function __construct(public Media $media)
    {
    }
}
