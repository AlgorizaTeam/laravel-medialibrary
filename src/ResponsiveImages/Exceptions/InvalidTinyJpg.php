<?php

namespace AlgorizaTeam\MediaLibrary\ResponsiveImages\Exceptions;

use AlgorizaTeam\MediaLibrary\Support\File;
use Exception;

class InvalidTinyJpg extends Exception
{
    public static function doesNotExist(string $tinyImageDestinationPath): self
    {
        return new static("The expected tiny jpg at `{$tinyImageDestinationPath}` does not exist");
    }

    public static function hasWrongMimeType(string $tinyImageDestinationPath): self
    {
        $foundMimeType = File::getMimeType($tinyImageDestinationPath);

        return new static("Expected the file at {$tinyImageDestinationPath} have mimetype `image/jpeg`, but found a file with mimetype `{$foundMimeType}`");
    }
}
