@extends('base.app')
@section('konten')
<div class="row" id="table-bordered">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Category Barang</h4>
            </div>
            <div class="card-content">
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-hover mb-0 table-responsiv">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>RATE</th>
                                <th>SKILL</th>
                                <th>TYPE</th>
                                <th>LOCATION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-bold-500">Michael Right</td>
                                <td>$15/hr</td>
                                <td class="text-bold-500">UI/UX</td>
                                <td>Remote</td>
                                <td>Austin,Taxes</td>
                                <td><a href="#"><i
                                            class="badge-circle badge-circle-light-secondary font-medium-1"
                                            data-feather="mail"></i></a>
                                            <a href="#"><i
                                                class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="mail"></i></a>
                                                <a href="#"><i
                                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                                    data-feather="mail"></i></a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection