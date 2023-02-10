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
<script>

    /**
     * Colocamos la botonera, con las opciones de Editar y Ver solamente
     * 
     */
    function botones(data, type, full, meta) {
        if (type === 'display' || type === 'filter'){
            return `<div class="btn-group">
                        <a href="/users/edit/${data}" type="button" title="Modificar usuario" class="btn btn-xs btn-white btn-orden-trabajo"><i class="fa fa-pencil"></i></a>
                        <a href="/users/view/${data}" type="button" title="Ver usuario" class="btn btn-xs btn-white"><i class="fa fa-eye"></i></a>
                    </div>`;
        }
        return data;
    };

    /**
     * Devolvemos una fecha en formato Argentina
     * 
     */
    function fecha(data, type, full, meta) {
        return data ? moment.utc(data).format('DD/MM/YYYY') : '';
    };
</script>

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><?= __('Lista Usuarios') ?></h5>
    </div>
    <div class="ibox-content">
            <?php
                $options = [
                    'ajax' => [
                        'url' => $this->Url->build() // current controller, action, params
                    ],
                    'data' => $data,
                    'autoWidth' => false,
                    'dom' => '<"row"<"col-sm-6 no-padding"f><"col-sm-6 no-padding botones-tabla-top-right">><"row"<"col-sm-12 no-margin no-padding"tr>><"row"<"col-sm-6"i><"col-sm-6"p>>',
                    'stateSave' => true,
                    'deferLoading' => $data->count(), // https://datatables.net/reference/option/deferLoading
                    'columns' => [
                        [
                            'data' => 'nombre',
                            'title' => __d('users', 'nombre'),
                        ], [
                            'data' => 'username',
                            'title' => __d('users', 'Username'),
                        ], [
                            'data' => 'email',
                            'title' => __d('users', 'E-mail'),
                        ], [
                            'data' => 'apodo',
                            'title' => __d('users', 'Apodo'),
                        ], [
                            'data' => 'observaciones',
                            'title' => __d('users', 'Observaciones'),
                        ], [
                            'data' => 'created',
                            'title' => __d('users', 'Creado el'),
                            'render' => $this->DataTables->callback('fecha')
                        ], [
                            'data' => 'deleted',
                            'title' => __d('users', 'Fecha baja'),
                            'render' => $this->DataTables->callback('fecha')
                        ], [
                            'data' => 'id',
                            'orderable' => false,
                            'className' => 'text-center cell-double-action no-custo no-edit',
                            'render' => $this->DataTables->callback('botones')
                        ],
                    ],
                ];
                echo $this->DataTables->table('users', $options, ['class' => 'table table-bordered table-hover table-striped dataTable']);
            ?>
    </div>
</div>