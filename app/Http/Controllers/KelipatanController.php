<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelipatanController extends Controller
{
    public function index(Request $request)
    {
        $result = [];
        $pbp2 = 0;

        if ($request->maksimal) {
            $validated = $request->validate([
                'maksimal' => 'required|numeric'
            ]);

            for ($i = 1; $i <= $validated['maksimal']; $i++) {
                if ($pbp2 == 5) {
                    break;
                }

                // Kelipatan 3 dan 5
                if (($i % 3 == 0) && ($i % 5 == 0)) {
                    $result[] = "Pasar 20 Belanja Pangan ({$i} kelipatan dari 3 dan 5)";
                    $pbp2++;
                } else {
                    // Kelipatan 3
                    if ($i % 3 == 0) {
                        if ($pbp2 == 2) {
                            $result[] = "Belanja pangan ({$i} kelipatan dari 3)";
                        } else {
                            $result[] = "Pasar20 ({$i} kelipatan dari 3)";
                        }
                    }

                    // Kelipatan 5
                    if ($i % 5 == 0) {
                        if ($pbp2 == 2) {
                            $result[] = "Pasar20 ({$i} kelipatan dari 5)";
                        } else {
                            $result[] = "Belanja Pangan ({$i} kelipatan dari 5)";
                        }
                    }
                }
            }
        }

        return view('kelipatan', compact('result', 'pbp2'));
    }
}
