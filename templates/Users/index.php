<?php
/**
 * Users: index
 * 
 * Mostramos un listado de los usuarios usando un datatable server-side
 * 
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><?= __('Lista Usuarios') ?></h5>
    </div>
    <div class="ibox-content">
        <div class="table-responsive">
            <?php
                $options = [
                    'ajax' => [
                        'url' => $this->Url->build() // current controller, action, params
                    ],
                    'data' => $data,
                    'deferLoading' => $data->count(), // https://datatables.net/reference/option/deferLoading
                    'columns' => [
                        [
                            'data' => 'nombre',
                            'title' => __('Metros'),
                        ]
                    ],
                ];
                echo $this->DataTables->table('users', $options, ['class' => 'table table-bordered table-hover table-striped dataTable']);
            ?>
        </div>
    </div>
</div>