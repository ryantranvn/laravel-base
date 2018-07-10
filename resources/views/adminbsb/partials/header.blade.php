<h2 class="title">
    @if ($action == 'index')
        {{ trans('adminbsb.list') }}
    @else
        {{ trans('adminbsb.create') }}
    @endif
</h2>