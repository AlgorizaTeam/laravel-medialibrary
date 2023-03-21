<?php

namespace AlgorizaTeam\MediaLibrary\MediaCollections\Events;

use AlgorizaTeam\MediaLibrary\HasMedia;
use Illuminate\Queue\SerializesModels;

class CollectionHasBeenCleared
{
    use SerializesModels;

    public function __construct(public HasMedia $model, public string $collectionName)
    {
    }
}
