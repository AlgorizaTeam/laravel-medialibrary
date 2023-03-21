<?php

namespace AlgorizaTeam\MediaLibrary\Tests\TestSupport\TestModels;

use Illuminate\Database\Eloquent\Model;
use AlgorizaTeam\MediaLibrary\HasMedia;
use AlgorizaTeam\MediaLibrary\InteractsWithMedia;

class TestModelWithoutMediaConversions extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'test_models';
    protected $guarded = [];
    public $timestamps = false;
}
