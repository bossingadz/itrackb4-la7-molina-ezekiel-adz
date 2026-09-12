<nav class="navbar navbar-expand-lg navbar-dark bg-secondary rounded shadow-sm">
    <div class="container-fluid">
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('monsterhunters.index') }}">All Games</a>
            <a class="nav-link" href="{{ route('monsterhunters.featured') }}">Featured Pick</a>
            <a class="nav-link" href="{{ route('monsterhunters.filter', ['value' => 'Base Game']) }}">Base Games</a>
            <a class="nav-link" href="{{ route('monsterhunters.filter', ['value' => 'Expansion']) }}">Expansions</a>
        </div>
    </div>
</nav>