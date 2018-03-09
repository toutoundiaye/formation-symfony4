<?php

namespace App\Dawan\MenuBundle\Service;

use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class MenuManager
{
    /**
     * @var AuthorizationCheckerInterface
     */
    private $checker;

    /**
     * WorkerType constructor.
     * @param AuthorizationCheckerInterface $checker
     */
    public function __construct(AuthorizationCheckerInterface $checker)
    {
        $this->checker = $checker;
    }

    public function navbarLinks(): array
    {
        $links =  [
            'app_main_index' => 'main.index.menuAccueil',
            'app_worker_index' => 'main.index.menuWorker',
            'app_job_index' => 'main.index.menuJob',
            'app_customer_index' => 'main.index.menuClient',
        ];

        if ($this->checker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $links['app_security_logout'] = 'main.security.action.logout';
        } else{
            $links['app_security_login'] = 'main.security.action.login';
        }

        return $links;
    }
}
