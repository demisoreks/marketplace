@extends('admin.app', ['page_title' => 'Administrators', 'menu' => 'settings'])

@section('content')
<div class="row">
    <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-sm" href="{{ route('administrators.create') }}" style="background-color: #{{ $site->getConfiguration()->colour1 }}; color: #fff;"><i class="fas fa-plus"></i> New Administrator</a>
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
                                    <th><strong>NAME</strong></th>
                                    <th><strong>EMAIL ADDRESS</strong></th>
                                    <th><strong>SUPER ADMIN</strong></th>
                                    <th width="10%" data-priority="1">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($active_administrators as $administrator)
                                <tr>
                                    <td>{{ $administrator->name }}</td>
                                    <td>{{ $administrator->email }}</td>
                                    <td>@if ($administrator->super) Yes @else No @endif</td>
                                    <td class="text-center">
                                        <a title="Edit" href="{{ route('administrators.edit', [$administrator->slug()]) }}" style="color: #{{ $site->getConfiguration()->colour1 }};"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                        <a title="Disable" href="{{ route('administrators.disable', [$administrator->slug()]) }}" onclick="return confirmDisable()"><i class="fas fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-white text-primary" id="heading32" style="padding: 0;">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse32" aria-expanded="true" aria-controls="collapse32">
                            <strong>Disabled</strong>
                        </button>
                    </h5>
                </div>
                <div id="collapse32" class="collapse" aria-labelledby="heading32" data-parent="#accordion2">
                    <div class="card-body">
                        <table id="myTable2" class="display-1 table table-condensed table-hover table-striped responsive" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th><strong>NAME</strong></th>
                                    <th><strong>EMAIL ADDRESS</strong></th>
                                    <th><strong>SUPER ADMIN</strong></th>
                                    <th width="10%" data-priority="1">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($disabled_administrators as $administrator)
                                <tr>
                                    <td>{{ $administrator->name }}</td>
                                    <td>{{ $administrator->email }}</td>
                                    <td>@if ($administrator->super) Yes @else No @endif</td>
                                    <td class="text-center">
                                        <a title="Enable" href="{{ route('administrators.enable', [$administrator->slug()]) }}" style="color: #{{ $site->getConfiguration()->colour1 }};"><i class="fas fa-undo"></i></a>
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
