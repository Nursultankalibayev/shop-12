<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/system/assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/system/assets/img/favicon-32x32.png" sizes="32x32">
    <title>Адмика</title>
    @include('admin.includes.styles')
    @stack('styles')
</head>
<body class="sidebar_main_open">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
            </form>
        </div>
    </header><!-- main header end -->

    <!-- main sidebar -->
    <aside id="sidebar_main">
        <a href="#" class="uk-close sidebar_main_close_button"></a>
        <div class="sidebar_main_header">
            <div class="sidebar_logo"><a href="/admin"><img src="/system/assets/img/logo_main.png" alt="" height="15" width="71"/></a></div>

        </div>
        <div class="menu_section">
            <ul>
                @include('admin.includes.menu')
            </ul>
        </div>
    </aside><!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">
            @yield('content')
        </div>
    </div>

    <!-- secondary sidebar -->
    <aside id="sidebar_secondary">
        <div class="sidebar_secondary_wrapper">
            <h4 class="heading_c uk-margin-bottom">Recent Activity</h4>

            <div class="timeline timeline_small">
                <div class="timeline_item">
                    <div class="timeline_icon timeline_icon_success"><i class="material-icons">&#xE85D;</i></div>
                    <div class="timeline_date">
                        09 <span>Jul</span>
                    </div>
                    <div class="timeline_content">Created ticket <a href="#"><strong>#3289</strong></a></div>
                </div>
                <div class="timeline_item">
                    <div class="timeline_icon timeline_icon_danger"><i class="material-icons">&#xE5CD;</i></div>
                    <div class="timeline_date">
                        15 <span>Jul</span>
                    </div>
                    <div class="timeline_content">Deleted post <a href="#"><strong>Quia vel impedit sed.</strong></a></div>
                </div>
                <div class="timeline_item">
                    <div class="timeline_icon"><i class="material-icons">&#xE410;</i></div>
                    <div class="timeline_date">
                        19 <span>Jul</span>
                    </div>
                    <div class="timeline_content">
                        Added photo
                        <div class="timeline_content_addon">
                            <img src="/system/assets/img/gallery/Image16.jpg" alt=""/>
                        </div>
                    </div>
                </div>
                <div class="timeline_item">
                    <div class="timeline_icon timeline_icon_primary"><i class="material-icons">&#xE0B9;</i></div>
                    <div class="timeline_date">
                        21 <span>Jul</span>
                    </div>
                    <div class="timeline_content">
                        New comment on post <a href="#"><strong>Voluptatem ratione et magni totam.</strong></a>
                        <div class="timeline_content_addon">
                            <blockquote>
                                Earum cumque suscipit quod cum consectetur dolore cumque adipisci.&hellip;
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="timeline_item">
                    <div class="timeline_icon timeline_icon_warning"><i class="material-icons">&#xE7FE;</i></div>
                    <div class="timeline_date">
                        29 <span>Jul</span>
                    </div>
                    <div class="timeline_content">
                        Added to Friends
                        <div class="timeline_content_addon">
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <img class="md-user-image md-list-addon-avatar" src="/system/assets/img/avatars/avatar_02_tn.png" alt=""/>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">Amie Upton</span>
                                        <span class="uk-text-small uk-text-muted">Impedit voluptas esse.</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </aside><!-- secondary sidebar end -->

    @include('admin.includes.scripts')
    @stack('scripts')
</body>
</html>