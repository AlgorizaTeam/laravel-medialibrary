<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport\Mail;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Mail\Mailable;

class MediaConversionAttachmentMail extends Mailable
{
    public function __construct(public Media $media)
    {
    }

    public function build()
    {
        $thumbnailAttachment = $this->media->mailAttachment('thumb');

        return $this
            ->to('johndoe@example.com')
            ->view('mailable')
            ->attach($thumbnailAttachment);
    }
}
