
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Webdev Test Two">
    <meta name="author" content="Adrian Maenzanise">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Webdev test two</title>
    
    <link href="{{ asset("css/app.css") }}" rel="stylesheet">
    <link href="{{ asset("css/dashboard.css") }}" rel="stylesheet">
  </head>

  <body>
      <div id="app">
            <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">{{ config('app.name') }}</a>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            </nav>
    
            <div class="container-fluid">
                <div class="row">
                    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <router-link class="nav-link" active-class="active" to="/">
                                <span data-feather="users"></span>
                                Users
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" active-class="active" to="/attributes">
                                <span data-feather="file"></span>
                                Attributes
                                </router-link>
                            </li>
                        </ul>
                    </div>
                    </nav>
    
                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    
                        <router-view></router-view>
    
                    </main>
                </div>
            </div>
      </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
  </body>
</html>
