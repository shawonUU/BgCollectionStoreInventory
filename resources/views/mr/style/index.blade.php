@php
    $style_page = true;
@endphp
@extends('layouts.app')
@section('css')
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="br-section-wrapper mt-4">
            <div class="d-flex justify-content-between  mb-3">
                <div>
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 ">Search Order wise style</h6>
                </div>
                <div>
                    <a href="{{ url()->previous() }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-6 col-xs-6 col-sm-6">
                    <select class="form-control" id="orderId" onchange="redirect()">
                        <option selected disabled hidden value="">--All Order --</option>
                        @foreach (DB::table('orders')->get(['id', 'order_no']) as $order)
                            <option {{ $order_id == $order->id ? 'selected' : '' }}
                                value="{{ Crypt::encrypt($order->id) }}">
                                {{ $order->order_no }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="order_table">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Style No</th>
                            <th>Total Accessories</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Updated By</th>
                            <th>Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($styles as $style)
                            @php
                                $style_id = Crypt::encrypt($style->id);
                            @endphp
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $style->style_no }}</td>
                                <td>{{ total_accessories($style->id) }}</td>
                                <td>
                                    <a class="btn btn-{{ $style->status == 1 ? 'success' : 'info' }} text-capetalize"
                                        href="{{ route('style_update.status', $style_id) }}">
                                        {{ get_style_status($style->status) }}</a>
                                </td>
                                <td class="text-capitalize"><span
                                        class="badge bg-primary">{{ get_user_name($style->created_by) }}</span> </td>
                                <td class="text-capitalize"><span
                                        class="badge bg-{{ $style->updated_by ? 'info' : 'secondary' }}">{{ $style->updated_by ? get_user_name($style->updated_by) : 'not update' }}</span>
                                </td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="{{ route('inventory.list', $style_id) }}" class="dropdown-item"><i
                                                    class="fa fa-eye"></i> View Inventories</a>
                                            @if (auth()->user()->role_id != 5)
                                                <a href="{{ route('style.edit', $style_id) }}" class="dropdown-item"><i
                                                        class="fa fa-pencil"></i> Edit</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function redirect() {
            var orderId = $('#orderId').val();
            window.location.href = "{{ route('style.index') }}" + '/' + orderId;
        }
    </script>
@endsection
