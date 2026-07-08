@props(['href' => '#', 'icon' => 'bi-circle', 'active' => false])

<li>
    <a href="{{ $href }}" class="et-nav-link {{ $active ? 'active' : '' }}">
        <i class="bi {{ $icon }}"></i>
        <span>{{ $slot }}</span>
    </a>
</li>
