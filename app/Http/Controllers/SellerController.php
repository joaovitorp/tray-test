<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellerRequest;
use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Services\SellerService;
use Illuminate\Http\JsonResponse;

class SellerController extends Controller
{
    protected $sellerService;

    public function __construct(SellerService $sellerService)
    {
        $this->sellerService = $sellerService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->sellerService->index());
    }

    public function store(StoreSellerRequest $request)
    {
        return response()->json($this->sellerService->store($request->validated()), 201);
    }
}
