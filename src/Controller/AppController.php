<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

use Acl\Controller\Component\AclComponent;
use Cake\Controller\ComponentRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = [
        'Acl' => [
            'className' => 'Acl.Acl'
        ]
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */

    public static $sessionUserFullName = null;

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => [
                'Acl.Actions' => ['actionPath' => 'controllers/']
            ],
            'loginAction' => [
                'prefix' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => [
                'plugin' => false,
                'controller' => 'Pages',
                'action' => 'dashboard',
                'prefix' => false
            ],
            'authError' => 'You are not currently authorized to view that area',
            'storage' => 'Session'
        ]);
        $this->loadComponent('UserAction', [
            'user_id' => $this->Auth->user('id'),
            'username' => $this->Auth->user('username'),
            'controller' => $this->request->params['controller'],
            'controller_action' => $this->request->params['action'],
        ]);

        $this->Auth->config('authenticate', [
            'Ldap'
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        $this->loadComponent('Security');
        $this->loadComponent('Csrf');

        self::$sessionUserFullName = $this->Auth->user('full_name');

        //////////////////////////////////////////////////////////////////
        // This bypasses all authentication and disables the ACL checks //
        //////////////////////////////////////////////////////////////////
        $this->Auth->allow();

    }

    public function beforeFilter(Event $event)
    {
        $this->loadModel('People');
        $this->loadModel('Menus');
        $this->loadModel('Pages');

        $controller = $this->request->params['controller'];

        // Info about the user
        $this->set('role', $this->Auth->user('role'));
        $this->set('authUser', $this->Auth->user());

        if($this->Auth->user()) {
            $currentUser = $this->People->get($this->Auth->user('person_id'), [
                'contain' => [],
            ]);
            Configure::write('Config.timezone', $currentUser->default_timezone);
            // Configure::write('Config.timezone', $this->Auth->user('timezone'));

            $this->set('currentUser', $currentUser);
        } else {
            $this->set('currentUser', null);
        }

        if (!$this->request->is('ajax')) {
            // Navigation
            // Only compile if there is a logged in user!
            if ($this->Auth->user()) {

                // Do we have a prefix in the URL?
                if (isset($this->request->params['prefix'])) {
                    $prefix = $this->request->params['prefix'];

                    $currentMenu = $this->Menus->find('all', [
                        'conditions' => [
                            'Menus.controller' => $controller,
                            'Menus.prefix' => $prefix,
                            'active' => 1,
                        ],
                    ])->first();

                // Are we inside a plugin?
                } elseif (isset($this->request->params['plugin'])) {
                    $plugin = $this->request->params['plugin'];

                    $currentMenu = $this->Menus->find('all', [
                        'conditions' => [
                            'Menus.controller' => $plugin,
                            'active' => 1,
                        ],
                    ])->first();

                // Are we in the pages controller?
                } elseif (stripos($this->request->getRequestTarget(), '/pages/') !== false) {
                    $rTarget = explode('/', $this->request->getRequestTarget());

                    $currentMenu = $this->Menus->find('all', [
                        'conditions' => [
                            'Menus.controller' => 'pages',
                            'Menus.controller_action' => $rTarget[2],
                            'active' => 1,
                        ],
                    ])->first();

                // We are not in a prefix or a plugin, but a standard controller
                } else {
                    $prefix = false;

                    $currentMenu = $this->Menus->find('all', [
                        'conditions' => [
                            'Menus.controller' => $controller,
                            'active' => 1,
                        ],
                    ])->first();
                }

                $menus = $this->Menus->find('all', [
                    'conditions' => ['active' => 1, 'visible' => 1],
                    'order' => ['Menus.sort_order' => 'ASC'],
                    'contain' => ['Pages'],
                ]);


                // Complile the list of nav menus that the user is currently
                // authorized to access

                $navMenus = [];
                $navPages = [];

                foreach ($menus as $menu) {

                    $this->loadModel('Users');
                    $user = $this->Users->get($this->Auth->user('id'));

                    if ($menu->controller == 'pages' && $menu->prefix == '') {
                        $mAllowed = true;
                    } else {

                        $mAllowed = $this->aclCheck($menu);
                    }

                    if ($mAllowed) {
                        $navMenus[] = $menu;
                    }
                }

                $pages = $this->Pages->find('all', [
                    'conditions' => [
                        'Pages.menu_id' => $currentMenu->id,
                        'active' => 1,
                    ],
                    'order' => ['Pages.sort_order' => 'ASC'],
                ]);

                // Compile a list of the pages for the current menu that the
                // user is authorized to access
                foreach ($pages as $page) {

                    $pAllowed = $this->aclCheck($page);

                    if ($pAllowed) {
                        $navPages[] = $page;
                    }
                }

            } else {
                $navMenus = [];
                $navPages = [];
            }

            // $navMenus = [];
            // $navPages = [];

            $this->set('navMenus', $navMenus);
            $this->set('navPages', $navPages);
            $this->set('params', $this->request->params);
            $this->set('acl', $this->Acl);
        }
    }

    private function aclCheck($entity)
    {
        $aro = [
            'model' => 'Users',
            'foreign_key' => $this->Auth->user('id'),
        ];

        $aco = $entity->controller.'/'.$entity->controller_action;

        // Custom check for ACL entity option
        if ($entity->controller === 'AclManager') {
            $aco = 'Acl/'.$entity->controller_action;
        }

        return $this->Acl->check($aro, $aco);
    }

}
