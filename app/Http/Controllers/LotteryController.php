<?php

namespace App\Http\Controllers;

use App\Lot;
use App\Lottery;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function index()
    {
        return view('lottery.index');
    }

    public function create()
    {
        $lottery = new Lottery;
        $lottery->uname = uniqid();
        $lottery->save();

        return redirect()->secure("/k/{$lottery->uname}/edit");
    }

    public function edit($uname)
    {
        $lottery = Lottery::findAddableLotteryByUname($uname);
        if (!$lottery) {
            return redirect("/k/{$uname}");
        }
        $lottery->deadline_at = strtotime('+ ' . config('lottery.deadline'), strtotime($lottery->created_at));

        return view('lottery.edit', ['lottery' => $lottery]);

    }

    public function show($uname)
    {
        $lottery = Lottery::where('uname', $uname)
                    ->first();
        if (!$lottery) {
            abort(404);
        }

        return view('lottery.show', ['lottery' => $lottery]);
    }

    public function result($uname)
    {
        $lottery = Lottery::where('uname', $uname)
                    ->first();
        if (!$lottery) {
            abort(404);
        }

        $lot = Lot::findRandomByLotteryId($lottery->id);

        return view('lottery.result', [
            'lottery'   => $lottery,
            'lot'       => $lot
        ]);
    }
}
