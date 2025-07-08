<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SkillRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SkillCrudController
 * @package App\Http\Controllers\Admin
 */
class SkillCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Skill::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/skill');
        CRUD::setEntityNameStrings('Skill', 'Skills');
    }

    protected function setupListOperation()
    {
        CRUD::column('name')->label('Skill Name')->type('text');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(SkillRequest::class);

        CRUD::field('name')
            ->label('Skill Name')
            ->type('text')
            ->attributes(['placeholder' => 'E.g. Laravel, JavaScript, etc.']);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
