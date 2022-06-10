<?php

namespace App\Console\Commands;

use App\Mail\SaleReportEmail;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailSalesReportSellerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seller:emailSalesReport';
    protected $sellerRepository;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send report sales to sellers e-mail';

    public function __construct(SellerRepositoryInterface $sellerRepository)
    {
        $this->sellerRepository = $sellerRepository;
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->sellerRepository->getAllSellersAndSumSalesTotal()->map(function($sellerSales) {
            Mail::to($sellerSales['email'])->send( new SaleReportEmail($sellerSales->toArray()));
        });
    }
}
