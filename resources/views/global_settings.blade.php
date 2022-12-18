<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title: -->
    <title>Global Settings</title>

    <!-- Fonts: -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <!-- Styles: -->
{{--    <link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/global_settings.css') }}" rel="stylesheet">--}}

    <style>
        html, html > body {
            box-sizing: border-box;
            color: #000;
            font-family: 'Open Sans', sans-serif;
            font-size: 1.0rem;
            line-height: 1.6;
            min-height: 100vh;
            margin: 0rem;
            padding: 0rem;
            scroll-behavior: auto !important;
        }
        body {
            background-color: #FFF;
{{--            background-image: url("{{ asset('images/linktree/BackgroundDots_4x4.gif') }}");--}}
            background-image: url("data:image/gif;base64,R0lGODlhBAAEAIAAAP///87KxSH/C05FVFNDQVBFMi4wAwEAAAAh+QQEAAAAACwAAAAABAAEAAACBAyOqQUAOw==");
            margin: 0rem !important;
            padding: 0.5rem !important;
        }
        #global_settings_fieldset {
            background-color: #FFF;
            border: 2px solid #495057;
            box-shadow: 4px 4px 0 #869099;
            padding: 0rem;
        }
        #global_settings_fieldset legend {
            background-color: #FFF;
            font-size: 120% !important;
            border: 2px solid #495057;
            border-bottom: none;
            color: #000;
            display: flex;
            flex-direction: row;
            float: none !important;
            font-size: 15px;
            line-height: 1;
            margin: 0;
            margin-bottom: 0px;
            margin-bottom: 0;
            padding: 0.5rem;
            text-align: center;
            text-shadow: 0px 2px 2px #fff;
            width: auto;
        }
        #global_settings_fieldset form {
            display: flex;
            flex-direction: column;
            padding: 0.5rem;
        }
        #global_settings_fieldset form textarea {
            border: 1px solid #888;
            border-radius: 0rem;
            display: block;
            line-height: 1.6;
            margin-bottom: 0.5rem;
            resize: vertical;
        }
        #global_settings_fieldset form textarea:active,
        #global_settings_fieldset form textarea:focus {
            border-radius: 0rem !important;
            outline: 2px solid #0066CC;
        }
        #global_settings_fieldset form button[type='submit'] {
            /*--bs-btn-hover-border-color: #0a58ca;*/
            /*--bs-btn-active-color: #fff;*/
            /*--bs-btn-active-bg: #0a58ca;*/
            /*--bs-btn-active-border-color: #0a53be;*/
            /*--bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);*/

            display: inline-block;
            padding: 0.375rem 0.75rem;
            font-family: 'Open Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #FFF;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid #0d6efd;
            border-radius: 0rem;
            background-color: #0d6efd;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            cursor: pointer;
        }
        #global_settings_fieldset form button[type='submit']:active,
        #global_settings_fieldset form button[type='submit']:hover,
        #global_settings_fieldset form button[type='submit']:focus {
            background-color: #0b5ed7;
            border-color: #0a58ca;
            box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, .5);
            cursor: pointer;
        }

    </style>
</head>
    <body>
        @include('global_settings::_flash')

        <fieldset id="global_settings_fieldset">
            <legend>Global Settings</legend>

            <form action="{{ Route::has('web.mastermind.global_settings') ? route('web.mastermind.global_settings') : '#' }}" method="post">
                @csrf

                <textarea autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" class="@if(isset($errors) && count($errors) > 0) invalid @endif" id="global_settings_json_input" name="global_settings_json" placeholder="[Global Settings JSON...]" rows="10"></textarea>

                <button type="submit">Save Global Settings</button>
            </form>

        </fieldset>

        <script type="text/javascript">
            console.log('Global Settings Scripts...')
        </script>
    </body>
</html>
