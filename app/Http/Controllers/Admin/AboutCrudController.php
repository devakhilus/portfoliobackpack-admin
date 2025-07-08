<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AboutRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AboutCrudController
 * @package App\Http\Controllers\Admin
 */
class AboutCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\About::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/about');
        CRUD::setEntityNameStrings('About', 'About Section');
    }

    protected function setupListOperation()
    {
        CRUD::column('description')->label('About Me')->limit(150)->type('textarea');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(AboutRequest::class);

        CRUD::field('description')
            ->label('About Me')
            ->type('textarea')
            ->attributes(['rows' => 7, 'placeholder' => 'Write something about yourself...']);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
