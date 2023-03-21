<?php

namespace AlgorizaTeam\MediaLibrary\Support\UrlGenerator;

use DateTimeInterface;
use AlgorizaTeam\MediaLibrary\Conversions\Conversion;
use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use AlgorizaTeam\MediaLibrary\Support\PathGenerator\PathGenerator;

interface UrlGenerator
{
    public function getUrl(): string;

    public function getPath(): string;

    public function setMedia(Media $media): self;

    public function setConversion(Conversion $conversion): self;

    public function setPathGenerator(PathGenerator $pathGenerator): self;

    /**
     * @param DateTimeInterface $expiration
     * @param array<string, mixed> $options
     *
     * @return string
     */
    public function getTemporaryUrl(DateTimeInterface $expiration, array $options = []): string;

    public function getResponsiveImagesDirectoryUrl(): string;
}
