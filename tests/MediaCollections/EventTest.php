<?php

use AlgorizaTeam\MediaLibrary\MediaCollections\Events\MediaHasBeenAdded;
use Illuminate\Support\Facades\Event;

it('will fire the media added event', function () {
    Event::fake();

    $this->testModel->addMedia($this->getTestJpg())->toMediaCollection();

    Event::assertDispatched(MediaHasBeenAdded::class);
});
