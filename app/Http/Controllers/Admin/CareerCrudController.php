<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CareerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CareerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Career::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/career');
        CRUD::setEntityNameStrings('career entry', 'career timeline');
    }

    protected function setupListOperation()
    {
        CRUD::column('job_title')->label('Job Title');
        CRUD::column('company')->label('Company');
        CRUD::column('duration')->label('Duration');
        CRUD::column('description')->label('Summary')->limit(100);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CareerRequest::class);

        CRUD::field('job_title')->label('Job Title')->type('text');
        CRUD::field('company')->label('Company')->type('text');
        CRUD::field('duration')->label('Duration')->type('text')->hint('e.g. 2023 – Present');
        CRUD::field('description')->label('Summary')->type('textarea')->attributes(['rows' => 4]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
