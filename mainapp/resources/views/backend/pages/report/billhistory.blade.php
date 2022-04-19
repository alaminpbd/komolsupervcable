@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">

        <style type="text/css">
            body
            {
                font-family: Arial;
                font-size: 9pt;
            }
            table
            {
                border: 1px solid #ddd;
                border-collapse: collapse;
            }
            table th
            {
                background-color: #F7F7F7;
                color: #333;
                font-weight: bold;
            }
            table th, table td
            {
                padding: 5px;
                border: 1px solid #ddd;
            }

        </style>

        <div class="table-responsive" id="tblCustomers" cellspacing="0" cellpadding="0">
            <div class="brand-category bg-primary">
                <div class="text-center text-white">Bill of Month's History</div>
            </div>

            <table class="table bg-white mt-3" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Ip Address</th>
                        <th>Connection Name</th>
                        <th>January</th>
                        <th>February</th>
                        <th>March</th>
                        <th>April</th>
                        <th>May</th>
                        <th>June</th>
                        <th>July</th>
                        <th>August</th>
                        <th>September</th>
                        <th>October</th>
                        <th>November</th>
                        <th>December</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $january = '';
                        $february = '';
                        $march = '';
                        $april = '';
                        $may = '';
                        $june = '';
                        $july = '';
                        $august = '';
                        $september = '';
                        $october = '';
                        $november = '';
                        $december = '';
                        $jan_col_date = '';
                        $feb_col_date = '';
                        $mar_col_date = '';
                        $apr_col_date = '';
                        $may_col_date = '';
                        $jun_col_date = '';
                        $jul_col_date = '';
                        $aug_col_date = '';
                        $sep_col_date = '';
                        $oct_col_date = '';
                        $nov_col_date = '';
                        $dec_col_date = '';
                    @endphp
                    @foreach ($connection as $con)
                        <tr>
                            <td> {{$con->ip_address}} </td>
                            <td> {{$con->user_name}} </td>

                            @foreach ($con->billings as $bill)
                                @if ($bill->January != '')
                                    @php
                                        $january = $bill->January;
                                        $jan_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->February != '')
                                    @php
                                        $february = $bill->February;
                                        $feb_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->March != '')
                                    @php
                                        $march = $bill->March;
                                        $mar_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->April != '')
                                    @php
                                        $april = $bill->April;
                                        $apr_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->May != '')
                                    @php
                                        $may = $bill->May;
                                        $may_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->June != '')
                                    @php
                                        $june = $bill->June;
                                        $jun_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->July != '')
                                    @php
                                        $july = $bill->July;
                                        $jul_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->August != '')
                                    @php
                                        $august = $bill->August;
                                        $aug_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->September != '')
                                    @php
                                        $september = $bill->September;
                                        $sep_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->October != '')
                                    @php
                                        $october = $bill->October;
                                        $oct_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->November != '')
                                    @php
                                        $november = $bill->November;
                                        $nov_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                                @if ($bill->December != '')
                                    @php
                                        $december = $bill->December;
                                        $dec_col_date = $bill->collection_date;
                                    @endphp
                                @endif

                            @endforeach
                            <td> 
                                {{$january}}<br><span class="badge badge-warning">{{$jan_col_date}}</span>
                            </td>
                            <td>
                                {{$february}}<br><span class="badge badge-warning">{{$feb_col_date}}</span>
                            </td>
                            <td>
                                {{$march}}<br><span class="badge badge-warning">{{$mar_col_date}}</span>
                            </td>
                            <td>
                                {{$april}}<br><span class="badge badge-warning">{{$apr_col_date}}</span>
                            </td>
                            <td>
                                {{$may}}<br><span class="badge badge-warning">{{$may_col_date}}</span>
                            </td>
                            <td>
                                {{$june}}<br><span class="badge badge-warning">{{$jun_col_date}}</span>
                            </td>
                            <td>
                                {{$july}}<br><span class="badge badge-warning">{{$jul_col_date}}</span>
                            </td>
                            <td>
                                {{$august}}<br><span class="badge badge-warning">{{$aug_col_date}}</span>
                            </td>
                            <td>
                                {{$september}}<br><span class="badge badge-warning">{{$sep_col_date}}</span>
                            </td>
                            <td>
                                {{$october}}<br><span class="badge badge-warning">{{$oct_col_date}}</span>
                            </td>
                            <td>
                                {{$november}}<br><span class="badge badge-warning">{{$nov_col_date}}</span>
                            </td>
                            <td>
                                {{$december}}<br><span class="badge badge-warning">{{$dec_col_date}}</span>
                            </td>
                        </tr>
                        @php
                            $january = '';
                            $february = '';
                            $march = '';
                            $april = '';
                            $may = '';
                            $june = '';
                            $july = '';
                            $august = '';
                            $september = '';
                            $october = '';
                            $november = '';
                            $december = '';
                            $jan_col_date = '';
                            $feb_col_date = '';
                            $mar_col_date = '';
                            $apr_col_date = '';
                            $may_col_date = '';
                            $jun_col_date = '';
                            $jul_col_date = '';
                            $aug_col_date = '';
                            $sep_col_date = '';
                            $oct_col_date = '';
                            $nov_col_date = '';
                            $dec_col_date = '';
                        @endphp
                    @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="font-weight-bold border">Total Amount</td>
                        <td class="font-weight-bold border">{{ $totalAmount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="button" id="btnExport" class="btn btn-warning" value="Print" />
    </div>
    
@endsection