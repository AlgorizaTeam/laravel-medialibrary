<?php

namespace AlgorizaTeam\MediaLibrary\ResponsiveImages\Jobs;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use AlgorizaTeam\MediaLibrary\ResponsiveImages\ResponsiveImageGenerator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateResponsiveImagesJob implements ShouldQueue
{
    use InteractsWithQueue;
    use SerializesModels;
    use Queueable;

    public function __construct(protected Media $media)
    {
    }

    public function handle(): bool
    {
        /** @var \AlgorizaTeam\MediaLibrary\ResponsiveImages\ResponsiveImageGenerator $responsiveImageGenerator */
        $responsiveImageGenerator = app(ResponsiveImageGenerator::class);

        $responsiveImageGenerator->generateResponsiveImages($this->media);

        return true;
    }
}
