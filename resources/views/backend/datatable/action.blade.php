@if ($params['is_edit'])
    <a href="{{ route($params['route'] . 'edit', $params['row']->id) }}" class="edit-btn btn btn-primary btn-xs">
        <i class="la la-edit"></i>
    </a>
@endif
@if ($params['is_delete'])
    <a href="{{ route($params['route'] . 'destroy', $params['row']->id) }}" class="delete-btn btn btn-danger btn-xs"
        data-confirm-delete="true">
        <i class="la la-trash"></i>
    </a>
@endif
@if ($params['is_show'])
    <a href="{{ route($params['route'].'show', $params['row']->id) }}" class="edit-btn btn btn-primary btn-xs">
        <i class="la la-eye"></i>
    </a>
@endif
