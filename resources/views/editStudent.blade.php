@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')

    <x-page-header
        title="Edit Student"
        subtitle="Update {{ $student->name }}'s information below."
        :crumbs="['Dashboard' => '/', 'Students' => '/students', 'Edit Student' => '']"
    />

    <x-alert />

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="et-card">
                <div class="et-card-header">
                    <h5><i class="bi bi-pencil-fill me-2 text-primary"></i>Student Information</h5>
                </div>
                <div class="et-card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 text-center">
                            <img src="{{ $student->photo_url }}" class="rounded-circle mb-2" width="90" height="90" id="photoPreview">
                            <div>
                                <label class="et-form-label d-block">Profile Photo</label>
                                <input type="file" name="photo" id="photoInput" accept="image/*"
                                       class="form-control @error('photo') is-invalid @enderror" style="max-width:320px;margin:0 auto;">
                                <div class="form-text">Leave empty to keep the current photo.</div>
                                @error('photo')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <x-form-input name="name" label="Student Name" icon="bi-person-fill" :value="$student->name" required />
                            </div>
                            <div class="col-md-6">
                                <x-form-input name="email" label="Email Address" type="email" icon="bi-envelope-fill" :value="$student->email" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <x-form-input name="phone" label="Phone Number" icon="bi-telephone-fill" :value="$student->phone" required />
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="et-form-label">Course <span class="text-danger">*</span></label>
                                    <select name="course_id" class="form-select @error('course_id') is-invalid @enderror">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>
                                                {{ $course->course_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex gap-2">
                            <button class="btn btn-et-primary">
                                <i class="bi bi-check-circle-fill me-1"></i> Update Student
                            </button>
                            <a href="/students" class="btn btn-et-soft">
                                <i class="bi bi-arrow-left me-1"></i> Back to List
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    const photoInput = document.getElementById('photoInput');
    const photoPreview = document.getElementById('photoPreview');

    photoInput && photoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            photoPreview.src = URL.createObjectURL(file);
        }
    });
</script>
@endpush
