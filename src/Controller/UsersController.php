<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\UsersTable;
use Cake\I18n\FrozenTime;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
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

  public function index(UsersTable $usersTable)
  {
    $search = $this->request->getQuery('search') ?? '';
    $query = $usersTable->find()->select(['id','name'])->where(['name LIKE' => "%{$search}%"]);
  
    $users = $this->paginate($query);

    $paging = $this->Paginator->getPaginator()->getPagingParams()["Users"];
    $this->set([
      'time' => FrozenTime::now()->i18nFormat('HH:mm:ss'), 
      'users' => [
        'data' => $users,
        'paging' => $paging,
      ], 
      'filters' => $search
    ]);
  }

  public function create(UsersTable $usersTable)
  {
    if ($this->request->is('POST')) {
      $data = $this->request->getData();
      $user = $usersTable->newEntity($data);
      if ($usersTable->save($user)) {
        $this->Flash->success('User Saved');
        return $this->redirect('/users');
      } else {
        $this->set([
          'errors' => $user->getErrors()
        ]);
      }
    }
  }

}
