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
<section id="projects">
    <h2>Projects</h2>
    <div id="project-container">
        @include('partials.projects') {{-- This partial should include cards and pagination --}}
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

{{-- Resume Section --}}
<section id="resume">
    <h2>Resume</h2>
    @if ($resume && $resume->file)
    <details>
        <summary>
            {{ $resume->title ?? 'Resume' }}
            <span style="float:right;">📄</span>
        </summary>
        <p>
            <a class="btn btn-primary" href="{{ Storage::disk('public')->url($resume->file) }}" download>
                📥 Download Resume
            </a>
        </p>
    </details>
    @else
    <p>No resume uploaded yet.</p>
    @endif
</section>


{{-- Contact Section --}}
<section id="contact">
    <h2>Contact Me</h2>
    <p class="contact-intro">
        Feel free to reach out through any of the platforms below
    </p>

    <div class="contact-icons">
        @forelse ($contacts as $contact)
        @php
        $url = $contact->url ?? '';
        if ($contact->icon === '📧' && !Str::startsWith($url, 'mailto:')) {
        $url = 'mailto:' . $url;
        } elseif (in_array($contact->icon, ['📞', '📱']) && !Str::startsWith($url, 'tel:')) {
        $url = 'tel:' . $url;
        }
        @endphp
        <a href="{{ $url }}" target="_blank">
            <div>
                {!! $contact->icon !!}<br>
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

@section('scripts')
<script>
    document.addEventListener('click', function(e) {
        const link = e.target.closest('#pagination-wrapper a');
        if (link) {
            e.preventDefault();
            const url = link.getAttribute('href');

            fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('project-container').innerHTML = html;
                    window.scrollTo({
                        top: document.getElementById('projects').offsetTop,
                        behavior: 'smooth'
                    });
                });
        }
    });
</script>
@endsection