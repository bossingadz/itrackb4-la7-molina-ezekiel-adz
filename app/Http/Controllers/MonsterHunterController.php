<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class MonsterHunterController extends Controller
{
    private function getProducts(): array
    {
        $path = storage_path('app/monsterhunter.json');
        $products = json_decode(file_get_contents($path), true);

        return is_array($products) ? array_column($products, null, 'id') : [];
    }

    private function saveMonsterHunters(array $monsterhunters)
    {
        file_put_contents(
            storage_path('app/monsterhunter.json'),
            json_encode($monsterhunters, JSON_PRETTY_PRINT)
        );
    }

    public function index(Request $request)
    {
        $games = $this->getProducts();

        $platform = $request->query('platform', 'all');
        $priceRange = $request->query('price_range', 'all');

        $filteredGames = [];

        foreach ($games as $id => $game) {
            $matchesPlatform = ($platform === 'all' || strtolower($game['platform']) === strtolower($platform));

            $matchesPrice = true;
            if ($priceRange === 'budget') {
                $matchesPrice = ($game['price'] <= 1500);
            } elseif ($priceRange === 'premium') {
                $matchesPrice = ($game['price'] > 1500);
            }

            if ($matchesPlatform && $matchesPrice) {
                $filteredGames[$id] = $game;
            }
        }

        return view('monsterhunters.index', [
            'games' => $filteredGames,
            'currentPlatform' => $platform,
            'currentPriceRange' => $priceRange,
        ]);
    }

    public function create()
    {
        return view('monsterhunters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:200',
            'platform' => 'required|in:Base Game,Expansion',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:1|max:100',
        ]);

        $monsterhunters = $this->getProducts();
        $id = max(array_keys($monsterhunters)) + 1;

        $monsterhunters[$id] = [
            'id' => $id,
            'title' => $request->input('title'),
            'platform' => $request->input('platform'),
            'price' => (float) $request->input('price'),
            'stock' => (int) $request->input('stock'),
        ];

        $this->saveMonsterHunters($monsterhunters);

        return redirect()->route('monsterhunters.index')
            ->with('success', 'New record added successfully!');
    }

    public function show(string $id)
    {
        $games = $this->getProducts();
        if (!isset($games[$id])) abort(404);

        $game = $games[$id];
        return view('monsterhunters.show', compact('game'));
    }

    public function featured()
    {
        $games = $this->getProducts();
        $game = $games[5] ?? abort(404);
        return view('monsterhunters.show', compact('game'));
    }

    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}