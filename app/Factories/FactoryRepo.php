<?php

namespace App\Factories;
use App\Repositories;
use Exception;

class FactoryRepo{
    private static $repos = [
        'CategoryRepository' => 'App\Repositories\Category\CategoryRepository',
        'UserAuthRepository' => 'App\Repositories\User\UserAuthRepository',
        'UserRepository' => 'App\Repositories\User\UserRepository',
        'RolesRepository' => 'App\Repositories\Roles\RolesRepository',
        'RoutesRepository' => 'App\Repositories\Routes\RoutesRepository',
        'PermissionsRepository' => 'App\Repositories\Permissions\PermissionsRepository',
    ];
    private static $instance;
    private function __construct(){

    }
    public static function GetInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public static function GetRepoInstance($RepoName){
        try{
            $factory = self::$repos[$RepoName];
            $RepoInstance = $factory::GetInstance();
            return $RepoInstance;
        }catch(Exception $e){
            return false;
        }
    }
}
