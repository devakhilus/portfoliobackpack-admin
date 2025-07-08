<header>
    <button class="toggle-btn" onclick="toggleTheme()">🌙 Toggle</button>
    <h1>{{ $settings['site_name'] ?? 'Your Name' }}</h1>
    <p class="slogan desktop">{{ $settings['site_slogan'] ?? 'Web Developer•Programmer•Tech Enthusiast' }}</p>
    <p class="slogan mobile">{{ $settings['site_slogan_mobile'] ?? 'Web Dev•Programmer•Tech Enthusiast' }}</p>
</header>