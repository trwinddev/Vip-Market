<div class="card ">
    <div class="card-body ">
        <img class="mx-auto d-block img-thumbnail" src="/img/man.jpg" width="130">
        <p class="text-center"><b>John Doe</b></p>
    </div>
    <hr style="border:2px solid blue;">
    <div class="vertical-menu">
        <a href="#">Dashboard</a>
        <a href="#">Profile</a>
        <a href="{{ route('ads.create') }}" class="{{ request()->is('ads/create') ? 'active' : '' }}"> Create ads</a>
        <a href="{{ route('ads.index') }}" class="{{ request()->is('ads') ? 'active' : '' }}"> Published ads</a>
        <a href="#">Pending ads</a>
        <a href="#" class="">Message</a>
    </div>
</div>
