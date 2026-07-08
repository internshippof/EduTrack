@props(['title', 'subtitle' => null, 'crumbs' => []])

<div class="et-page-header">
    <div>
        @if(count($crumbs))
            <div class="et-breadcrumb">
                @foreach($crumbs as $label => $url)
                    @if($loop->last)
                        <span class="active">{{ $label }}</span>
                    @else
                        <a href="{{ $url }}">{{ $label }}</a> <i class="bi bi-chevron-right" style="font-size:.6rem;"></i>
                    @endif
                @endforeach
            </div>
        @endif
        <h1>{{ $title }}</h1>
        @if($subtitle)
            <p>{{ $subtitle }}</p>
        @endif
    </div>

    @if(isset($actions))
        <div class="d-flex gap-2">
            {{ $actions }}
        </div>
    @endif
</div>
