
@if(Session::has('flash_message'))
    <div class="flash_message flash_message_{{ Session::get('flash_message')['type'] }}">
        {!! isset(Session::get('flash_message')['message']) ? Session::get('flash_message')['message'] : '' !!}
    </div>
@endif

@if(isset($errors) && count($errors) > 0)
    <div class="flash_message flash_message_danger">
        <p><strong>Please correct the following errors:</strong></p>
        <ol>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ol>
    </div>
@endif
