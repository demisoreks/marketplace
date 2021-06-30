@extends('pos.app', ['page_title' => 'Sales', 'menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-sm" href="{{ route('pos.sales.index') }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-arrow-left"></i> Back to List of Sales</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="alert alert-secondary">
            <span class="font-weight-bold">Customer:</span> {{ $customer->company_name }}<br />
            <span class="font-weight-bold">Currency:</span> {{ $sale->currency }}
            <small>
            @if ($sale->currency == "USD")
                <a href="{{ route('pos.sales.currency', [$sale->slug(), 'NGN']) }}">Switch to NGN</a>
            @else
                <a href="{{ route('pos.sales.currency', [$sale->slug(), 'USD']) }}">Switch to USD</a>
            @endif
            </small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <legend>Products</legend>
        <table id="myTable2" class="display-1 table table-condensed table-hover table-striped responsive" width="100%">
            <thead>
                <tr class="text-center">
                    <th><strong>PRODUCT</strong></th>
                    <th><strong>PRICE</strong></th>
                    <th width="10%" data-priority="1">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                @php
                    if ($sale->currency == "NGN") {
                        $product->price *= 500;
                    }
                @endphp
                <tr>
                    <td>{{ $product->name }}</td>
                    <td class="text-right">{{ number_format($product->price, 2) }}</td>
                    <td>
                        <a title="Add to Cart" class="btn btn-sm" href="{{ route('pos.sales.add', [$sale->slug(), $product->id]) }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fa fa-plus"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <legend>Cart</legend>
        @if ($sales_items->count() == 0)
        Cart is empty.
        @else
        <table class="table table-condensed table-hover table-striped">
            @php
                $total_price = 0;
            @endphp
            @foreach ($sales_items as $sales_item)
            @php
                $price = $sales_item->unit_price * $sales_item->quantity;
                if ($sale->currency == "NGN") {
                    $price *= 500;
                }
                $total_price += $price;
            @endphp
            <tr>
                <td>{{ $sales_item->product }}</td>
                <td class="text-center">
                    <a title="Reduce" href="{{ route('pos.sales.reduce', [$sales_item->slug()]) }}" style="color: #{{ $site->getConfiguration()->colour1 }};"><i class="fas fa-minus"></i></a>
                    {{ $sales_item->quantity }}
                    <a title="Increase" href="{{ route('pos.sales.increase', [$sales_item->slug()]) }}" style="color: #{{ $site->getConfiguration()->colour1 }};"><i class="fas fa-plus"></i></a>
                </td>
                <td class="text-right">{{ number_format($price, 2) }}</td>
                <td class="text-center">
                    <a title="Remove" href="{{ route('pos.sales.remove', [$sales_item->slug()]) }}" style="color: #{{ $site->getConfiguration()->colour1 }};"><i class="fas fa-times"></i></a>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="2" class="font-weight-bold">Total</td>
                <td class="text-right font-weight-bold">{{ number_format($total_price, 2) }}</td>
                <td>&nbsp;</td>
            </tr>
        </table>
        @endif

        {!! Form::model(null, ['route' => ['pos.sales.checkout', $sale->slug()], 'class' => 'form-group']) !!}
        <div class="form-group row">
            {!! Form::label('pay_with', 'Pay Options *', ['class' => 'col-md-4 col-form-label']) !!}
            <div class="col-md-8">
                {!! Form::select('pay_with', ['credit' => 'Use Credit', 'customer' => 'Send Payment Request to Customer', 'now' => 'Pay Now'], $value = null, ['class' => 'form-control', 'placeholder' => '- Select Option -', 'required' => true]) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-sm" style="color: #fff; background-color: #{{ $site->getConfiguration()->colour1 }};">Checkout</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
