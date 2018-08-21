<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 16-08-2018
 * Time: 22:18
 */

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

//use Doctrine\DOCTRINE-BUNDLE\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}