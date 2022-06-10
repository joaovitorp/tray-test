<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\SellerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        return response()->json($this->sellerRepository->createSeller($request->all()), 201);
    }
}
