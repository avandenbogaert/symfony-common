<?php

namespace Avdb\SymfonyCommon\EventListener;

use Avdb\SymfonyCommon\Entity\BaseUser;
use Avdb\SymfonyCommon\Helper\PasswordUpdater;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

/**
 * Class UserEntityListener
 *
 * @package Avdb\SymfonyCommon\EventListener
 */
class UserEntityListener
{
    /**
     * @var PasswordUpdater
     */
    private $passwordUpdater;

    /**
     * UserEntityListener constructor.
     *
     * @param PasswordUpdater $passwordUpdater
     */
    public function __construct(PasswordUpdater $passwordUpdater)
    {
        $this->passwordUpdater = $passwordUpdater;
    }

    public function prePersist(BaseUser $user)
    {
        $this->passwordUpdater->updatePassword($user);
    }

    public function preUpdate(BaseUser $user)
    {
        if (null !== $user->getPlainPassword()) {
            $this->passwordUpdater->updatePassword($user);
        }
    }
}
