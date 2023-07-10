@if ($params['is_edit'])
    <a href="{{ route($params['route'] . 'edit', $params['row']->id) }}" class="edit-btn btn btn-primary btn-xs">
        <i class="la la-edit"></i>
    </a>
@endif
@if ($params['is_delete'])
    <form action="{{ route($params['route'] . 'destroy', $params['row']->id) }}" method="POST" class="d-inline" >
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-btn btn btn-danger btn-xs" >
            <i class="la la-trash"></i>
        </button>
    </form>
@endif
@if ($params['is_show'])
    <a href="{{ route($params['route'] . 'show', $params['row']->id) }}" class="edit-btn btn btn-primary btn-xs">
        <i class="la la-eye"></i>
    </a>
@endif
