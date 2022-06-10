<?php

namespace App\Http\Controllers;

use App\Services\SaleService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    public function index()
    {

    }

    public function store(Request $request, $sellerId)
    {
        $this->saleService = $this->saleService->launchNewSaleToSeller($request->value, $sellerId);
        return response()->json();
    }
}
