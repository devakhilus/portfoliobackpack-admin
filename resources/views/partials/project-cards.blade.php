@foreach ($projects as $project)
<div class="card">
    <h3>{{ $project->title }}</h3>
    <p style="color: var(--subtext);">{{ Str::limit($project->description, 100) }}</p>
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
@endforeach