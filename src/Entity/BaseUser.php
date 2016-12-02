<?php
namespace Avdb\SymfonyCommon\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 *
 * @package Avdb\SymfonyCommon\Entity\User
 * @ORM\MappedSuperclass()
 * @ORM\EntityListeners({"Avdb\SymfonyCommon\EventListener\UserEntityListener"})
 */
abstract class BaseUser implements UserInterface
{
    use DoctrineIdentifiable;
    
    /**
     * @var string
     * @ORM\Column(type="string", nullable=false, unique=true)
     */
    protected $username;

    /**
     * @var array
     * @ORM\Column(type="json_array", nullable=false)
     */
    protected $roles = [];

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $password;

    /**
     * @var string
     */
    protected $plainPassword;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $salt;

    /**
     * @return void
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

}
