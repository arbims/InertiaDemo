<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

/**
 * Home Controller
 *
 */
class HomeController extends AppController
{
  public function index()
  {
    $this->set(['username' => 'elarbi']);
  }

  public function users()
  {
    $this->set(['time' => FrozenTime::now()->i18nFormat('HH:mm:ss')]);
  }

  public function settings()
  {
  }

  public function logout()
  {
    debug($this->request->getData());
    dd('user is logout');
  }
}
