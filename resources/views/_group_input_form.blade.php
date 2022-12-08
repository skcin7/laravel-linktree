<form action="{{ route('linktree.admin.' . ($group->exists ? 'update_group' : 'create_group'), ['groupId' => $group->getAttribute('id')]) }}" method="POST">
    @csrf
    @if($group->exists)
        <input name="_method" type="hidden" value="put"/>
    @endif

    <input class="width_100" name="name" placeholder="[NAME...]" type="text" value="{{ $group->getAttribute('name') }}"/>
    <br/>
    <textarea class="width_100" name="description" placeholder="[DESCRIPTION (optional)...]">{{ $group->getAttribute('description') }}</textarea>

    <input name="priority" type="hidden" min="0" max="10" step="1.0" value="{{ $group->getAttribute('priority') }}"/>
    <input name="is_hidden" type="hidden" value="0"/>

    <br/>

    <button class="submit_button" type="submit">{{ $group->exists ? 'Update' : 'Create' }} Group</button>
    @if($group->exists)
        <button class="danger_button" type="button" onclick="((event) => { document.getElementById('delete_group_{{ $group->getAttribute('id') }}_form').submit() })(this);">Delete Group</button>
    @endif
</form>

@if($group->exists)
    <form action="{{ route('linktree.admin.delete_group', ['groupId' => $group->getAttribute('id')]) }}" id="delete_group_{{ $group->getAttribute('id') }}_form" method="POST" style="display: none;">
        @csrf
        <input name="_method" type="hidden" value="delete"/>
    </form>
@endif
