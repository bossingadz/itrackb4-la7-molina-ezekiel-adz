@extends('layouts.app')

@section('title', $game['title'] . ' - Product Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0">{{ $game['title'] }}</h3>
                
                @if($game['price'] > 2000)
                    <span class="badge bg-warning text-dark">Premium Game</span>
                @endif
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item"><strong>ID:</strong> {{ $game['id'] }}</li>
                    <li class="list-group-item"><strong>Platform / Type:</strong> {{ $game['platform'] }}</li>
                    <li class="list-group-item"><strong>Price:</strong> ₱{{ number_format($game['price'], 2) }}</li>
                    <li class="list-group-item"><strong>In Stock:</strong> {{ $game['stock'] }} units available</li>
                </ul>

                <a href="{{ route('monsterhunter.index') }}" class="btn btn-secondary">
                    &larr; Back to Games List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection