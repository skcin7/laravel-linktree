<form action="{{ route('linktree.admin.' . ($link->exists ? 'update_link' : 'create_link'), ['linkId' => $link->getAttribute('id')]) }}" method="POST">
    @csrf
    @if($link->exists)
        <input name="_method" type="hidden" value="put"/>
    @endif


    <input name="group_id" type="hidden" value="{{ $link->getAttribute('group_id') }}"/>


    <input class="width_100" name="name" placeholder="[NAME...]" type="text" value="{{ $link->getAttribute('name') }}" required/>
    <textarea class="width_100" name="description" placeholder="[DESCRIPTION (optional)...]">{{ $link->getAttribute('description') }}</textarea>
    <input class="width_100" name="href" placeholder="[HREF...]" type="text" value="{{ $link->getAttribute('href') }}" required/>

    <input name="is_hidden" type="hidden" value="0"/>

    <br/>

    <button class="submit_button" type="submit">{{ $link->exists ? 'Update' : 'Create' }} Link</button>
    @if($link->exists)
        <button class="danger_button" type="button" onclick="((event) => { document.getElementById('delete_link_{{ $link->getAttribute('id') }}_form').submit() })(this);">Delete Link</button>
    @endif
</form>

@if($link->exists)
    <form action="{{ route('linktree.admin.delete_link', ['linkId' => $link->getAttribute('id')]) }}" id="delete_link_{{ $link->getAttribute('id') }}_form" method="POST" style="display: none;">
        @csrf
        <input name="_method" type="hidden" value="delete"/>
    </form>
@endif
