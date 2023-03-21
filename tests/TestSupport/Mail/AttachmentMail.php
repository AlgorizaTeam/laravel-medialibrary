<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport\Mail;

use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Mail\Mailable;

class AttachmentMail extends Mailable
{
    public function __construct(public Media $media)
    {
    }

    public function build()
    {
        return $this
            ->to('johndoe@example.com')
            ->view('mailable')
            ->attach($this->media);
    }
}
