<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Estabelecimento extends Model
{
    use SpatialTrait;
    use HasFactory;

    protected $spatialFields = ['positions'];
}
