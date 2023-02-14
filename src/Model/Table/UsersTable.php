<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;

/**
 * Users Model
 *
 * @property \App\Model\Table\GroupsTable&\Cake\ORM\Association\BelongsTo $Groups
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    use SoftDeleteTrait;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 255)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmptyString('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->notEmptyString('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('apodo')
            ->maxLength('apodo', 50)
            ->notEmptyString('apodo');

        $validator
            ->allowEmptyFile('ruta_imagen')
            ->add('ruta_imagen', [
                'mimeType' => [
                     'rule' => ['mimeType',['image/jpg','image/png','image/jpeg','application/pdf']],
                     'message' => 'File type must be .jpg,.jpeg,.png,.pdf',
                ],
                'fileSize' => [
                     'rule' => ['fileSize','<', '2MB'],
                     'message' => 'File size must be less than 2MB',
                ]
            ]);

        $validator
            ->scalar('observaciones')
            ->allowEmptyString('observaciones');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }

     /**
     * Exportar Users a Excel
     * 
     * @return type URL del archivo de excel generado
     */
    public function GenerarExcel($system_name = null)
    {
        
        $usuarios = $this->find('all', [
            'withDeleted' => 'withDeleted'
        ]);
        
        $documento = new Spreadsheet();
        
        $sheet = $documento->getActiveSheet();
        $sheet->setTitle('Users');
        
        //  /* Creamos el encabezado y le damos estilos */
        // $sheet->mergeCells('A1:A3'); /* Inicio Logo  */
        // $drawing = new Drawing();
        // $drawing->setName('Logo');
        // $drawing->setDescription('Users');
        // $drawing->setPath(WWW_ROOT . 'img' . DS . 'logo_elagronomo_print.png');
        // $drawing->setCoordinates('A1');
        // $drawing->setHeight(58);
        // $drawing->setWorksheet($documento->getActiveSheet());

        /* Ahora el nombre del sistema */
        $sheet->mergeCells('B1:G3');
        $sheet->setCellValue('B1', $system_name);
        $styleArray = ['font' => ['size' => 36], 'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT]];
        $sheet->getStyle('B1:D3')->applyFromArray($styleArray);

        /* Ahora pongo todo el encabezado en fondo blanco */
        $styleArray = ['fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['argb' => 'FFFFFF']]];
        $sheet->getStyle('A1:W3')->applyFromArray($styleArray);
       
        /* Le agrego estilos al color del encabezado de las columnas */
        $styleArray = [
            'font' => ['size' => 11, 'color' => ['startColor' => ['argb' => '94995F']]],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            'borders' => ['outline' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
            'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['argb' => 'D8E4BC']]
        ];
        $sheet->getStyle('A4:W4')->applyFromArray($styleArray);        
        
        $linea = 5;
        
        /* Escribo los encabezados */
        $sheet->setCellValue('A4', 'Id');
        $sheet->setCellValue('B4', 'Nombre');
        $sheet->setCellValue('C4', 'Username');
        $sheet->setCellValue('D4', 'E-Mail');
        $sheet->setCellValue('E4', 'apodo');
        $sheet->setCellValue('F4', 'avatar');
        $sheet->setCellValue('G4', 'Observaciones');
        $sheet->setCellValue('H4', 'Creado el');
        $sheet->setCellValue('I4', 'Fecha baja');

        foreach ($usuarios as $usuario) {
            $sheet->setCellValueByColumnAndRow(1, $linea, $usuario->id);
            $sheet->setCellValueByColumnAndRow(2, $linea, $usuario->nombre);
            $sheet->setCellValueByColumnAndRow(3, $linea, $usuario->username);
            $sheet->setCellValueByColumnAndRow(4, $linea, $usuario->email);
            $sheet->setCellValueByColumnAndRow(5, $linea, $usuario->apodo ? $usuario->apodo : '');
            $sheet->setCellValueByColumnAndRow(6, $linea, $usuario->ruta_imagen ? $usuario->ruta_imagen : '');
            $sheet->setCellValueByColumnAndRow(7, $linea, $usuario->observaciones);
            $sheet->setCellValueByColumnAndRow(8, $linea, $usuario->created);
            $sheet->setCellValueByColumnAndRow(9, $linea, $usuario->deleted);
                        
            $linea++;
        }

        foreach (range('B', 'U') as $columnID) {
            //autodimensionar las columnas
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
        
        $time = Time::now();
        $fecha_actual = $time->i18nFormat('yyyy_MM_dd_HHmm');

        $nombreDelDocumento = 'usuarios_'. $fecha_actual .'.xlsx';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
        header('Cache-Control: max-age=0');
        
        $writer = IOFactory::createWriter($documento, 'Xlsx', 'Excel2007');
        ob_end_clean();
        $writer->save('php://output');
        exit();
    }
}
