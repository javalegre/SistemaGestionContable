<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Paises Controller
 *
 * @property \App\Model\Table\PaisesTable $Paises
 * @method \App\Model\Entity\Paise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaisesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $paises = $this->paginate($this->Paises);

        $this->set(compact('paises'));
    }

    /**
     * View method
     *
     * @param string|null $id Paise id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paise = $this->Paises->get($id, [
            'contain' => ['Provincias'],
        ]);

        $this->set(compact('paise'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paise = $this->Paises->newEmptyEntity();
        if ($this->request->is('post')) {
            $paise = $this->Paises->patchEntity($paise, $this->request->getData());
            if ($this->Paises->save($paise)) {
                $this->Flash->success(__('The paise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paise could not be saved. Please, try again.'));
        }
        $this->set(compact('paise'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Paise id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paise = $this->Paises->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paise = $this->Paises->patchEntity($paise, $this->request->getData());
            if ($this->Paises->save($paise)) {
                $this->Flash->success(__('The paise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paise could not be saved. Please, try again.'));
        }
        $this->set(compact('paise'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Paise id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paise = $this->Paises->get($id);
        if ($this->Paises->delete($paise)) {
            $this->Flash->success(__('The paise has been deleted.'));
        } else {
            $this->Flash->error(__('The paise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
