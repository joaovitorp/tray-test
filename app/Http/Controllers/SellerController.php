<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellerRequest;
use App\Repositories\Contracts\SellerRepositoryInterface;
use Illuminate\Http\JsonResponse;
class SellerController extends Controller
{

    protected $sellerRepository;

    public function __construct(SellerRepositoryInterface $sellerRepository)
    {
        $this->sellerRepository = $sellerRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->sellerRepository->getAllSellers());
    }

    public function store(StoreSellerRequest $request)
    {
        return response()->json($this->sellerRepository->createSeller($request->validated()), 201);
    }
}
