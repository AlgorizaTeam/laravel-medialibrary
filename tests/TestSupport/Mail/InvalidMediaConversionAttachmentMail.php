<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport\Mail;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Mail\Mailable;

class InvalidMediaConversionAttachmentMail extends Mailable
{
    public function __construct(public Media $media)
    {
    }

    public function build()
    {
        $thumbnailAttachment = $this->media->mailAttachment('non-existing-conversion');

        return $this
            ->to('johndoe@example.com')
            ->view('mailable')
            ->attach($thumbnailAttachment);
    }
}
