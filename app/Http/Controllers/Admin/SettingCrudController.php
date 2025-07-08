<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SettingCrudController
 * @package App\Http\Controllers\Admin
 */
class SettingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Setting::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/setting');
        CRUD::setEntityNameStrings('Setting', 'Settings');
    }

    protected function setupListOperation()
    {
        CRUD::column('key')->label('Setting Key');
        CRUD::column('value')->label('Value')->limit(80);

        // This fixes the "-" display for type field
        CRUD::addColumn([
            'name' => 'type',
            'label' => 'Input Type',
            'type' => 'select_from_array',
            'options' => [
                'text' => 'Text',
                'textarea' => 'Textarea',
                'boolean' => 'Boolean',
                'number' => 'Number',
                'email' => 'Email',
                'url' => 'URL',
            ],
        ]);
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(SettingRequest::class);

        CRUD::addField([
            'name' => 'key',
            'label' => 'Key',
            'type' => 'text',
            'attributes' => ['placeholder' => 'e.g. site_title, footer_text'],
        ]);

        CRUD::addField([
            'name' => 'type',
            'label' => 'Input Type',
            'type' => 'select_from_array',
            'options' => [
                'text' => 'Text',
                'textarea' => 'Textarea',
                'boolean' => 'Boolean',
                'number' => 'Number',
                'email' => 'Email',
                'url' => 'URL',
            ],
            'allows_null' => false,
            'default' => 'text',
        ]);

        // Default to 'text' or use current entry's 'type'
        $type = $this->crud->getCurrentEntry()?->type ?? 'text';

        CRUD::addField([
            'name' => 'value',
            'label' => 'Value',
            'type' => $type,
        ]);
    }



    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
