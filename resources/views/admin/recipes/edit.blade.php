@extends('layouts.app')

@section('content')
<div class="container-fluid">

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Recipe')}}</h1>
                    <a href="{{ route('admin.recipes.index') }}" class="btn btn-success btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.recipes.update', $recipe->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" class="form-control" id="title" placeholder="{{ __('title') }}" name="title" value="{{ old('title', $recipe->title) }}" />
                    </div>
                    <div class="form-group">
                        <label for="prep">{{ __('Prep') }}</label>
                        <input type="text" class="form-control" id="prep" placeholder="{{ __('prep') }}" name="prep" value="{{ old('prep', $recipe->prep) }}" />
                    </div>
                    <div class="form-group">
                        <label for="cook">{{ __('Cook') }}</label>
                        <input type="text" class="form-control" id="cook" placeholder="{{ __('cook') }}" name="cook" value="{{ old('cook', $recipe->cook) }}" />
                    </div>
                    <div class="form-group">
                        <label for="level">{{ __('Level') }}</label>
                        <select name="level" id="level" class="form-control" required>
                            <option {{ $recipe->level == 'For Beginner' ? 'selected' : null }} value="For Beginner">For Beginner</option>
                            <option {{ $recipe->level == 'For Intermediate' ? 'selected' : null }} value="For Intermadiate">For Intermediate</option>
                            <option {{ $recipe->level == 'For Expert' ? 'selected' : null }} value="For Expert">For Expert</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Save')}}</button>
                </form>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header">
            <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-striped table-hover datatable datatable-role" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>No</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recipe->galleries as $gallery)
                            <tr data-entry-id="{{ $gallery->id }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a target="_blank" href="{{ Storage::url($gallery->path) }}">
                                        <img src="{{ asset('storage/' . $gallery->path) }}" width="80px" alt="">
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.recipes.galleries.edit', [$recipe,$gallery]) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form onclick="return confirm('are you sure ? ')" class="d-inline" action="{{ route('admin.recipes.galleries.destroy', [$recipe,$gallery]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.recipes.galleries.store', [$recipe]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="path">{{ __('Image') }}</label>
                        <input type="file" class="form-control" id="path" placeholder="{{ __('Image') }}" name="path" value="{{ old('path') }}" />
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Save')}}</button>
                </form>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header">
            <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-striped table-hover datatable datatable-role" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>No</th>
                                <th>{{ __('Ingredients') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recipe->ingredients as $ingredient)
                            <tr data-entry-id="{{ $ingredient->id }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $ingredient->title }}
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.recipes.ingredients.edit', [$recipe, $ingredient]) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form onclick="return confirm('are you sure ? ')" class="d-inline" action="{{ route('admin.recipes.ingredients.destroy', [$recipe,$ingredient]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.recipes.ingredients.store', [$recipe]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{ __('Ingredients') }}</label>
                        <input type="text" class="form-control" id="title" placeholder="{{ __('Ingredients') }}" name="title" value="{{ old('title') }}" />
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Save')}}</button>
                </form>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header">
            <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-striped table-hover datatable datatable-role" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>No</th>
                                <th>{{ __('To-do') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recipe->todos as $todo)
                            <tr data-entry-id="{{ $todo->id }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $todo->todo }}
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.recipes.todos.edit', [$recipe,$todo]) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form onclick="return confirm('are you sure ? ')" class="d-inline" action="{{ route('admin.recipes.todos.destroy', [$recipe,$todo]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.recipes.todos.store', [$recipe]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="todo">{{ __('To-do') }}</label>
                        <input type="text" class="form-control" id="todo" placeholder="{{ __('To-do') }}" name="todo" value="{{ old('todo') }}" />
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Save')}}</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection


@push('style-alt')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script-alt')
<script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    >
    </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
      $('.select-multiple').select2();
</script>
@endpush