@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">

        <style type="text/css">
            body
            {
                font-family: Arial;
                font-size: 10pt;
            }
            table
            {
                border: 1px solid #ccc;
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
                border: 1px solid #ccc;
            }
        </style>

        <form action="{{ route('admin.report.search') }}" method="GET">
            <div class="row mt-2 mb-2 ml-2 border-bottom">
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Month's Select</label>
                            <select class="form-control month" name="months">
                                <option value="" disabled selected>Select a month's....</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Year</label>
                            <select name="year" class="form-control year">
                                <option value="" disabled selected>Select year.....</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col" style="margin-top: 30px">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="table-responsive" id="tblCustomers" cellspacing="0" cellpadding="0">
            <div class="brand-category bg-primary">
                <div class="text-center text-white">All Bill History</div>
            </div>

            <table class="table bg-white mt-3" cellspacing="0" cellpadding="0">
              <thead class="thead-light">
                <tr>
                  <th>Connection Name</th>
                  <th>Ip Address</th>
                  <th>Connection Type</th>
                  <th>Bill Type</th>
                  <th>Zone Name</th>
                  <th>Subzone Name</th>
                  <th>Collection Date</th>
                  <th>Month</th>
                  <th>Year</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($bills as $bill)
                  <tr>
                    <td> {{$bill->connection_name}} </td>
                    <td> {{$bill->ip_address}} </td>
                    <td> {{$bill->connection_type}} </td>
                    <td> {{$bill->bill_type}} </td>
                    <td> {{$bill->zone_name}} </td>
                    <td> {{$bill->subzone_name}} </td>
                    <td> {{$bill->collection_date}} </td>
                    <td> {{$bill->month}} </td>
                    <td> {{$bill->year}} </td>
                    <td> {{$bill->amount}} </td>
                  </tr>
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
                    <td class="font-weight-bold">Total Amount</td>
                    <td class="font-weight-bold">{{ $totalAmount }}</td>
                </tr>
              </tbody>
            </table>
        </div>
        <input type="button" id="btnExport" class="btn btn-warning" value="Print" />
    </div>
    
@endsection