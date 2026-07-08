@if(session('success'))
    <div class="et-alert et-alert-success mb-4">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="et-alert et-alert-danger mb-4">
        <i class="bi bi-x-circle-fill"></i>
        <span>{{ session('error') }}</span>
    </div>
@endif

@if ($errors->any())
    <div class="et-alert et-alert-danger mb-4">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <div>
            <div class="fw-bold mb-1">Please fix the following:</div>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
