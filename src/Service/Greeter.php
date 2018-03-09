<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Component\Translation\TranslatorInterface;

class Greeter
{
    /**
     * @var TranslatorInterface
     */
  private $tanslator;

    /**
     * Greeter constructor.
     * @param TranslatorInterface $translator
     */
  public function __construct(TranslatorInterface $translator)
  {
      $this->translator = $translator;
  }

  public function greet(User $user): string
  {
      $name = $user->getWorker() ?
          $user->getWorker()->getLastName().' '.$user->getWorker()->getFirstName() :
          $this->translator->trans('main.index.welcomeName', [], 'main');
      return $this->translator->trans('main.index.welcome', ['%name%'=> $name], 'main');
  }
}
