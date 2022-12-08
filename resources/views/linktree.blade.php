<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title: -->
    <title>{{ (strlen(Linktree::name() > 0) ? Linktree::name() . ' | ' : '') }}Linktree</title>

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
        #linktree {
            padding: 1rem;
        }

        #avatar_container,
        #heading_container {
            margin-bottom: 1rem;
        }

        #avatar_container {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        #avatar_container > img {
            border-radius: 50%;
            height: 100px;
            width: 100px;
        }

        #heading_container {
            text-align: center;
        }

        #linktree_name {
            font-size: 36px;
            margin: 0;
            padding: 0;
        }

        #linktree_description {
            margin: 0;
            padding: 0;
        }

        #linktree_list {
            background-color: #FFF;
            border: 2px solid #888;
            list-style: none;
            margin: 0rem 1rem;
            padding: 0;
        }

        #linktree_list li {
            /*background-color: #FFF;*/
            border-bottom: 1px solid #888;
            padding: 0.5rem;
        }
        #linktree_list li:last-child {
            border-bottom: none;
        }

        #linktree_list li.linktree_item:nth-of-type(2n),
        #linktree_list li.linktree_item:hover {
            background-color: #DDD;
        }
        #linktree_list li.linktree_item:nth-of-type(2n + 1) {
            background-color: #EEE;
        }


        #linktree_list .linktree_group_header {
            background-color: #2a9055;
        }

        #linktree_list .linktree_group_header,
        #linktree_list .linktree_item {
            padding: 0.5rem;
        }

        .biggest {
            font-size: 145%;
        }
        .bigger {
            font-size: 130%;
        }
        .big {
            font-size: 115%;
        }
        .normal_size {
            font-size: 100%;
        }
        .small {
            font-size: 90%;
        }
        .smaller {
            font-size: 80%;
        }
        .smallest {
            font-size: 70%;
        }

        .text_center {
            text-align: center;
        }
        .text_left {
            text-align: left;
        }
        .text_right {
            text-align: right;
        }
        .text_muted {
            color: #888;
        }

        .font_style_italic {
            font-style: italic;
        }
        .font_style_normal {
            font-style: normal;
        }


    </style>
</head>
<body>
    <section id="linktree">

        @include('linktree::_flash')

        <div id="avatar_container">
            <img src="{{ Linktree::avatarUrl() }}"/>
        </div>

        <div id="heading_container">
            <h1 id="linktree_name">{{ Linktree::name() }}</h1>
            <p id="linktree_description">{{ Linktree::description() }}</p>
        </div>

{{--        <h1>Linktree</h1>--}}
{{--        <h1>Showing all Linktree Links</h1>--}}

        @if(Linktree::groups($hidden = false, $order_by = 'priority', $must_have_links = true)->count() > 0)
            <ul id="linktree_list">
                @foreach(Linktree::groups($hidden = false, $order_by =  'priority', $must_have_links = true) as $group)
                    <li class="linktree_group_header">
                        {{ $group->getAttribute('name') }}
                    </li>

                    @foreach($group->links as $link)
                        <li class="linktree_item">
                            <a href="{{ $link->getAttribute('href') }}">{{ $link->getAttribute('name') }}</a>
                            @if(strlen($link->getAttribute('description') > 0))
                                <div class="small">{{ $link->getAttribute('description') }}</div>
                            @endif
                        </li>
                    @endforeach
                @endforeach
            </ul>
        @else
            <div class="text_center text_muted biggest font_style_italic">No Links</div>
        @endif

    </section>

</body>
</html>
