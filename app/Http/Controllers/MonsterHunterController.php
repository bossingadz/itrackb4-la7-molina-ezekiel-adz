<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonsterHunterController extends Controller
{
    private function getProducts(): array
    {
        return [
            1 => ['id' => 1, 'title' => 'Monster Hunter: World', 'price' => 1290.00, 'platform' => 'Base Game', 'stock' => 12],
            2 => ['id' => 2, 'title' => 'Monster Hunter World: Iceborne', 'price' => 1290.00, 'platform' => 'Expansion', 'stock' => 8],
            3 => ['id' => 3, 'title' => 'Monster Hunter Rise', 'price' => 1790.00, 'platform' => 'Base Game', 'stock' => 14],
            4 => ['id' => 4, 'title' => 'Monster Hunter Rise: Sunbreak', 'price' => 1790.00, 'platform' => 'Expansion', 'stock' => 9],
            5 => ['id' => 5, 'title' => 'Monster Hunter Wilds', 'price' => 3300.00, 'platform' => 'Base Game', 'stock' => 7],
            6 => ['id' => 6, 'title' => 'Monster Hunter Generations Ultimate', 'price' => 1100.00, 'platform' => 'Base Game', 'stock' => 16],
        ];
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

    public function show(string $id)
    {
        $games = $this->getProducts();

        if (!isset($games[$id])) {
            abort(404);
        }

        $game = $games[$id];

        return view('monsterhunters.show', compact('game'));
    }

    public function featured()
    {
        $games = $this->getProducts();
        $game = $games[5] ?? abort(404);

        return view('monsterhunters.show', compact('game'));
    }

    public function create() {}
    public function store(Request $request) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}