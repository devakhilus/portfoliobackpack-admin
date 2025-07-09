<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ContactCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Contact::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/contact');
        CRUD::setEntityNameStrings('Contact Method', 'Contact Info');
    }

    protected function setupListOperation()
    {
        CRUD::column('type')->label('Platform');
        CRUD::column('label')->label('Label');
        CRUD::column('value')->label('Display Text');
        CRUD::column('url')->label('Link')->limit(80);
        CRUD::column('icon')->label('Icon')->type('text');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ContactRequest::class);

        CRUD::field('type')
            ->label('Platform')
            ->type('text')
            ->attributes(['placeholder' => 'e.g. Email, GitHub, LinkedIn']);

        CRUD::field('label')
            ->label('Label')
            ->type('text')
            ->attributes(['placeholder' => 'Optional label or name']);

        CRUD::field('value')
            ->label('Display Text')
            ->type('text')
            ->attributes(['placeholder' => 'e.g. you@example.com, /yourusername']);

        CRUD::field('url')
            ->label('Link')
            ->type('url')
            ->attributes(['placeholder' => 'e.g. mailto:you@example.com or https://github.com/yourusername'])
            ->hint('Leave blank for Phone or Email — links like "tel:" or "mailto:" will be generated automatically.');

        CRUD::addField([
            'name' => 'icon',
            'label' => 'Icon Emoji',
            'type' => 'select_from_array',
            'options' => [
                '📧' => '📧 Email',
                '📱' => '📱 Mobile',
                '🐱' => '🐱 GitHub',
                '🔗' => '🔗 Link',
                '💼' => '💼 LinkedIn',
                '📞' => '📞 Phone',
                '🌐' => '🌐 Website',
            ],
            'allows_null' => false,
            'default' => '📧',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
