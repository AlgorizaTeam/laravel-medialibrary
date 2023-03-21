<?php

namespace AlgorizaTeam\MediaLibrary\Conversions\Jobs;

use AlgorizaTeam\MediaLibrary\Conversions\ConversionCollection;
use AlgorizaTeam\MediaLibrary\Conversions\FileManipulator;
use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PerformConversionsJob implements ShouldQueue
{
    use InteractsWithQueue;
    use SerializesModels;
    use Queueable;

    public $deleteWhenMissingModels = true;

    public function __construct(protected ConversionCollection $conversions, protected Media $media, protected bool $onlyMissing = false)
    {
    }

    public function handle(FileManipulator $fileManipulator): bool
    {
        $fileManipulator->performConversions($this->conversions, $this->media, $this->onlyMissing);

        return true;
    }
}
