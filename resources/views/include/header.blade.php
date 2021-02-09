        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{route('welcome')}}">
                    პროდუქცია
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> {{ __('შესვლა') }} </a>
                            </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"> {{ __('რეგისტრაცია') }} </a>
                                </li>
                                @endif
                                @else


                                <li class="nav-item">
                                    <a href="{{ route('all_product')}}" class="nav-link">
                                        <i class="icon-suitcase"></i> პროდუქცია </a>
                                </li>
                                

                                <li class="nav-item">
                                    <a href="{{ route('category')}}" class="nav-link">
                                        <i class="icon-tags"></i> კატეგორიები </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('add_product')}}" class="nav-link">
                                        <i class="icon-plus-square"></i> პროდუქციის დამატება </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('add_category')}}" class="nav-link">
                                        <i class="icon-plus"></i> კატეგორიის დამატება </a>
                                </li>


                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        
                                        <a class="dropdown-item" href="{{ route('dashboard')}}">
                                            <i class="icon-suitcase"></i> ჩემი პროდუქცია
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-sign-out"></i> {{ __('Logout') }}
                                        </a>
                                    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>