<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VelhaRanking;
use http\Client\Response;
use Illuminate\Http\Request;

class RegisteRankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        foreach ($request->jogadores as $player){
            VelhaRanking::create([
                'playerName' => $player['nome'],
                'points' => $player['pontuacao'],
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Ranking Registrado.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $ranking = VelhaRanking::orderBy('points', 'DESC')->get()->groupBy('playerName');
        $topRanking = VelhaRanking::orderBy('points', 'DESC')

            ->get(['points','playerName']);


        $rankingGrouped = $topRanking->groupBy('playerName')
            ->map(function ($group) {
                return $group->take(5);
            });
        $ranking = VelhaRanking::orderBy('points', 'DESC')
            ->paginate(5)
            ->groupBy('playerName')
            ->map(function ($group) {
                return $group->take(1);
            })
        ;
        // $data = [];
        // // return $rankingGrouped->count();
        // for ($i = 0; $rankingGrouped->count() < 5; $i++ ){
        //     $data[] = $rankingGrouped;
        // }

        return response()->json($ranking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
