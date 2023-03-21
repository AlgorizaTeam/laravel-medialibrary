<?php

namespace AlgorizaTeam\MediaLibrary\MediaCollections\Models\Observers;

use AlgorizaTeam\MediaLibrary\Conversions\FileManipulator;
use AlgorizaTeam\MediaLibrary\MediaCollections\Filesystem;
use AlgorizaTeam\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaObserver
{
    public function creating(Media $media)
    {
        if ($media->shouldSortWhenCreating()) {
            if (is_null($media->order_column)) {
                $media->setHighestOrderNumber();
            }
        }
    }

    public function updating(Media $media)
    {
        /** @var \AlgorizaTeam\MediaLibrary\MediaCollections\Filesystem $filesystem */
        $filesystem = app(Filesystem::class);

        if (config('media-library.moves_media_on_update')) {
            $filesystem->syncMediaPath($media);
        }

        if ($media->file_name !== $media->getOriginal('file_name')) {
            $filesystem->syncFileNames($media);
        }
    }

    public function updated(Media $media)
    {
        if (is_null($media->getOriginal('model_id'))) {
            return;
        }

        $original = $media->getOriginal('manipulations');

        if ($media->manipulations !== $original) {
            $eventDispatcher = Media::getEventDispatcher();
            Media::unsetEventDispatcher();

            /** @var \AlgorizaTeam\MediaLibrary\Conversions\FileManipulator $fileManipulator */
            $fileManipulator = app(FileManipulator::class);

            $fileManipulator->createDerivedFiles($media);

            Media::setEventDispatcher($eventDispatcher);
        }
    }

    public function deleted(Media $media)
    {
        if (in_array(SoftDeletes::class, class_uses_recursive($media))) {
            if (! $media->isForceDeleting()) {
                return;
            }
        }

        /** @var \AlgorizaTeam\MediaLibrary\MediaCollections\Filesystem $filesystem */
        $filesystem = app(Filesystem::class);

        $filesystem->removeAllFiles($media);
    }
}
