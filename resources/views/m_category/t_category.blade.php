@extends('base.app')
@section('konten')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Barang</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Nama Merek</label>
                                <div class="position-relative">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Merek">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
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
