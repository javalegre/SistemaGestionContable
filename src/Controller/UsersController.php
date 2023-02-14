<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $columns = [
            [ 
                'field' => 'id',
                'data' => 'id',
                'visible' => false,
                'searchable' => false
            ], [
                'field' => 'nombre',
                'data' => 'nombre'
            ], [
                'field' => 'username',
                'data' => 'username'
            ], [
                'field' => 'email',
                'data' => 'email'
            ], [
                'field' => 'apodo',
                'data' => 'apodo'
            ], [
                'field' => 'observaciones',
                'data' => 'observaciones'
                ]
          ];

            $this->set('columns', $columns);

            $data = $this->DataTables->find('Users', 'all', [
                'order' => ['created' => 'asc']
                    ], $columns);

            $this->set('data', $data);


//             $users = $this->Users->find('all');

//             // Set the view vars that have to be serialized.
//             $this->set(compact('users'));
// //            $data = serialize($users);

//             // Specify which view vars JsonView should serialize.
//             //$this->viewBuilder()->setClassName("Json");
             $this->viewBuilder()->setOption('serialize', ['data']);




            // $viewvars = $this->viewBuilder()->getVar('_serialize');

            // // // $this->set('_serialize', array_merge($viewvars, ['data']));

            // // // // Set the view vars that have to be serialized.
            // // // $this->set('articles', $this->paginate());
            // // // // Specify which view vars JsonView should serialize.
            //  $this->viewBuilder()->setOption('serialize', array_merge($viewvars, ['data']));

            //  $this->set('users', $users);
            //  // Specify which view vars JsonView should serialize.
            //  $this->viewBuilder()->setOption('serialize', 'users');
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     * 
     * Permite subir una imagen como avatar y lo guarda en la carpeta img/users
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {

            /* ************************************************************/
            /* Inicio del proceso de obtener la imagen del usuario        */
            /* ************************************************************/
            $imagen = $this->request->getData('image_file');
            $nombre_imagen = $imagen->getClientFilename();

            if (!is_dir(WWW_ROOT.'img'.DS.'users')) {
                mdkir(WWW_ROOT.'img'.DS.'users', 0775);
            }

            if ($imagen) {
                $targetPath = WWW_ROOT.'img'.DS.'users'.DS.$nombre_imagen;
                $imagen->moveTo($targetPath);

                $user->ruta_imagen = $nombre_imagen;
            }
            /* ************************************************************/

            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }

        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login
     * 
     * Permite loguearse en el sistema al usuario 
     * 
     * En caso de no acceder correctamente, se envia mensaje de error.
     * 
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);

        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            return $this->redirect(['controller' => 'Inicios', 'action' => 'inicio']);
        }
        
        if ($this->request->is('post') && !$result->isValid()) {
             $this->Flash->error('Invalid username or password');
        }

        $this->viewBuilder()->setLayout('login');
    }

    /**
     * Permite logout del usuario y redirigimos nuevamente al login
     */
    public function logout()
    {
        $this->Authentication->logout();

        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * Si no está logueado, permitimos ver la accion para que se pueda loguear
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login']);
    }

    /**
     * Datatable
     * 
     * Muestra los datos en server-side del datatable
     */
    public function datatable()
    {
        $columns = [
                    [ 
                        'field' => 'id',
                        'data' => 'id',
                        'visible' => false,
                        'searchable' => false
                    ], [
                        'field' => 'nombre',
                        'data' => 'nombre'
                    ], [
                        'field' => 'username',
                        'data' => 'username'
                    ], [
                        'field' => 'email',
                        'data' => 'email'
                    ], [
                        'field' => 'apodo',
                        'data' => 'apodo'
                    ], [
                        'field' => 'observaciones',
                        'data' => 'observaciones'
                        ]
                  ];

        $data = $this->DataTables->find('Users', 'all', [
            'order' => ['created' => 'asc']
                ], $columns);

        /* ************************************************************ */
        /* Datatables Server Side Processing                            */
        /* ************************************************************ */
        $this->set('columns', $columns);
        $this->set('data', $data);
        $this->set('_serialize', array_merge($this->viewBuilder()->getVar('_serialize'), ['data']));
        
    }
}
