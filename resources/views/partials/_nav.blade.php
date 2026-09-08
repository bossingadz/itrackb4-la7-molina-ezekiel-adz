<nav class="navbar navbar-expand-lg navbar-dark bg-secondary rounded shadow-sm">
    <div class="container-fluid">
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('monsterhunter.index') }}">All Games</a>
            <a class="nav-link" href="{{ route('monsterhunter.featured') }}">Featured Pick</a>
            <a class="nav-link" href="{{ route('monsterhunter.filter', ['value' => 'Base Game']) }}">Base Games</a>
            <a class="nav-link" href="{{ route('monsterhunter.filter', ['value' => 'Expansion']) }}">Expansions</a>
        </div>
    </div>
</nav>