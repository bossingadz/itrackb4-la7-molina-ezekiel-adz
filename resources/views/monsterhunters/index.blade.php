@extends('layouts.app')

@section('title', 'Monster Hunter Games')

@section('content')
<h2>Monster Hunter Games List</h2>

<p>
    <strong>Active Filters:</strong> 
    Platform: {{ $currentPlatform }} | Price Range: {{ $currentPriceRange }}
</p>

<div>
    <p>
        <strong>Platform:</strong>
        <a href="{{ route('monsterhunter.index', ['platform' => 'all', 'price_range' => $currentPriceRange]) }}">All</a> |
        <a href="{{ route('monsterhunter.index', ['platform' => 'Base Game', 'price_range' => $currentPriceRange]) }}">Base Games</a> |
        <a href="{{ route('monsterhunter.index', ['platform' => 'Expansion', 'price_range' => $currentPriceRange]) }}">Expansions</a>
    </p>

    <p>
        <strong>Price:</strong>
        <a href="{{ route('monsterhunter.index', ['platform' => $currentPlatform, 'price_range' => 'all']) }}">All Prices</a> |
        <a href="{{ route('monsterhunter.index', ['platform' => $currentPlatform, 'price_range' => 'budget']) }}">Under ₱1,500</a> |
        <a href="{{ route('monsterhunter.index', ['platform' => $currentPlatform, 'price_range' => 'premium']) }}">Over ₱1,500</a>
    </p>

    <p>
        <a href="{{ route('monsterhunter.index') }}">Clear All Filters</a>
    </p>
</div>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Type/Platform</th>
            <th>Price</th>
            <th>Tag</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($games as $game)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ route('monsterhunter.show', ['monsterhunter' => $game['id']]) }}">
                        {{ $game['title'] }}
                    </a>
                </td>
                <td>{{ $game['platform'] }}</td>
                <td>₱{{ number_format($game['price'], 2) }}</td>
                <td>
                    @if($game['price'] > 2000)
                        Premium
                    @else
                        Standard
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No games found matching that filter.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection