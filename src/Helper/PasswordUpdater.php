<?php

namespace Avdb\SymfonyCommon\Helper;

use Avdb\SymfonyCommon\Entity\BaseUser;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class PasswordUpdater
{
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * PasswordUpdater constructor.
     *
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    /**
     * @param BaseUser $user
     */
    public function updatePassword(BaseUser $user)
    {
        $encoder = $this->encoderFactory->getEncoder($user);
        $user->setSalt(substr(base64_encode(microtime()), 0, 25));
        $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());

        $user->setPassword($password);
        $user->eraseCredentials();
    }
}
