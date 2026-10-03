@extends('layouts.app')
@section('title', 'Add New Game')
@section('content')
<h2>Add New Game</h2>

<form method="POST" action="{{ route('monsterhunters.store') }}">
    @csrf

    <p>
        <label>Title:</label><br>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title') <span style="color: red;">{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Platform:</label><br>
        <select name="platform">
            <option value="">-- Select --</option>
            <option value="Base Game" @selected(old('platform') == 'Base Game')>Base Game</option>
            <option value="Expansion" @selected(old('platform') == 'Expansion')>Expansion</option>
        </select>
        @error('platform') <span style="color: red;">{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Price (₱):</label><br>
        <input type="text" name="price" value="{{ old('price') }}">
        @error('price') <span style="color: red;">{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Stock Quantity:</label><br>
        <input type="number" name="stock" value="{{ old('stock') }}">
        @error('stock') <span style="color: red;">{{ $message }}</span> @enderror
    </p>

    <p>
        <button type="submit">Save</button>
        <a href="{{ route('monsterhunters.index') }}">Cancel</a>
    </p>
</form>
@endsection