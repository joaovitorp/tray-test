<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowSalesRequest;
use App\Http\Requests\StoreSaleRequest;
use App\Services\SaleService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    public function index(ShowSalesRequest $request)
    {
        $sellerId = $request->validated()['seller_id'];
        return response()->json($this->saleService->showSalesBySellerId($sellerId), 200);
    }

    public function store(StoreSaleRequest $request)
    {
        return response()->json($this->saleService->launchNewSaleToSeller($request->validated()), 201);
    }
}
