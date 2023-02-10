<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Localidades Controller
 *
 * @property \App\Model\Table\LocalidadesTable $Localidades
 * @method \App\Model\Entity\Localidade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocalidadesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Provincias'],
        ];
        $localidades = $this->paginate($this->Localidades);

        $this->set(compact('localidades'));
    }

    /**
     * View method
     *
     * @param string|null $id Localidade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $localidade = $this->Localidades->get($id, [
            'contain' => ['Provincias', 'Almacenes', 'Clientes'],
        ]);

        $this->set(compact('localidade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $localidade = $this->Localidades->newEmptyEntity();
        if ($this->request->is('post')) {
            $localidade = $this->Localidades->patchEntity($localidade, $this->request->getData());
            if ($this->Localidades->save($localidade)) {
                $this->Flash->success(__('The localidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The localidade could not be saved. Please, try again.'));
        }
        $provincias = $this->Localidades->Provincias->find('list', ['limit' => 200])->all();
        $this->set(compact('localidade', 'provincias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Localidade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $localidade = $this->Localidades->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $localidade = $this->Localidades->patchEntity($localidade, $this->request->getData());
            if ($this->Localidades->save($localidade)) {
                $this->Flash->success(__('The localidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The localidade could not be saved. Please, try again.'));
        }
        $provincias = $this->Localidades->Provincias->find('list', ['limit' => 200])->all();
        $this->set(compact('localidade', 'provincias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Localidade id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $localidade = $this->Localidades->get($id);
        if ($this->Localidades->delete($localidade)) {
            $this->Flash->success(__('The localidade has been deleted.'));
        } else {
            $this->Flash->error(__('The localidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
