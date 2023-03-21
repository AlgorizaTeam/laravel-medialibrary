<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport\TestModels;

use AlgorizaTeam\MediaLibrary\HasMedia;
use AlgorizaTeam\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;

class TestModelWithoutMediaConversions extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'test_models';
    protected $guarded = [];
    public $timestamps = false;
}
