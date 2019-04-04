<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
<a class="navbar-brand mr-auto mr-lg-0" href="#">{{config('app.name')}}</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
      @auth
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item {{($url == 'Home')? 'active' : ''}}">
              <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
            </li>
          <li class="nav-item {{(($url == 'Create Role') || ($url == 'All Roles') || ($url == 'Update Role'))? 'active' : ''}}">
          <a class="nav-link" href="{{route('Create Role')}}">Roles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Switch account</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
          {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> --}}
          <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
      @endauth
      </nav>


@auth
  <div class="nav-scroller bg-white shadow-sm">
    <nav class="nav nav-underline">
      @if($url == 'home')
        <a class="nav-link active" href="#">Dashboard</a>
        
        <a class="nav-link" href="#">
          Friends
          <span class="badge badge-pill bg-light align-text-bottom">27</span>
        </a>
        <a class="nav-link" href="#">Explore</a>
        <a class="nav-link" href="#">Suggestions</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link" href="#">Link</a>
      @endif
      @if(($url == 'Create Role') || ($url == 'All Roles') || ($url == 'Update Role'))
      <a href="{{route('Create Role')}}" class="nav-link {{($url == 'Create Role')? 'active' : ''}}">
          {{__('Add Role')}}
        </a>
      <a href="{{route('All Roles')}}" class="nav-link {{($url == 'All Roles')? 'active' : ''}}">
          {{__('All Roles')}}
        </a>
      @endif
    </nav>
  </div>
@endauth