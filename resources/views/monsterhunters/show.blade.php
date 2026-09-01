<!DOCTYPE html>
<html>
<head>
    <title>{{ $game['title'] }} - Detail Page</title>
</head>
<body>
    <header>
        <p>Prepared by: <strong>Ezekiel Adz F. Molina</strong></p>
    </header>

    <main>
        <h1>{{ $game['title'] }}</h1>

        <ul>
            <li><strong>ID:</strong> {{ $game['id'] }}</li>
            <li><strong>Type / Platform:</strong> {{ $game['platform'] }}</li>
            <li><strong>Price:</strong> ₱{{ number_format($game['price'], 2) }}</li>
        </ul>

        <p>
            <a href="{{ route('monsterhunter.index') }}">← Back to All Games</a>
        </p>
    </main>
</body>
</html>