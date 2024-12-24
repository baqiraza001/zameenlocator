<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SocietyMap;
use Illuminate\Http\Request;

class SocietyMapController extends Controller
{
    /**
     * Get paginated list of maps.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request, $page = 1)
    {
        $excludedIds = [388, 375, 389, 391, 14, 370, 395, 394, 393, 407, 408, 411, 404, 409, 406, 405];

        $maps = SocietyMap::whereNotIn('id', $excludedIds)
        ->orderBy('id', 'DESC')
        ->paginate(6, ['*'], 'page', $page); // Pass the page number

        return response()->json([
            'success' => true,
            'data' => $maps->items(),
            'current_page' => $maps->currentPage(),
            'last_page' => $maps->lastPage(),
            'total' => $maps->total(),
        ]);
    }

}
