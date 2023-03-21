<?php

namespace AlgorizaTeam\MediaLibrary\MediaCollections\Events;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Queue\SerializesModels;

class MediaHasBeenAdded
{
    use SerializesModels;

    public function __construct(public Media $media)
    {
    }
}
