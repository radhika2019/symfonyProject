<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 16-08-2018
 * Time: 22:18
 */

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
class User extends BaseUser
{
    protected $id;
}