<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Watson\Rememberable\Rememberable;

abstract class Model extends EloquentModel
{
    use Rememberable;
}
