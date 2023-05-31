<?php
declare(strict_types=1);

namespace App\Trait;

use Cake\Event\EventInterface;
use Inertia\Controller\InertiaResponseTrait;

trait InertiaCustomTrait
{
    use InertiaResponseTrait;

    /**
     * @inheritDoc
     */
    public function beforeRender(EventInterface $event)
    {
        
        if ($this->isErrorStatus() || $this->isFailureStatus()) {
            return null;
        }

        $this->setViewBuilderClass();

        $this->setFlashData();

        $this->setCsrfToken();
        $this->setUser();
    }

 
    private function setUser(): void
    {
        $this->set([
            'auth' => [
                'user' => [
                    'username' => 'Jhon Doe'
                ]
            ]
        ]);
    }

}
