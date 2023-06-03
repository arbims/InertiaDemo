<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\UsersTable;
use Cake\Database\Expression\QueryExpression;
use Cake\Database\Query;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

/**
 * Home Controller
 *
 */
class HomeController extends AppController
{
  public $paginate = [
    'limit' => 5,
  ];
  public function initialize(): void
  {
      parent::initialize();
      $this->loadComponent('Paginator');
      $this->loadComponent('RequestHandler'); 
  }

  public function index()
  {
    $this->set(['username' => 'elarbi']);
  }

  public function users(UsersTable $usersTable)
  {
    $search = $this->request->getQuery('search') ?? '';
    $query = $usersTable->find()->select(['id','name'])->where(['name LIKE' => "%{$search}%"]);
  
    $users = $this->paginate($query);

    $paging = $this->Paginator->getPaginator()->getPagingParams()["Users"];
    $this->set(['time' => FrozenTime::now()->i18nFormat('HH:mm:ss'), 
    'users' => [
      'data' => $users,
      'paging' => $paging,
    ], 
    'filters' => $search]);
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
