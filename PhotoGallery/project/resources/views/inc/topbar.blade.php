<div class="top-bar">
    <div class="row">
        <div class="top-bar-left">
            <ul class="menu">
                <li class="menu-text">PhotoShow</li>
                <li class="{{Request::is('/') ? 'active' : ''}}"><a href="/">Home</a></li>
                <li class="{{Request::is('albums/create') ? 'active' : ''}}"><a href="/albums/create">Create Album</a></li>
            </ul>
        </div>
    </div>
</div>