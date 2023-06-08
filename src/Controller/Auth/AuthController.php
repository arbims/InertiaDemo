<?php

declare(strict_types=1);

namespace App\Controller\Auth;

use App\Controller\AppController;

/**
 * Auth Controller
 *
 */
class AuthController extends AppController
{

  /**
   * beforeFilter
   *
   * @param  mixed $event
   * @return void
   */
  public function beforeFilter(\Cake\Event\EventInterface $event)
  {
    $this->Authentication->allowUnauthenticated(['login']);
  }

  public function login()
  {
  }

  public function logout()
  {
    debug($this->request->getData());
    dd('user is logout');
  }
}
