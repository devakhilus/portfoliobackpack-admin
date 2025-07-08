<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProjectCrudController
 * @package App\Http\Controllers\Admin
 */
class ProjectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Project::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/project');
        CRUD::setEntityNameStrings('Project', 'Projects');
    }

    protected function setupListOperation()
    {
        CRUD::column('title')->label('Project Title');

        // Truncate the description to 100 chars
        CRUD::column('description')->label('Description')->limit(100);

        // Show demo and GitHub URLs as clickable links
        CRUD::addColumn([
            'name' => 'demo_url',
            'label' => 'Live Demo',
            'type' => 'model_function',
            'function_name' => 'getDemoUrlLink',
            'limit' => 255,
            'escaped' => false
        ]);

        CRUD::addColumn([
            'name' => 'github_url',
            'label' => 'GitHub',
            'type' => 'model_function',
            'function_name' => 'getGithubUrlLink',
            'limit' => 255,
            'escaped' => false
        ]);
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProjectRequest::class);

        CRUD::field('title')->label('Project Title')->type('text');
        CRUD::field('description')->type('textarea')->attributes(['rows' => 5]);

        CRUD::field('demo_url')
            ->label('Live Demo URL')
            ->type('url')
            ->attributes(['placeholder' => 'https://your-demo-link.com']);

        CRUD::field('github_url')
            ->label('GitHub URL')
            ->type('url')
            ->attributes(['placeholder' => 'https://github.com/your-repo']);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
