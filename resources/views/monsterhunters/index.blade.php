@extends('layouts.app')

@section('title', 'All Monster Hunter Games')

@section('content')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Monster Hunter Games List</h2>
        
        @if(isset($activeFilter) && $activeFilter)
            <span class="badge bg-info text-dark">Filter Active: {{ $activeFilter }}</span>
        @else
            <span class="badge bg-secondary">Showing All Items</span>
        @endif
    </div>

    <table class="table table-striped table-hover align-middle border">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Platform / Type</th>
                <th>Price</th>
                <th>Stock Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($games as $game)
                <tr>
                    <td><strong>{{ $loop->iteration }}</strong></td>
                    <td>
                        <a href="{{ route('monsterhunters.show', ['monsterhunter' => $game['id']]) }}" class="text-decoration-none fw-bold">
                            {{ $game['title'] }}
                        </a>
                    </td>
                    <td>{{ $game['platform'] }}</td>
                    <td>₱{{ number_format($game['price'], 2) }}</td>
                    <td>
                        @if($game['price'] > 2000)
                            <span class="badge bg-danger">Premium Release</span>
                        @else
                            <span class="badge bg-success">Standard Edition</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">
                        <em>No Monster Hunter products match your filter parameters. Please select a different filter.</em>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection