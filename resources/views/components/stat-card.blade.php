@props(['icon' => 'bi-graph-up', 'label', 'value', 'color' => '#4f46e5'])

<div class="et-stat-card">
    <div class="et-stat-icon" style="background:{{ $color }};">
        <i class="bi {{ $icon }}"></i>
    </div>
    <div>
        <div class="et-stat-value">{{ $value }}</div>
        <div class="et-stat-label">{{ $label }}</div>
    </div>
</div>
