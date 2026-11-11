<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaterLog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WaterController extends Controller
{
    // Obtener o registrar los vasos del día actual
    public function getTodayLog()
    {
        $userId = Auth::id();
        $today = Carbon::today()->toDateString();

        $log = WaterLog::firstOrCreate(
            ['user_id' => $userId, 'log_date' => $today],
            ['glasses_count' => 0]
        );

        return response()->json(['glasses' => $log->glasses_count]);
    }

    // Actualizar/incrementar los vasos consumidos
    public function update(Request $request)
    {
        $userId = Auth::id();
        $today = Carbon::today()->toDateString();

        $log = WaterLog::firstOrCreate(
            ['user_id' => $userId, 'log_date' => $today],
            ['glasses_count' => 0]
        );

        // Actualizamos con el valor recibido o incrementamos
        $log->glasses_count = $request->input('glasses_count', $log->glasses_count + 1);
        $log->save();

        return response()->json([
            'success' => true,
            'glasses' => $log->glasses_count
        ]);
    }
}