<?php

namespace AlgorizaTeam\MediaLibrary\Downloaders;

interface Downloader
{
    public function getTempFile(string $url): string;
}
