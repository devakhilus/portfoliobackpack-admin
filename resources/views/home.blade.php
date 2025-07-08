@extends('layouts.app')

@section('content')
@php use Illuminate\Support\Str; @endphp

{{-- About Section --}}
<section id="about">
    <h2>About Me</h2>
    <p>{{ $about->description ?? $settings['about'] ?? "Hello! I'm a passionate developer focused on building clean, user-friendly websites." }}</p>
</section>

{{-- Skills Section --}}
<section id="skills">
    <h2>Skills</h2>
    <div class="skills-list">
        @forelse ($skills as $skill)
        <div class="skill">{{ $skill->name }}</div>
        @empty
        <div>No skills added yet.</div>
        @endforelse
    </div>
</section>

{{-- Projects Section --}}
{{-- Projects Section --}}
{{-- Projects Section --}}
<section id="projects">
    <h2>Projects</h2>
    <div class="projects-container">
        @forelse ($projects as $project)
        <div class="card">
            <h3>{{ $project->title }}</h3>
            <p style="color: var(--subtext);">{{ \Illuminate\Support\Str::limit($project->description, 100) }}</p>
            <p>
                @if ($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank">Live Demo</a>
                @endif

                @if ($project->demo_url && $project->github_url)
                |
                @endif

                @if ($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank">GitHub</a>
                @endif
            </p>
        </div>
        @empty
        <p>No projects to show yet.</p>
        @endforelse
    </div>
</section>



{{-- Career Section --}}
<section id="career">
    <h2>Career</h2>
    @forelse ($careers as $career)
    <details>
        <summary>
            {{ $career->title }} – {{ $career->company }}
            <span style="float:right;">{{ $career->duration }}</span>
        </summary>
        <p>{{ $career->description }}</p>
    </details>
    @empty
    <p>No career entries found.</p>
    @endforelse
</section>

{{-- Contact Section --}}
<section id="contact">
    <h2>Contact Me</h2>
    <p class="contact-intro">
        Feel free to reach out through any of the platforms below
    </p>

    <div class="contact-icons">
        @forelse ($contacts as $contact)
        <a href="{{ $contact->url }}" target="_blank">
            <div>{!! $contact->icon !!}<br>
                <strong>{{ $contact->type }}</strong><br>
                {{ $contact->value }}
            </div>
        </a>
        @empty
        <p>No contact information available.</p>
        @endforelse
    </div>
</section>
@endsection