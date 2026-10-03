@extends('layouts.app')
@section('title', 'Monster Hunter List')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <h1 class="h2 mb-0">Monster Hunter Games List</h1>
    <a class="btn btn-primary" href="{{ route('monsterhunters.create') }}">Add New Game</a>
</div>

<p class="text-secondary mb-3"><strong>Active filters:</strong> {{ $currentPlatform }} · {{ $currentPriceRange }}</p>

<section class="mb-4" aria-label="Game filters">
    <div class="mb-3">
        <span class="fw-semibold me-2">Platform</span>
        <div class="d-inline-flex flex-wrap gap-2">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('monsterhunters.index', ['platform' => 'all', 'price_range' => $currentPriceRange]) }}">All</a>
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('monsterhunters.index', ['platform' => 'Base Game', 'price_range' => $currentPriceRange]) }}">Base Games</a>
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('monsterhunters.index', ['platform' => 'Expansion', 'price_range' => $currentPriceRange]) }}">Expansions</a>
        </div>
    </div>

    <div>
        <span class="fw-semibold me-2">Price</span>
        <div class="d-inline-flex flex-wrap gap-2">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('monsterhunters.index', ['platform' => $currentPlatform, 'price_range' => 'all']) }}">All Prices</a>
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('monsterhunters.index', ['platform' => $currentPlatform, 'price_range' => 'budget']) }}">Under ₱1,500</a>
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('monsterhunters.index', ['platform' => $currentPlatform, 'price_range' => 'premium']) }}">Over ₱1,500</a>
        </div>
    </div>

    <a class="btn btn-sm btn-link px-0 mt-2" href="{{ route('monsterhunters.index') }}">Clear all filters</a>
</section>

<div class="table-responsive">
<table class="table table-striped table-hover align-middle mb-0">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Platform</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($games as $game)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ route('monsterhunters.show', ['monsterhunter' => $game['id']]) }}">
                        {{ $game['title'] }}
                    </a>
                </td>
                <td>{{ $game['platform'] }}</td>
                <td>₱{{ number_format($game['price'], 2) }}</td>
                <td>{{ $game['stock'] }}</td>
            </tr>
        @empty
            <tr>
                <td class="text-center text-secondary py-4" colspan="5">No games found matching that filter.</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
<p class="text-center text-muted mt-4">Prepared By: Ezekiel Adz F. Molina | BSIT 4C</p>
@endsection