@extends('app', ['page_title' => 'Cart'])

@section('content')
<div class="row" style="margin: 50px 0;">
    <div class="col-lg-10 offset-lg-1">
        <div class="row">
            <div class="col-12">
                <div style="margin-bottom: 20px;">
                   <h1 class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }}; display: inline;">Cart</h1>
                </div>
                <div style="margin-bottom: 20px;">
                    @if (!isset($cart) || $cart == null || !isset($cart->Items) || count($cart->Items) == 0)
                        You do not have any items in your cart.
                    @else
                        <table class="table table-bordered table-striped table-hover">
                            <tr class="text-center font-weight-bold">
                                <th width="40%">Product</th>
                                <th>Rate (&#x20A6;)</th>
                                <th>Quantity</th>
                                <th>Line Total (&#x20A6;)</th>
                                <th width="5%">&nbsp;</th>
                            </tr>
                            @foreach($cart->Items as $key => $item)
                            <tr>
                                <td>
                                    <span class="font-weight-bold">{{ $site->getProductPlanCode($item->Code)->productPlan->product->name }}</span><br />
                                    <small>Plan: {{ $site->getProductPlanCode($item->Code)->productPlan->name }}<br />Billing: {{ $site->getProductPlanCode($item->Code)->billingInterval->name }}</small>
                                </td>
                                <td class="text-right">{{ number_format($item->Price, 2) }}</td>
                                <td class="text-right">
                                    <a title="Reduce" href="{{ route('cart.reduce', $site->getProductPlanCode($item->Code)->slug()) }}" style="color: #{{ $site->getConfiguration()->colour1 }};"><i class="fas fa-minus"></i></a>
                                    {{ number_format($item->Quantity) }}
                                    <a title="Increase" href="{{ route('cart.add', $site->getProductPlanCode($item->Code)->slug()) }}" style="color: #{{ $site->getConfiguration()->colour1 }};"><i class="fas fa-plus"></i></a>
                                </td>
                                <td class="text-right">{{ number_format($item->TotalCost, 2) }}</td>
                                <td class="text-center">
                                    <a title="Remove" href="{{ route('cart.remove', $site->getProductPlanCode($item->Code)->slug()) }}"><i class="fas fa-times text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
