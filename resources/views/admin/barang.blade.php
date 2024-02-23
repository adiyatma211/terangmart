@extends('base.app')
@section('konten')
<div class="row" id="table-bordered">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Barang</h4>
                <a  href="barang/tambah" class="btn btn-primary">
                    Tambah
                </a>
            </div>
            <div class="card-content">
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-hover mb-0 table-responsiv">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>Gambar</th>
                                <th>Category</th>
                                <th>Keterangan</th>
                                <th>Quantiti</th>
                                <th>Harga</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $a)
                            <tr>
                                <td class="text-bold-500">{{$a->name}}</td>
                                <td>{{$a->image}}</td>
                                <td>{{$a->category->name}}</td>
                                <td class="text-bold-500">{{$a->deskripsi}}</td>
                                <td>{{$a->stok}}</td>
                                <td>{{$a->harga}}</td>
                                <td><a href="/category/edit/" type="button" class="btn btn-primary">
                                    Edit
                                </a>
                                <a href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus?')) { document.getElementById('delete-form-').submit(); }" type="button" class="btn btn-danger">
                                    Delete
                                </a>
                                {{-- Form untuk delete --}}
                                <form id="delete-form-" action="/category/destroy/" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection