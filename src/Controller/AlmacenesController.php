<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Almacenes Controller
 *
 * @property \App\Model\Table\AlmacenesTable $Almacenes
 * @method \App\Model\Entity\Almacene[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlmacenesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Localidades', 'PlanDeCuentas'],
        ];
        $almacenes = $this->paginate($this->Almacenes);

        $this->set(compact('almacenes'));
    }

    /**
     * View method
     *
     * @param string|null $id Almacene id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $almacene = $this->Almacenes->get($id, [
            'contain' => ['Localidades', 'PlanDeCuentas'],
        ]);

        $this->set(compact('almacene'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $almacene = $this->Almacenes->newEmptyEntity();
        if ($this->request->is('post')) {
            $almacene = $this->Almacenes->patchEntity($almacene, $this->request->getData());
            if ($this->Almacenes->save($almacene)) {
                $this->Flash->success(__('The almacene has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The almacene could not be saved. Please, try again.'));
        }
        $localidades = $this->Almacenes->Localidades->find('list', ['limit' => 200])->all();
        $planDeCuentas = $this->Almacenes->PlanDeCuentas->find('list', ['limit' => 200])->all();
        $this->set(compact('almacene', 'localidades', 'planDeCuentas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Almacene id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $almacene = $this->Almacenes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $almacene = $this->Almacenes->patchEntity($almacene, $this->request->getData());
            if ($this->Almacenes->save($almacene)) {
                $this->Flash->success(__('The almacene has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The almacene could not be saved. Please, try again.'));
        }
        $localidades = $this->Almacenes->Localidades->find('list', ['limit' => 200])->all();
        $planDeCuentas = $this->Almacenes->PlanDeCuentas->find('list', ['limit' => 200])->all();
        $this->set(compact('almacene', 'localidades', 'planDeCuentas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Almacene id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $almacene = $this->Almacenes->get($id);
        if ($this->Almacenes->delete($almacene)) {
            $this->Flash->success(__('The almacene has been deleted.'));
        } else {
            $this->Flash->error(__('The almacene could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
