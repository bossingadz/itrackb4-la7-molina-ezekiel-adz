        <nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('monsterhunters.index') }}">Monster Hunter</a>
        <div class="navbar-nav">
            <a class="nav-link {{ request()->is('monsterhunters') || request()->is('monsterhunters/*') && !request()->is('monsterhunters/featured') ? 'active' : '' }}" href="{{ route('monsterhunters.index') }}">
                All Games
            </a>
            <a class="nav-link {{ request()->is('monsterhunters/featured') ? 'active' : '' }}" href="{{ route('monsterhunter.featured') }}">
                Featured Pick
            </a>
        </div>
    </div>
</nav>