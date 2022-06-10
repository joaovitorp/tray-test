@component('mail::message')
# Relatório de vendas

Olá {{ $sellerWithSales['name'] }} <br>

Valor total em vendas: **R$ {{ number_format($sellerWithSales['total_sales'], 2, ',', '.') }}**

Att,<br>
{{ config('app.name') }}
@endcomponent
