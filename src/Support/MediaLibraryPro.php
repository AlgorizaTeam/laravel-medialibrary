<?php

namespace AlgorizaTeam\MediaLibrary\Support;

use AlgorizaTeam\MediaLibrary\MediaCollections\Exceptions\FunctionalityNotAvailable;
use AlgorizaTeam\MediaLibraryPro\Models\TemporaryUpload;

class MediaLibraryPro
{
    public static function ensureInstalled(): void
    {
        if (! self::isInstalled()) {
            throw FunctionalityNotAvailable::mediaLibraryProRequired();
        }
    }

    public static function isInstalled(): bool
    {
        return class_exists(TemporaryUpload::class);
    }
}
