<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 1/8/19
 * Time: 7:51 PM
 */

namespace App\Repository\Post;


interface PostRepositoryInterface
{
    public function findByUser(string $slug);
}