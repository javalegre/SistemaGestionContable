<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Inicios Controller
 *
 * @method \App\Model\Entity\Inicio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IniciosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function inicio()
    {
        $inicios = 'Inicio';

        $this->set(compact('inicios'));
    }
}
