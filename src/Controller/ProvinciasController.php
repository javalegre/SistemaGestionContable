<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Provincias Controller
 *
 * @property \App\Model\Table\ProvinciasTable $Provincias
 * @method \App\Model\Entity\Provincia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProvinciasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Paises'],
        ];
        $provincias = $this->paginate($this->Provincias);

        $this->set(compact('provincias'));
    }

    /**
     * View method
     *
     * @param string|null $id Provincia id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provincia = $this->Provincias->get($id, [
            'contain' => ['Paises', 'Clientes', 'Localidades'],
        ]);

        $this->set(compact('provincia'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $provincia = $this->Provincias->newEmptyEntity();
        if ($this->request->is('post')) {
            $provincia = $this->Provincias->patchEntity($provincia, $this->request->getData());
            if ($this->Provincias->save($provincia)) {
                $this->Flash->success(__('The provincia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provincia could not be saved. Please, try again.'));
        }
        $paises = $this->Provincias->Paises->find('list', ['limit' => 200])->all();
        $this->set(compact('provincia', 'paises'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Provincia id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $provincia = $this->Provincias->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provincia = $this->Provincias->patchEntity($provincia, $this->request->getData());
            if ($this->Provincias->save($provincia)) {
                $this->Flash->success(__('The provincia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provincia could not be saved. Please, try again.'));
        }
        $paises = $this->Provincias->Paises->find('list', ['limit' => 200])->all();
        $this->set(compact('provincia', 'paises'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Provincia id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provincia = $this->Provincias->get($id);
        if ($this->Provincias->delete($provincia)) {
            $this->Flash->success(__('The provincia has been deleted.'));
        } else {
            $this->Flash->error(__('The provincia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
