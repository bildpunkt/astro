@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-body">
            <h1>@lang('admin.title')</h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2>@lang('admin.issues.title')</h2>
            <div class="row">
                <div class="col-sm-4">
                    @include('admin.card', ['title' => __('admin.issues.types.title'), 'subtitle' => __('admin.issues.types.subtitle'), 'route' => 'types.index'])
                </div>
                <div class="col-sm-4">
                    @include('admin.card', ['title' => __('admin.issues.categories.title'), 'subtitle' => __('admin.issues.categories.subtitle'), 'route' => 'categories.index'])
                </div>
                <div class="col-sm-4">
                    @include('admin.card', ['title' => __('admin.issues.priorities.title'), 'subtitle' => __('admin.issues.priorities.subtitle'), 'route' => 'priorities.index'])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
