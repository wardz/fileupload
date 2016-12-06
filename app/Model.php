<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Watson\Rememberable\Rememberable;

// Create new model so we won't have to set "use Rememberable;"
// everytime extending EloquentModel
abstract class Model extends EloquentModel
{
    use Rememberable;
}
