<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize'=> 'Controller',
            'authError' => false,
            'unauthorizedRedirect' => ['controller' => 'Pages', 'action' => 'display', 'home'],
            'loginRedirect' => ['controller' => 'Pages', 'action' => 'display', 'home'],
            ['className' => 'Storage', 'key' => 'Auth.User']
        ]);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    public function beforeFilter(Event $event) {       
        $user = [
            'user_id' => $this->Auth->user('id'),
            'user_username' => $this->Auth->user('username'),
            'user_fullname' => "{$this->Auth->user('first_name')} {$this->Auth->user('last_name')}",
            'user_role' => $this->Auth->user('role')
        ];
        $this->set($user);        
        parent::beforeFilter($event);
    }

    public function getManual() {
        $this->response->file(ROOT . DS . 'docs/manual.pdf', ['download' => true]);
        return $this->response;
    }
    
    public function isAuthorized($user = null) { 
    	
        if ($user['role'] === 'a') // only administrators have access (by default)
            return true;
        else {
        	$this->Flash->error(__('Unauthorized access.'));
        	return false;
        }  
    }
}
