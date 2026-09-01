<!DOCTYPE html>
<html>
<head>
    <title>Monster Hunter Games</title>
</head>
<body>
    <h1>Monster Hunter Games List</h1>
    <p>Prepared by: Ezekiel Adz F. Molina</p>

    <nav>
        <a href="{{ route('monsterhunter.index') }}">All Games</a> | 
        <a href="{{ route('monsterhunter.featured') }}">Featured Game</a> | 
        <a href="{{ route('monsterhunter.filter', ['value' => 'Base Game']) }}">Filter: Base Games</a> | 
        <a href="{{ route('monsterhunter.filter', ['value' => 'Expansion']) }}">Filter: Expansions</a>
    </nav>

    <hr>

    @if(isset($activeFilter) && $activeFilter)
        <p>Showing filter results for: <strong>{{ $activeFilter }}</strong></p>
    @else
        <p>Showing all items.</p>
    @endif

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Type/Platform</th>
            <th>Price</th>
        </tr>

        @forelse ($games as $game)
            <tr>
                <td>{{ $game['id'] }}</td>
                <td>
                    <!-- F2: Generated link to detail page using route name -->
                    <a href="{{ route('monsterhunter.show', ['id' => $game['id']]) }}">
                        {{ $game['title'] }}
                    </a>
                </td>
                <td>{{ $game['platform'] }}</td>
                <td>₱{{ number_format($game['price'], 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No games found matching that filter.</td>
            </tr>
        @endforelse
    </table>
</body>
</html>