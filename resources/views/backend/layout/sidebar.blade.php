<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{ route('dashboard') }}"><img class="hide-on-med-and-down " src="{{ asset('backend/app-assets/images/logo/materialize-logo.png') }}" alt="materialize logo" /><img class="show-on-medium-and-down hide-on-med-and-up" src="{{ asset('backend/app-assets/images/logo/materialize-logo-color.png') }}" alt="findr logo" /><span class="logo-text hide-on-med-and-down">FindR Apps</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
        <li class="bold"><a class="waves-effect waves-cyan" href="{{ route('dashboard') }}" target="_parent"><i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">photo_filter</i><span class="menu-title" data-i18n="Menu levels">Family</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{ route('add.family') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Add Family</span></a></li>
                    <li><a href="{{ route('index.family') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Manage Family</span></a></li>
                </ul>
            </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)"><i class="material-icons">photo_filter</i><span class="menu-title" data-i18n="Menu levels">Circle</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{ route('add.circle') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Add Circle</span></a></li>
                    <li><a href="{{ route('index.circle') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Manage Circle</span></a></li>
                </ul>
            </div>
        </li>

        <li class="bold"><a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)"><i class="material-icons">photo_filter</i><span class="menu-title" data-i18n="Menu levels">Product</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{ route('add.product') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Add Product</span></a></li>
                    <li><a href="{{ route('view.student') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Manage Circle</span></a></li>
                </ul>
            </div>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan " href="#" target="_blank"><i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Documentation">Documentation</span></a></li>
        <li class="bold"><a class="waves-effect waves-cyan " href="#" target="_blank"><i class="material-icons">help_outline</i><span class="menu-title" data-i18n="Support">Support</span></a></li>
    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
