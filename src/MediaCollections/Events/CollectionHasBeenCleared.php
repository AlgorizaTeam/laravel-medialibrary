<?php

namespace AlgorizaTeam\MediaLibrary\MediaCollections\Events;

use Illuminate\Queue\SerializesModels;
use AlgorizaTeam\MediaLibrary\HasMedia;

class CollectionHasBeenCleared
{
    use SerializesModels;

    public function __construct(public HasMedia $model, public string $collectionName)
    {
    }
}
