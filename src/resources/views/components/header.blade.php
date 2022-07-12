<style>
     header {
          position: sticky;
          top: 0%;
          left: 0%;
          width: 100vw;
          background-color: #fff;
          z-index: 2;
     }

     .header_img {
          text-align: center;
     }
</style>
<header>
     <div class="header_img">
          <img src="\storage\クイズ.png" alt="">
     </div>
     <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
     </a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
</header>