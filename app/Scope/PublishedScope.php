<?php
namespace App\Scope;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;



class PublishedScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('status','=','published');

    }


}
