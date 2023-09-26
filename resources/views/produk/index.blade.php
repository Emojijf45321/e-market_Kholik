
@extends('templates.layout')

@section('content')
<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Produk</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <ul>
            @foreach ($errors->all() as $error )
              <li>{{ $error }}</li>
            @endforeach
           </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormproduk">
            Tambah Produk
          </button>

          <!-- tabel -->
          <table class="table table-sm table-hover table-stripped table-bordered" id="tbl-produk">
            <thead>
              <tr>
                <th scope='col'>NO</th>
                <th scope='col'>Nama Produk</th>
                <th scope='col'>Action</th>
              </tr>
            </thead>
            <tbody>
                @extends('templates.layout')

                @section('content')
                <!-- Main content -->
                    <section class="content">

                      <!-- Default box -->
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Produk</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          @if(session('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif

                          @if($errors->any())
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           <ul>
                            @foreach ($errors->all() as $error )
                              <li>{{ $error }}</li>
                            @endforeach
                           </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormproduk">
                            Tambah Produk
                          </button>

                          <!-- tabel -->
                          <table class="table table-sm table-hover table-stripped table-bordered" id="tbl-produk">
                            <thead>
                              <tr>
                                <th scope='col'>NO</th>
                                <th scope='col'>Nama Produk</th>
                                <th scope='col'>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($produk as $prod)
                                <tr>
                                  <th scope="row">{{ $i = (!isset($i)?1:++$i)}}</th>
                                  <th>{{ $prod->nama_produk }}</th>
                                  <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormProduk" data-nama_produk="$prod->nama_produk">
                                        <i class="fas fa-pen"></i>
                                      </button>
                                    <form action="produk/{{ $prod->id }}" method="post" style="display:inline">
                                      @csrf
                                      @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-delete" data-nama_produk="{{ $prod->nama_produk }}"><i class="fas fa-trash"></i></button>
                                    </form>
                                  </td>
                                </tr>
                              @endforeach
                              </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          Footer
                        </div>
                        <!-- /.card-footer-->
                        @include('produk.form')
                        @include('produk.formEdit')
                      </div>
                      <!-- /.card -->
                    </section>
                <!-- /.content -->
                @endsection

                @push('script')
                <script>
                    $('#alert-success').fadeTo(2000,500).slideUp(500, function(){
                      $('#alert-success').slideUp(500)
                    })

                    $('.alert-danger').fadeTo(2000,500).slideUp(500, function(){
                      $('.alert-danger').slideUp(500)
                    })

                    $(function () {
                      $('#tbl-produk').DataTable()
                    })

                    console.log('oke')

                    $(".btn-delete").on("click", function(e) {
                      console.log('oke')
                      Swal.fire({
                        icon: 'error',
                        title: 'Hapus Data',
                        html: 'Apakah yakin data ini akan dihapus?',
                        confirmButtonText : 'Ya',
                        denyButtonText : 'Tidak',
                        showDenyButton : true,
                        focusConfirm : false
                      }).then((result) => {
                        if(result.isConfirmed) $(e.target).closest('form').submit()
                        else swal.close()
                      })
                    })
                </script>
                @endpush

                <tr>
                  <th scope="row">{{ $i = (!isset($i)?1:++$i)}}</th>
                  <th>Nama Produk</th>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormProduk" data-nama_produk="$prod->nama_produk">
                        <i class="fas fa-pen"></i>
                      </button>
                    <form action= ''method="post" style="display:inline">
                      @csrf
                      @method('DELETE')
                    <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
                </tr>

              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
        @include('produk.form')
        @include('produk.formEdit')
      </div>
      <!-- /.card -->
    </section>
<!-- /.content -->
@endsection

@push('script')
<script>
    $('#alert-success').fadeTo(2000,500).slideUp(500, function(){
      $('#alert-success').slideUp(500)
    })

    $('.alert-danger').fadeTo(2000,500).slideUp(500, function(){
      $('.alert-danger').slideUp(500)
    })

    $(function () {
      $('#tbl-produk').DataTable()
    })

    console.log('oke')

    $(".btn-delete").on("click", function(e) {
      console.log('oke')
      Swal.fire({
        icon: 'error',
        title: 'Hapus Data',
        html: 'Apakah yakin data ini akan dihapus?',
        confirmButtonText : 'Ya',
        denyButtonText : 'Tidak',
        showDenyButton : true,
        focusConfirm : false
      }).then((result) => {
        if(result.isConfirmed) $(e.target).closest('form').submit()
        else swal.close()
      })
    })
</script>
@endpush
