<?php
declare(strict_types=1);

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
use Cake\Event\EventInterface;
use Cake\View\JsonView;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('DataTables.DataTables');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function beforeRender(EventInterface $event)
    {
        parent::beforeRender($event);
        $this->viewBuilder()->setHelpers(['Datatables.Datatables']);
    }

    /**
     * Hacemos disponible la información de configuracion a todo el sistema
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->loadModel('Configurations');
        $settings = $this->Configurations->find('all')->first();

        $this->set('system_name', $settings->get('system_name'));
        $this->set('system_abbr', $settings->get('system_abbr'));
        $this->set('organization_name', $settings->get('organization_name'));
        // $this->set('email', $settings->get('email'));
        // $this->set('meta_title', $settings->get('meta_title'));
        // $this->set('meta_keyword', $settings->get('meta_keyword'));
        // $this->set('meta_desc', $settings->get('meta_desc'));
        // $this->set('timezone', $settings->get('timezone'));
        // $this->set('author', $settings->get('author'));
        // $this->set('user_reg', $settings->get('user_reg'));
        $this->set('version', $settings->get('version'));
        $this->set('year', $settings->get('year'));
    }

    public function viewClasses(): array
    {
        return [JsonView::class];
    }
}
