<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResourse;
use App\Models\User;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class IndexController extends Controller
{
    public function All()
    {
        return new UserCollection(User::all());
    }

    public function Index()
    {
        return new UserResourse(resource: Cache::remember('users', 60*60*24,
            function ()
            {
                return (User::orderByDesc('name')->first());
            }
        ));
    }
}
