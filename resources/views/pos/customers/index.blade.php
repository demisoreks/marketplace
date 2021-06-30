@extends('pos.app', ['page_title' => 'Customers', 'menu' => 'menu'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-sm" href="{{ route('pos.customers.create') }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-plus"></i> New Customer</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div id="accordion2">
            <div class="card">
                <div class="card-header bg-white text-primary" id="heading31" style="padding: 0;">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse31" aria-expanded="true" aria-controls="collapse31">
                            <strong>Active</strong>
                        </button>
                    </h5>
                </div>
                <div id="collapse31" class="collapse show" aria-labelledby="heading31" data-parent="#accordion2">
                    <div class="card-body">
                        <table id="myTable1" class="display-1 table table-condensed table-hover table-striped responsive" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th><strong>COMPANY NAME</strong></th>
                                    <th><strong>PHONE NUMBER</strong></th>
                                    <th><strong>EMAIL ADDRESS</strong></th>
                                    <th width="15%" data-priority="1">&nbsp;</th>
                                    <th width="10%" data-priority="1">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->companyName }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-block" href="{{ route('pos.sales.new', [$customer->id]) }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;">New Sale</a>
                                    </td>
                                    <td class="text-center">
                                        <a title="Edit" href="{{ route('pos.customers.edit', [$customer->id]) }}" style="color: #{{ $site->getConfiguration()->colour1 }};"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
