@extends('base.app')
@section('konten')
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category Barang</h4>
                    <a  href="category/tambah" class="btn btn-primary">
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
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $a)
                                    <tr>
                                        <td class="text-bold-500">{{ $a->name }}</td>
                                        @if ($a->image)
                                        <td>
                                            <img src="{{$a->image }}" ></td>
                                        @else
                                            <td>Belum ada gambar</td>
                                        @endif
                                            <td>
                                                {{-- <a href="#"><i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="mail"></i></a> --}}
                                                <a href="/category/edit/{{ $a->id }}" type="button" class="btn btn-primary">
                                                    Edit
                                                </a>
                                                <a href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus?')) { document.getElementById('delete-form-{{ $a->id }}').submit(); }" type="button" class="btn btn-danger">
                                                    Delete
                                                </a>
                                                {{-- Form untuk delete --}}
                                                <form id="delete-form-{{ $a->id }}" action="/category/destroy/{{ $a->id }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- //modal --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
