<?php

namespace AlgorizaTeam\MediaLibrary\Conversions\ImageGenerators;

use AlgorizaTeam\MediaLibrary\Conversions\Conversion;
use Illuminate\Support\Collection;
use Imagick;
use ImagickPixel;

class Svg extends ImageGenerator
{
    public function convert(string $file, Conversion $conversion = null): string
    {
        $imageFile = pathinfo($file, PATHINFO_DIRNAME).'/'.pathinfo($file, PATHINFO_FILENAME).'.jpg';

        $image = new Imagick();
        $image->readImage($file);
        $image->setBackgroundColor(new ImagickPixel('none'));
        $image->setImageFormat('jpg');

        file_put_contents($imageFile, $image);

        return $imageFile;
    }

    public function requirementsAreInstalled(): bool
    {
        return class_exists(\Imagick::class);
    }

    public function supportedExtensions(): Collection
    {
        return collect('svg');
    }

    public function supportedMimeTypes(): Collection
    {
        return collect('image/svg+xml');
    }
}
