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
                        @include('commons.alert')
                        <table class="table table-bordered table-striped table-hover">
                            <tr class="text-center font-weight-bold">
                                <th width="40%">Product</th>
                                <th>Rate (&#x20A6;)</th>
                                <th>Quantity</th>
                                <th>Line Total (&#x20A6;)</th>
                                <th width="5%">&nbsp;</th>
                            </tr>
                            @php
                                $total = 0;
                            @endphp
                            @foreach($cart->Items as $key => $item)
                            <tr>
                                <td>
                                    <span class="font-weight-bold"><a href="{{ route('product', $site->getProductPlanCode($item->Code)->productPlan->product->slug()) }}">{{ $site->getProductPlanCode($item->Code)->productPlan->product->name }}</a></span><br />
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
                            @php
                                $total += $item->TotalCost;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="3" class="font-weight-bold">Sub Total</td>
                                <td class="text-right font-weight-bold">{{ number_format($total, 2) }}</td>
                                <td>&nbsp;</td>
                            </tr>
                            @if ($site->getConfiguration()->vat_percent > 0)
                            @php
                                $vat = ($site->getConfiguration()->vat_percent / 100) * $total;
                                $total += $vat;
                            @endphp
                            <tr>
                                <td colspan="3">VAT ({{ $site->getConfiguration()->vat_percent }}%)</td>
                                <td class="text-right">{{ number_format($vat, 2) }}</td>
                                <td>&nbsp;</td>
                            </tr>
                            @endif
                            @php
                                if ($site->getConfiguration()->fixed_charge > 0) {
                                    $charge = $site->getConfiguration()->fixed_charge;
                                } else if ($site->getConfiguration()->percent_charge > 0) {
                                    $charge = ($site->getConfiguration()->percent_charge / 100) * $total;
                                    if ($charge > $site->getConfiguration()->max_charge && $site->getConfiguration()->max_charge > 0) {
                                        $charge = $site->getConfiguration()->max_charge;
                                    }
                                } else {
                                    $charge = 0;
                                }
                            @endphp
                            @if ($charge > 0)
                            @php
                                $total += $charge;
                            @endphp
                            <tr>
                                <td colspan="3">Transaction Charge</td>
                                <td class="text-right">{{ number_format($charge, 2) }}</td>
                                <td>&nbsp;</td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="3" class="font-weight-bold">Grand Total</td>
                                <td class="text-right font-weight-bold">{{ number_format($total, 2) }}</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                        @if (Cookie::has('icommerce_customer'))
                        {!! Form::open(['route' => 'checkout', 'class' => 'form-group']) !!}
                        <div class="form-group">
                            {!! Form::hidden('amount', round($total, 2), ['step' => 0.01, 'class' => 'col-12 form-control']) !!}
                            <button type="submit" class="btn btn-block" style="background-color: transparent; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; color: #{{ $site->getConfiguration()->colour1 }}; border-radius: 0;">Checkout</button>
                        </div>
                        {!! Form::close() !!}
                        @else
                        <a class="btn btn-block" href="{{ route('login', ['do' => 'checkout']) }}" style="background-color: transparent; border: 1px solid #{{ $site->getConfiguration()->colour1 }}; color: #{{ $site->getConfiguration()->colour1 }}; border-radius: 0;">Log in to proceed to checkout</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
