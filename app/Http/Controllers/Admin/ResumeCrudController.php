<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ResumeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ResumeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Resume::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/resume');
        CRUD::setEntityNameStrings('Resume', 'Resumes');
    }

    protected function setupListOperation()
    {
        CRUD::column('title');

        CRUD::addColumn([
            'name' => 'file',
            'label' => 'Download Link',
            'type' => 'model_function',
            'function_name' => 'getFileLink',
            'escaped' => false,
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ResumeRequest::class);

        CRUD::field('title')->type('text')->label('Resume Title');

        CRUD::addField([
            'name' => 'file',
            'label' => 'PDF File',
            'type' => 'upload',
            'upload' => true,
            'withFiles' => [
                'disk' => 'public',
                'temporary' => 10,
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
