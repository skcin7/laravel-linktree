<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title: -->
    <title>Linktree Admin</title>

    <!-- Fonts: -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <!-- Styles: -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style>
        /*$font-size-base: 0.9rem;*/
        /*$line-height-base: 1.6;*/


        html, html > body {
            box-sizing: border-box;
            color: #000;
            font-family: 'Open Sans', sans-serif;
            font-size: 1.0rem;
            line-height: 1.6;
            min-height: 100vh;
            margin: 0px;
            padding: 0px;
            scroll-behavior: auto !important;
        }
        body {
            background-color: #FFF;
            background-image: url("{{ asset('images/linktree/BackgroundDots_4x4.gif') }}");
            margin: 0px;
            padding: 0px;
        }
        #linktree_admin {
            padding: 1rem;
        }


        .submit_button,
        .danger_button {
            background-color: #FFF;
            border: 1px solid #888;
            padding: 0.5rem;
        }
        .submit_button {
            background-color: #0066CC;
            border-color: #0b5ed7;
        }
        .danger_button {
            background-color: #dc3545;
            border-color: #bb2d3b;
        }

        .width_100 {
            width: 100%;
        }


        .flash_message {
            padding: 1rem;
        }
        .flash_message_success {
            background-color: #1d643b;
            border: 1px solid #1a4d1a;
        }
        .flash_message_danger {
            background-color: #b48d8d;
            border: 1px solid #883333;
        }



    </style>
</head>
<body>
    <section id="linktree_admin">

        @include('linktree::_flash')


        <div>
            <a href="{{ route('linktree.index') }}">← Back To Linktree</a>
        </div>

        <h1>Linktree Admin</h1>


        <h2>Edit Groups/Links:</h2>

        @if(Linktree::groups($hidden = false, $order_by = 'created_at')->count() > 0)


            @foreach(Linktree::groups($hidden = false, $order_by = 'created_at') as $group)
                <fieldset>
                    <legend>Group: {{ $group->getAttribute('name') }} [ID: {{ $group->getAttribute('id') }}]</legend>

                    @include('linktree::_group_input_form', ['group' => $group])

                    @foreach($group->links as $link)
                        <ul class="admin_group_links" style="list-style: none; margin: 0; padding: 0; padding-left: 2rem;">
                            <li class="admin_group_link">

                                <fieldset>
                                    <legend>Edit Existing Link [ID: {{ $link->getAttribute('id') }}]</legend>

                                    @include('linktree::_link_input_form', ['link' => $link])
                                </fieldset>

{{--                                <form action="{{ route('linktree.admin.update_link') }}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    <input name="_method" type="hidden" value="put"/>--}}

{{--                                    <input name="group_id" type="hidden" value="{{ $link->getAttribute('group_id') }}"/>--}}
{{--                                    <input name="name" type="text" value="{{ $link->getAttribute('name') }}"/>--}}
{{--                                    <textarea name="description">{{ $link->getAttribute('description') }}</textarea>--}}
{{--                                    <input name="href" type="text" value="{{ $link->getAttribute('href') }}"/>--}}
{{--                                    <input name="is_hidden" type="hidden" value="0"/>--}}

{{--                                    <buton class="normal_submit_button" type="submit">Update Link</buton>--}}
{{--                                    <buton class="danger_button" type="button" onclick="((event) => { document.getElementById('delete_link_{{ $link->getAttribute('id') }}_form').submit() })(this);">Delete Link</buton>--}}
{{--                                </form>--}}

{{--                                <form action="{{ route('linktree.admin.delete_link', ['linkId' => $link->getAttribute('id')]) }}" id="delete_link_{{ $link->getAttribute('id') }}_form" method="POST" style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                    <input name="_method" type="hidden" value="delete"/>--}}
{{--                                </form>--}}

                            </li>
                        </ul>
                    @endforeach

                    <fieldset>
                        <legend>Create New Link</legend>

                        @include('linktree::_link_input_form', ['link' => (new \Skcin7\LaravelLinktree\Models\Link())->group()->associate($group) ])
                    </fieldset>

                </fieldset>
            @endforeach


            <fieldset>
                <legend>Create New Group</legend>

                @include('linktree::_group_input_form', ['group' => new \Skcin7\LaravelLinktree\Models\Group()])
            </fieldset>


        @else
            <div class="text_center text_muted biggest font_style_italic">No Groups</div>
        @endif


        <h2>Edit Settings:</h2>

        <form action="{{ route('linktree.admin.update_settings') }}" method="POST">
            @csrf

            <input class="width_100" name="name" placeholder="[YOUR APP/COMPANY/ORGANIZATION NAME...]" type="text" value="{{ Linktree::name() }}"/>
            <br/>
            <textarea class="width_100" name="description" placeholder="[YOUR DESCRIPTION (optional)...]">{{ Linktree::description() }}</textarea>
            <br/>
            <input class="width_100" name="avatar_url" placeholder="[AVATAR URL...]" type="text" value="{{ Linktree::avatarUrl() }}"/>
            <br/>
            <button class="submit_button" type="submit">Update Settings</button>
        </form>




    </section>

</body>
</html>
