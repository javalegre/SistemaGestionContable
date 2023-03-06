<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $almacenes
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
                    <a href="/stocks/almacenes/edit/${data}" type="button" title="Modificar usuario" class="btn btn-xs btn-white btn-orden-trabajo"><i class="fa fa-pencil"></i></a>
                    <a href="/stocks/almacenes/view/${data}" type="button" title="Ver usuario" class="btn btn-xs btn-white"><i class="fa fa-eye"></i></a>
                </div>`;
    }
    return data;
};

/**
 * Devolvemos una fecha en formato Argentina
 * 
 */
function fecha(data, type, full, meta) {
    if (type === 'display' || type === 'filter') {
        return data ? moment.utc(data).format('DD/MM/YYYY') : '';
    }
    return '';
};
</script>

<div class="ibox">
    <div class="ibox-title">
        <h5><?= __('Lista Almacenes') ?></h5>
        <div class="m-t-n-xs pull-right">
            <?= $this->Html->link('<i class="fa fa-plus"></i>', ['controller' => 'Almacenes', 'action' => 'add'], ['type' => 'button', 'title' => __('Crear un nuevo almacen'), 'class'=>'btn btn-monitoreo btn-icon-only btn-circle', 'escape' => false]) ?>
            <?= $this->Html->link('<i class="fa fa-file-excel-o"></i>', ['controller' => 'Almacenes', 'action' => 'excel'], ['type' => 'button', 'title' => __('Exportar a Excel'), 'class'=>'btn btn-monitoreo btn-icon-only btn-circle', 'escape' => false]) ?>
        </div>
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
                            'data' => 'direccion',
                            'title' => __d('stocks', 'Direccion'),
                        ], [
                            'data' => 'codigo_postal',
                            'title' => __d('stocks', 'Codigo Postal'),
                        ], [
                            'data' => 'observaciones',
                            'title' => __d('users', 'Observaciones'),
                        ], [
                            'data' => 'created',
                            'title' => __d('users', 'Creado el'),
                            'render' => $this->DataTables->callback('fecha'),
                            'searchable' => false
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
                echo $this->DataTables->table('almacenes', $options, ['class' => 'table table-bordered table-hover table-striped dataTable']);
            ?>
    </div>
</div>