<?php
namespace App\Shell;

use Cake\Console\Shell;

class AdminShell extends Shell
{
	public function initialize()
	{
		parent::initialize();
		$this->loadModel('Users');
	}
	
	public function main()
	{
		$user = $this->Users->newEntity();
		$data = [
				'role' => 'a',
				'first_name' => 'Administrator',
				'last_name' => 'Administrator',
				'username' => 'admin',
				'password' => 'password'
		];
		$user = $this->Users->patchEntity($user, $data);
		if ($this->Users->save($user))
			$this->out('admin account created');
		else
			$this->out('error: could not create admin account');
	}
	
	public function reset()
	{
		$user = $this->Users->findByUsername('admin')->first();
		$user = $this->Users->patchEntity($user, ['password' => 'password']);
		if ($this->Users->save($user))
			$this->out('admin password reset');
		else
			$this->out('error: could not reset admin password');
	}
}