<?php

namespace AlgorizaTeam\MediaLibrary\MediaCollections\Exceptions;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Exception;

class MediaCannotBeUpdated extends Exception
{
    public static function doesNotBelongToCollection(string $collectionName, Media $media): self
    {
        return new static("Media id {$media->getKey()} is not part of collection `{$collectionName}`");
    }
}
