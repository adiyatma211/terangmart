@extends('base.app')
@section('konten')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Barang</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Nama prodak</label>
                                    <div class="position-relative">
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Masukan Merek">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group me-1 mb-1">
                                <div class="dropdown">
                                    
                                    <div class="form-group has-icon-left">
                                        <label for="password-id-icon">Category</label>
                                        <div class="position-relative">
                                            <div class="form-group">
                                                <select name="id_prodak" id="id_prodak">
                                                    @foreach($cat as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- <div class="dropdown-menu dropdown-menu-end">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Pilih Merek
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach ($cat as $a)
                                                <a class="dropdown-item" href="#"
                                                    data-value="{{ $a->id }}">{{ $a->name }}</a>
                                            @endforeach
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="first-name-icon">Upload Gambar</label>
                                <div class="form-group has-icon-left">
                                    <input name="image" type="file" id="image" class="filepond" accept="image/*" />
                                </div>
                                <input type="hidden" name='filename' id='filename'>
                            </div>  
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset"
                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Stok</label>
                                    <div class="position-relative">
                                        <input type="text" id="stok" name="stok" class="form-control"
                                            placeholder="Masukan Jumlah Stok">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">harga</label>
                                    <div class="position-relative">
                                        <input type="text" id="harga" name="harga" class="form-control"
                                            placeholder="Masukan harga">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2"
                                            style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Deskripsi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Register any plugins
          FilePond.registerPlugin(FilePondPluginImagePreview);
      
          // Create FilePond object
          const inputElement = document.querySelector('input[type="file"]');
          const pond = FilePond.create(inputElement);
    
            FilePond.setOptions({
                server: {
                    url:'/tmp-upload',
                    process: {
                        onload: (response) => {
                            document.getElementById('filename').value=response;
                        }
                    },
                headers:{
                    'x-csrf-token':'{{ csrf_token() }}'
                },
                
            
            },
        });
    
        });      
      </script>
@endsection
