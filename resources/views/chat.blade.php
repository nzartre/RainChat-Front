<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="img/ogimage.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="favicon/manifest.json?v=1.0">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="favicon/favicon.ico">
    <meta name="msapplication-config" content="favicon/browserconfig.xml?v=1.0">
    <meta name="theme-color" content="#00b8ff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>Rainy.Chat</title>
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/dist/chat.css?v=1.1.1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="js/vue.min.js"></script>
    <script src="js/material.min.js" async></script>
    <script>
        document.createElement("picture");
    </script>
    <script src="js/picturefill.min.js" async></script>
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header" id="app">
        @if (substr(url('/'), -3, 3) == 'dev')
            <div style="position: absolute; left: 20px; bottom: 20px; z-index: 10">
            Development Mode<br>
            url: {{ url('/') }}<br>
            room: {{ $room }}<br>
            host: @{{ config.host }}<br>
            port: @{{ config.port }}
            </div>
        @endif
        <header class="mdl-layout__header no-drag">
            <div class="mdl-layout__header-row">
                <div class="roomname">Global Group</div>
                <button id="top-menu" class="mdl-button mdl-js-button mdl-button--icon">
                    <i class="material-icons">more_vert</i>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="top-menu">
                    <li class="mdl-menu__item" @click="toggleNight">@{{ nightText }}</li>
                    <li class="mdl-menu__item" onclick="location.reload()">Logout</li>
                </ul>
            </div>
        </header>
        <div class="mdl-layout__drawer no-drag">
            <span class="mdl-layout-title">
                <img src="img/logo-sidebar.png" alt="Rainy.Chat" class="no-drag">
            </span>
            <div class="welcome" v-if="loggedIn">Welcome,
                <br/>@{{ username }}</div>
            <div class="drawer-section">Online users</div>
            <hr>
            <div class="online-users">
                <div class="user" v-for="person in online">
                    @{{ person }}
                </div>
            </div>
        </div>
        <main class="mdl-layout__content" id="chatwrap">
            <div class="page-content">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col" style="padding-bottom:8em" id="chatlog">
                        <!-- chat log's here -->
                    </div>
                </div>
                <div class="textinput">
                    <form id="chatform" autocomplete="off">
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="chat" name="command" maxlength="1200" v-bind:disabled="!loggedIn">
                            <label class="mdl-textfield__label" for="chat">@{{ typeHere }}</label>
                            <button id="submit" style="display: none;" v-if="loggedIn && username">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <div class="modal" v-if="!loggedIn">
            <div class="modal-box">
                <img src="img/logo-sidebar.png" alt="Rainy.Chat" class="launch-icon no-drag">
                <div class="form-wrap">
                    <form id="login_form" v-on:submit.prevent action="#" v-show="mode==1" autocomplete="off">
                        <div class="mdl-textfield mdl-js-textfield in-form-wrap">
                            <input class="mdl-textfield__input" type="text" id="login__username" maxlength="30" autofocus required v-model="username">
                            <label class="mdl-textfield__label" for="login__username">Display name</label>
                        </div>
                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--primary in-form-wrap" @click="checkLogin">
                            <i class="material-icons">arrow_forward</i>
                        </button>
                    </form>
                </div>
            </div>
            <img srcset="img/wave-450.png 450w, img/wave-900.png 800w, img/wave-900.png 800w, img/wave-1300.png 1300w, img/wave-1600.png 1600w, img/wave-2000.png 2000w, img/wave-2600.png 2600w, img/wave-3200.png 3200w, img/wave-4000.png 4000w" class="launch-waves no-drag">
        </div>
        <div aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
            <div class="mdl-snackbar__text"></div>
            <button type="button" class="mdl-snackbar__action" style="display: none;"></button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="js/visible.min.js"></script>
    <script src="js/chat.js?v=1.1"></script>
</body>

</html>
