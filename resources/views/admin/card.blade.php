<div class="card">
    <div class="card-body">
        <h3>{{ $title }}</h3>
        <p class="mb-0">{{ $subtitle }}</p>
    </div>
    <div class="card-footer text-right">
        <a class="btn btn-primary" href="{{ route($route) }}">@lang('admin.manage')</a>
    </div>
</div>