@extends('layouts.admin')

@section('content')

<div class="top_content d-flex">
    <h1 class="py-3">Edit Project {{($project->title)}}</h1>

</div>

@include('partials.errors')
<form action="{{route('admin.projects.update', $project->slug)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class=" mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            placeholder="" aria-describedby="helpId" value="{{ old('title', $project->title) }}">
        <small id="helpId" class="text-muted">Insert title, max 100 characters, required field</small>
    </div>
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder=""
            aria-describedby="helpId" value="{{ old('slug', $project->slug) }}">
        <small id="helpId" class="text-muted">Required field</small>
    </div>
    @error('slug')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="mb-3 d-flex align-items-end gap-3">
        <div>
            <label for="cover_img" class="form-label d-block">Edit cover image</label>
            <img class="edit_form_img" src="{{asset('storage/' . $project->cover_img)}}" alt="">
        </div>

        <div>
            <input type="file" name="cover_img" id="cover_img"
                class="form-control @error('cover_img') is-invalid @enderror" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Edit cover image, must be max 250kb</small>
        </div>
    </div>
    @error('cover_img')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror


    <div class="mb-3">
        <label for="type_id" class="form-label">Types</label>
        <select class="form-select form-select-lg @error('type_id') is-invalid @enderror" name="type_id" id="type_id">

            <option value="">Select Type</option>
            @forelse($types as $type)
            <option value="{{$type->id}}" {{ old('type_id') == $type->id ? '$project->type->id' : '' }}>{{$type->name}}
            </option>
            @empty
            <option value="">no type found</option>
            @endforelse
        </select>
    </div>
    @error('type_id')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror


    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
            placeholder="" aria-describedby="helpId">{{ old('description', $project->description) }}</textarea>
    </div>
    @error('description')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <button class="btn btn-primary" type="submit">Edit Project</button>

</form>
@endsection