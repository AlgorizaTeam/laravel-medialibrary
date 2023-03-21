<?php

namespace AlgorizaTeam\MediaLibrary\Conversions\Events;

use AlgorizaTeam\MediaLibrary\Conversions\Conversion;
use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Queue\SerializesModels;

class ConversionWillStart
{
    use SerializesModels;

    public function __construct(public Media $media, public Conversion $conversion, public string $copiedOriginalFile)
    {
    }
}
