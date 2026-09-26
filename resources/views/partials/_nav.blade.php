<nav>
    <a href="{{ route('monsterhunter.index') }}" style="{{ request()->is('monsterhunters*') && !request()->is('monsterhunters/featured') ? 'font-weight: bold;' : '' }}">
        All Games
    </a> | 
    <a href="{{ route('monsterhunter.featured') }}" style="{{ request()->is('monsterhunters/featured') ? 'font-weight: bold;' : '' }}">
        Featured Pick
    </a>
</nav>
<hr>