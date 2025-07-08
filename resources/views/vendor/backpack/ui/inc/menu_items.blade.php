{{-- Dashboard --}}
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}
    </a>
</li>

{{-- Custom CRUD Links --}}
<x-backpack::menu-item title="Abouts" icon="la la-user" :link="backpack_url('about')" />
<x-backpack::menu-item title="Skills" icon="la la-lightbulb" :link="backpack_url('skill')" />
<x-backpack::menu-item title="Projects" icon="la la-folder" :link="backpack_url('project')" />
<x-backpack::menu-item title="Careers" icon="la la-briefcase" :link="backpack_url('career')" />
<x-backpack::menu-item title="Contacts" icon="la la-envelope" :link="backpack_url('contact')" />
<x-backpack::menu-item title="Settings" icon="la la-cog" :link="backpack_url('setting')" />