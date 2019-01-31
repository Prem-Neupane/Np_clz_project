<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">    
        <a class="navbar-brand" href="{{ url('/') }}">NC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <!-- left side of navbar -->

      <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="/homes">Home</a>
          </li>           
            
          @foreach($menus as $menu)

            @if($menu->activesubmenus->count() == 0)

              <li class="nav-item">
                  <a class="nav-link" href="{{ $menu->slug }}">{{ $menu->title }}</a>
              </li>       
            @else              
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $menu->title }}
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdown03">
                     @foreach($menu->activesubmenus as $submenu)                              
                        <a class="dropdown-item" href="{{ $menu->slug }}/{{ $submenu->slug }}">{{ $submenu->title }}</a>                              
                     @endforeach                                   
                  </div>
               </li>

            @endif                    
        @endforeach                
      </ul>

      <!-- right side of navbar -->
      <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="/dashboard"> Dashboard
                        </a>

                        <a class="dropdown-item" href="/dashboard/{{ Auth::user()->identity }}/profile">My Profile
                        </a>

                        <a class="dropdown-item" href="/dashboard/{{ Auth::user()->identity }}/add_profile">Update Profile
                        </a>

                        <a class="dropdown-item" href="#"> Create Post
                        </a>


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
    </div>
    </nav>
