<?php
declare(strict_types=1);

use Faker\Factory;
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * UsersSeeder seed.
 */
class UsersSeederSeed extends AbstractSeed
{
  /**
   * Run Method.
   *
   * Write your database seeder using this method.
   *
   * More information on writing seeds is available here:
   * https://book.cakephp.org/phinx/0/en/seeding.html
   *
   * @return void
   */
  public function run(): void
  {
    $faker = Factory::create();    
    $table = $this->table('users');
    for ($i = 0; $i < 50; $i++) {
      $data = [
        'name' => $faker->name(),
        'email' => $faker->email(),
        'password' => (new DefaultPasswordHasher())->hash($faker->password()),
        'created' => date('Y-m-d H:i:s'),
        'modified' => date('Y-m-d H:i:s')
      ];
      $table->insert($data)->save();
    }
  }
}

