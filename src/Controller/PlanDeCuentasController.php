<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PlanDeCuentas Controller
 *
 * @property \App\Model\Table\PlanDeCuentasTable $PlanDeCuentas
 * @method \App\Model\Entity\PlanDeCuenta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlanDeCuentasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $planDeCuentas = $this->paginate($this->PlanDeCuentas);

        $this->set(compact('planDeCuentas'));
    }

    /**
     * View method
     *
     * @param string|null $id Plan De Cuenta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $planDeCuenta = $this->PlanDeCuentas->get($id, [
            'contain' => ['Almacenes'],
        ]);

        $this->set(compact('planDeCuenta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $planDeCuenta = $this->PlanDeCuentas->newEmptyEntity();
        if ($this->request->is('post')) {
            $planDeCuenta = $this->PlanDeCuentas->patchEntity($planDeCuenta, $this->request->getData());
            if ($this->PlanDeCuentas->save($planDeCuenta)) {
                $this->Flash->success(__('The plan de cuenta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plan de cuenta could not be saved. Please, try again.'));
        }
        $this->set(compact('planDeCuenta'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plan De Cuenta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $planDeCuenta = $this->PlanDeCuentas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planDeCuenta = $this->PlanDeCuentas->patchEntity($planDeCuenta, $this->request->getData());
            if ($this->PlanDeCuentas->save($planDeCuenta)) {
                $this->Flash->success(__('The plan de cuenta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plan de cuenta could not be saved. Please, try again.'));
        }
        $this->set(compact('planDeCuenta'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plan De Cuenta id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $planDeCuenta = $this->PlanDeCuentas->get($id);
        if ($this->PlanDeCuentas->delete($planDeCuenta)) {
            $this->Flash->success(__('The plan de cuenta has been deleted.'));
        } else {
            $this->Flash->error(__('The plan de cuenta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
