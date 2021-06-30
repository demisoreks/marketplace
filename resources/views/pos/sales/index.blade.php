@extends('pos.app', ['page_title' => 'Sales', 'menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-sm" href="{{ route('pos.sales.create') }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-plus"></i> New Sale</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table id="myTable3" class="display-1 table table-condensed table-hover table-striped responsive" width="100%">
            <thead>
                <tr class="text-center">
                    <th><strong>CREATED AT</strong></th>
                    <th><strong>COMPANY NAME</strong></th>
                    <th><strong>PAYMENT STATUS</strong></th>
                    <th width="10%" data-priority="1">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->created_at }}</td>
                    <td>{{ $sale->company_name }}</td>
                    <td class="text-center">@if ($sale->paid) <span class="badge badge-success">Paid</span> @else <span class="badge badge-warning">Pending</span> @endif</td>
                    <td>
                        <a class="btn btn-sm" href="{{ route('pos.sales.show', [$sale->slug()]) }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;">Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
