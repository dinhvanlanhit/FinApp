<div class="appHeader bg-primary text-light">
    <div class="right">
        <a href="#" class="headerButton" data-toggle="modal" data-target="#modal-logout">
            <i class="fas fa-sign-out-alt icon-serach"></i>
        </a>
    </div>
    <div class="pageTitle">
        {{Auth::user()->full_name}}
        {{-- <img src="{{asset('AdminMobiles/assets/img/logo.png')}}" alt="logo" class="logo"> --}}
    </div>
    <div class="left">
        <a href="app-settings.html" class="headerButton">
            <img src="{{asset('AdminMobiles/assets/img/sample/avatar/avatar1.jpg')}}" alt="image" class="imaged w32">
            <span class="badge badge-danger">6</span>
        </a>
    </div>
</div>