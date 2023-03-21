<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport;

use AlgorizaTeam\MediaLibrary\Conversions\Conversion;
use AlgorizaTeam\MediaLibrary\Support\FileNamer\FileNamer;

class RenameOriginalFileNamer extends FileNamer
{
    public function originalFileName(string $fileName): string
    {
        return 'renamed_original_file';
    }

    public function responsiveFileName(string $fileName): string
    {
        $fileName = pathinfo($fileName, PATHINFO_FILENAME);

        return "prefix_{$fileName}_suffix";
    }

    public function conversionFileName(string $fileName, Conversion $conversion): string
    {
        $fileName = pathinfo($fileName, PATHINFO_FILENAME);

        return "prefix_{$fileName}_suffix---{$conversion->getName()}";
    }
}
