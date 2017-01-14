<?php

namespace Workshop\Bundle\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\Group as BaseGroup;

/**
 * Groups
 *
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="Workshop\Bundle\BackendBundle\Repository\GroupsRepository")
 */
class Groups extends BaseGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct($name = null, $roles = array())
    {
        parent::__construct($name, $roles);
    }

    public function __toString()
    {
        return $this->getName();
    }
}

