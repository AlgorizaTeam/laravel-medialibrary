<?php

namespace AlgorizaTeam\MediaLibrary\Conversions\Actions;

use AlgorizaTeam\MediaLibrary\Conversions\Conversion;
use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use AlgorizaTeam\MediaLibrary\Support\ImageFactory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PerformManipulationsAction
{
    public function execute(
        Media $media,
        Conversion $conversion,
        string $imageFile
    ): string {
        if ($conversion->getManipulations()->isEmpty()) {
            return $imageFile;
        }

        $conversionTempFile = $this->getConversionTempFileName($media, $conversion, $imageFile);

        File::copy($imageFile, $conversionTempFile);

        $supportedFormats = ['jpg', 'pjpg', 'png', 'gif'];
        if ($conversion->shouldKeepOriginalImageFormat() && in_array($media->extension, $supportedFormats)) {
            $conversion->format($media->extension);
        }

        ImageFactory::load($conversionTempFile)
            ->manipulate($conversion->getManipulations())
            ->save();

        return $conversionTempFile;
    }

    protected function getConversionTempFileName(
        Media $media,
        Conversion $conversion,
        string $imageFile
    ): string {
        $directory = pathinfo($imageFile, PATHINFO_DIRNAME);

        $fileName = Str::random(32)."{$conversion->getName()}.{$media->extension}";

        return "{$directory}/{$fileName}";
    }
}
