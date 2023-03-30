<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title')</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">


<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

    * {
        font-family: 'Kanit', sans-serif;
    }

    input[type="file"] {
        display: block;
    }

    .imageThumb {
        max-height: 200px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
    }

    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
    }

    .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
    }

    .remove:hover {
        background: white;
        color: black;
    }


    /* //// */

    .selectMultiple {
        width: 400px;
        position: relative;
    }

    .selectMultiple select {
        display: none;
    }

    .selectMultiple>div {
        position: relative;
        z-index: 2;
        padding: 8px 12px 2px 12px;
        border-radius: 8px;
        background: #fff;
        font-size: 14px;
        min-height: 44px;
        box-shadow: 0 4px 16px 0 rgba(22, 42, 90, 0.12);
        transition: box-shadow 0.3s ease;
    }

    .selectMultiple>div:hover {
        box-shadow: 0 4px 24px -1px rgba(22, 42, 90, 0.16);
    }

    .selectMultiple>div .arrow {
        right: 1px;
        top: 0;
        bottom: 0;
        cursor: pointer;
        width: 28px;
        position: absolute;
    }

    .selectMultiple>div .arrow:before,
    .selectMultiple>div .arrow:after {
        content: "";
        position: absolute;
        display: block;
        width: 2px;
        height: 8px;
        border-bottom: 8px solid #99A3BA;
        top: 43%;
        transition: all 0.3s ease;
    }

    .selectMultiple>div .arrow:before {
        right: 12px;
        transform: rotate(-130deg);
    }

    .selectMultiple>div .arrow:after {
        left: 9px;
        transform: rotate(130deg);
    }

    .selectMultiple>div span {
        color: #99A3BA;
        display: block;
        position: absolute;
        left: 12px;
        cursor: pointer;
        top: 8px;
        line-height: 28px;
        transition: all 0.3s ease;
    }

    .selectMultiple>div span.hide {
        opacity: 0;
        visibility: hidden;
        transform: translate(-4px, 0);
    }

    .selectMultiple>div a {
        position: relative;
        padding: 0 24px 6px 8px;
        line-height: 28px;
        color: #1E2330;
        display: inline-block;
        vertical-align: top;
        margin: 0 6px 0 0;
    }

    .selectMultiple>div a em {
        font-style: normal;
        display: block;
        white-space: nowrap;
    }

    .selectMultiple>div a:before {
        content: "";
        left: 0;
        top: 0;
        bottom: 6px;
        width: 100%;
        position: absolute;
        display: block;
        background: rgba(228, 236, 250, 0.7);
        z-index: -1;
        border-radius: 4px;
    }

    .selectMultiple>div a i {
        cursor: pointer;
        position: absolute;
        top: 0;
        right: 0;
        width: 24px;
        height: 28px;
        display: block;
    }

    .selectMultiple>div a i:before,
    .selectMultiple>div a i:after {
        content: "";
        display: block;
        width: 2px;
        height: 10px;
        position: absolute;
        left: 50%;
        top: 50%;
        background: #4D18FF;
        border-radius: 1px;
    }

    .selectMultiple>div a i:before {
        transform: translate(-50%, -50%) rotate(45deg);
    }

    .selectMultiple>div a i:after {
        transform: translate(-50%, -50%) rotate(-45deg);
    }

    .selectMultiple>div a.notShown {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .selectMultiple>div a.notShown:before {
        width: 28px;
        transition: width 0.45s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0.2s;
    }

    .selectMultiple>div a.notShown i {
        opacity: 0;
        transition: all 0.3s ease 0.3s;
    }

    .selectMultiple>div a.notShown em {
        opacity: 0;
        transform: translate(-6px, 0);
        transition: all 0.4s ease 0.3s;
    }

    .selectMultiple>div a.notShown.shown {
        opacity: 1;
    }

    .selectMultiple>div a.notShown.shown:before {
        width: 100%;
    }

    .selectMultiple>div a.notShown.shown i {
        opacity: 1;
    }

    .selectMultiple>div a.notShown.shown em {
        opacity: 1;
        transform: translate(0, 0);
    }

    .selectMultiple>div a.remove:before {
        width: 28px;
        transition: width 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0s;
    }

    .selectMultiple>div a.remove i {
        opacity: 0;
        transition: all 0.3s ease 0s;
    }

    .selectMultiple>div a.remove em {
        opacity: 0;
        transform: translate(-12px, 0);
        transition: all 0.4s ease 0s;
    }

    .selectMultiple>div a.remove.disappear {
        opacity: 0;
        transition: opacity 0.5s ease 0s;
    }

    .selectMultiple>ul {
        margin: 0;
        padding: 0;
        list-style: none;
        font-size: 16px;
        z-index: 1;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        visibility: hidden;
        opacity: 0;
        border-radius: 8px;
        transform: translate(0, 20px) scale(0.8);
        transform-origin: 0 0;
        filter: drop-shadow(0 12px 20px rgba(22, 42, 90, 0.08));
        transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s;
    }

    .selectMultiple>ul li {
        color: #1E2330;
        background: #fff;
        padding: 12px 16px;
        cursor: pointer;
        overflow: hidden;
        position: relative;
        transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease 0.3s, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s;
    }

    .selectMultiple>ul li:first-child {
        border-radius: 8px 8px 0 0;
    }

    .selectMultiple>ul li:first-child:last-child {
        border-radius: 8px;
    }

    .selectMultiple>ul li:last-child {
        border-radius: 0 0 8px 8px;
    }

    .selectMultiple>ul li:last-child:first-child {
        border-radius: 8px;
    }

    .selectMultiple>ul li:hover {
        background: #4D18FF;
        color: #fff;
    }

    .selectMultiple>ul li:after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 6px;
        height: 6px;
        background: rgba(0, 0, 0, 0.4);
        opacity: 0;
        border-radius: 100%;
        transform: scale(1, 1) translate(-50%, -50%);
        transform-origin: 50% 50%;
    }

    .selectMultiple>ul li.beforeRemove {
        border-radius: 0 0 8px 8px;
    }

    .selectMultiple>ul li.beforeRemove:first-child {
        border-radius: 8px;
    }

    .selectMultiple>ul li.afterRemove {
        border-radius: 8px 8px 0 0;
    }

    .selectMultiple>ul li.afterRemove:last-child {
        border-radius: 8px;
    }

    .selectMultiple>ul li.remove {
        transform: scale(0);
        opacity: 0;
    }

    .selectMultiple>ul li.remove:after {
        -webkit-animation: ripple 0.4s ease-out;
        animation: ripple 0.4s ease-out;
    }

    .selectMultiple>ul li.notShown {
        display: none;
        transform: scale(0);
        opacity: 0;
        transition: transform 0.35s ease, opacity 0.4s ease;
    }

    .selectMultiple>ul li.notShown.show {
        transform: scale(1);
        opacity: 1;
    }

    .selectMultiple.open>div {
        box-shadow: 0 4px 20px -1px rgba(22, 42, 90, 0.12);
    }

    .selectMultiple.open>div .arrow:before {
        transform: rotate(-50deg);
    }

    .selectMultiple.open>div .arrow:after {
        transform: rotate(50deg);
    }

    .selectMultiple.open>ul {
        transform: translate(0, 12px) scale(1);
        opacity: 1;
        visibility: visible;
        filter: drop-shadow(0 16px 24px rgba(22, 42, 90, 0.16));
    }

    @-webkit-keyframes ripple {
        0% {
            transform: scale(0, 0);
            opacity: 1;
        }

        25% {
            transform: scale(30, 30);
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: scale(50, 50);
        }
    }

    @keyframes ripple {
        0% {
            transform: scale(0, 0);
            opacity: 1;
        }

        25% {
            transform: scale(30, 30);
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: scale(50, 50);
        }
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link href="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.css" rel="stylesheet">


<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
<link rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRUD App Laravel 8 & Ajax</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
<link rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />


<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

<!-- Include Twitter Bootstrap and jQuery: -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css" />
