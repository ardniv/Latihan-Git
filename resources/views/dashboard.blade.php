@extends('dashlayout.app')

@section('content')

<h3 class="fw-bold mb-3">Dashboard</h3>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-primary card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-user-graduate"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Mahasiswa</p>
                          <h4 class="card-title">{{$jmlhMhs}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-info card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-user-alt"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Users</p>
                          <h4 class="card-title">{{$terdaftar}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-success card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Verified</p>
                          <h4 class="card-title">{{$verif}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-secondary card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Order</p>
                          <h4 class="card-title">576</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
            <h3 class="fw-bold mb-3">Prodi</h3>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-secondary card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-laptop-code"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Informatika</p>
                          <h4 class="card-title">{{$informatika}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-warning card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-laptop"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">SIstem Informasi</p>
                          <h4 class="card-title">{{$si}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-danger card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-palette"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">DKV</p>
                          <h4 class="card-title">{{$dkv}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($message = Session::get('success'))
<script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{$message}}",
    showConfirmButton: false,
    timer: 1500
    });
</script>
@endif

@if($message = Session::get('error'))
<script>
    Swal.fire({
    position: "center",
    icon: "error",
    title: "{{$message}}",
    showConfirmButton: false,
    timer: 1500
    });
@endif
</script>

@endsection