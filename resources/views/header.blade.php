<html>
    <head>
        @vite('resources/css/app.css')
    </head>
    <body class='m-0 font-sans'>
        <header class="header bg-gray-100">
            <div id="menu_navbar" class="navbar_container navbar-collapse">
                <div id="navbar" class="main-navbar flex flex-nowrap">
                    <div class="w-1/4">
                        <a class="skip-link" href="{{url('/')}}" data-uw-rm-brl="PR" data-uw-original-href="{{url('/')}}">
                            <img src="/uploads/logo.png" alt="Keokuk County" data-uw-rm-alt-original="Keokuk County" data-uw-rm-alt="ALT">
                        </a>
                    </div>
                    <div class="menu-01-main-menu-container container w-3/4 px-0 py-5">
                        <ul id="menu-01-main-menu" class="menu pull-right flex">
                            <li class="menu-item m-2.5 "> <a href="{{url('/home')}}">Home</a></li>
                            <li class="menu-item m-2.5 "> <a href="{{url('/register')}}">Register</a></li>
                            <li class="menu-item m-2.5 "> <a href="/about">About</a></li>
                            <li class="menu-item m-2.5 "> <a href="/">County Goverment</a></li>
                            <li class="menu-item m-2.5 "> <a href="/">Business Directory</a></li>
                            <li class="menu-item m-2.5 "> <a href="/">News</a></li>
                            <li class="menu-item m-2.5 "> <a href="/">Jobs</a></li>
                            <li class="menu-item m-2.5 "> <a href="/">Contect Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
