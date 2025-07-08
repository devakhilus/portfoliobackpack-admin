@extends(backpack_view('blank'))

@section('content')
<h2 class="mb-4">Welcome Admin 👋</h2>

<div class="row">
    <div class="col-md-4 mb-4">
        <a href="{{ backpack_url('about') }}">
            <div class="card bg-info text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">👤 About</h5>
                    <p class="card-text">Edit your bio and introduction.</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a href="{{ backpack_url('skill') }}">
            <div class="card bg-success text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">💡 Skills</h5>
                    <p class="card-text">Manage your tech stack and expertise.</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a href="{{ backpack_url('project') }}">
            <div class="card bg-primary text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📁 Projects</h5>
                    <p class="card-text">Manage your portfolio projects.</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a href="{{ backpack_url('career') }}">
            <div class="card bg-warning text-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">💼 Career</h5>
                    <p class="card-text">Add your job experience and roles.</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a href="{{ backpack_url('contact') }}">
            <div class="card bg-secondary text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📬 Contact</h5>
                    <p class="card-text">Manage your contact details and links.</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a href="{{ backpack_url('setting') }}">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">⚙️ Settings</h5>
                    <p class="card-text">Edit site title, footer, and preferences.</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection