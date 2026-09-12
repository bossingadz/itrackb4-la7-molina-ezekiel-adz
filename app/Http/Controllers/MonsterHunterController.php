<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonsterHunterController extends Controller
{
    public function index()
    {
        $games = $this->getProducts();

        return view('monsterhunters.index', compact('games'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function featured()
    {
        $games = $this->getProducts();
        $game = $games[5] ?? abort(404);

        return view('monsterhunters.show', compact('game'));
    }

    public function filter($value = null)
    {
        $games = $this->getProducts();
        $activeFilter = $value;

        if ($value) {
            $filteredGames = [];
            foreach ($games as $id => $game) {
                if (strtolower($game['platform']) === strtolower($value)) {
                    $filteredGames[$id] = $game;
                }
            }
            $games = $filteredGames;
        }

        return view('monsterhunters.index', compact('games', 'activeFilter'));
    }

    private function getProducts(): array
    {
        return [
            1 => ['id' => 1, 'title' => 'Monster Hunter: World', 'price' => 1290.00, 'stock' => 85, 'platform' => 'Base Game'],
            2 => ['id' => 2, 'title' => 'Monster Hunter World: Iceborne', 'price' => 1290.00, 'stock' => 42, 'platform' => 'Expansion'],
            3 => ['id' => 3, 'title' => 'Monster Hunter Rise', 'price' => 1790.00, 'stock' => 60, 'platform' => 'Base Game'],
            4 => ['id' => 4, 'title' => 'Monster Hunter Rise: Sunbreak', 'price' => 1790.00, 'stock' => 35, 'platform' => 'Expansion'],
            5 => ['id' => 5, 'title' => 'Monster Hunter Wilds', 'price' => 3300.00, 'stock' => 99, 'platform' => 'Base Game'],
            6 => ['id' => 6, 'title' => 'Monster Hunter Generations Ultimate', 'price' => 1100.00, 'stock' => 20, 'platform' => 'Base Game'],
        ];
    }
}