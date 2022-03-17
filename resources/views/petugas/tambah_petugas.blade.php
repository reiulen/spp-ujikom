<x-layout-component title="Tambah Petugas">
                    <!-- Entry Petugas -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Entry Petugas</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('petugas.store') }}" method="POST">
                            @csrf
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">ID Petugas</label>
                                    <div class="col-md-6">
                                        @php
                                            $proses = substr($petugas->id_petugas, 2) + 1;
                                            $bil = sprintf("%03s", $proses);
                                        @endphp
                                        <input type="text" name="id_petugas" value="{{ substr($petugas->id_petugas, 0, 2)  }}{{ $bil }}" class="form-control @error('id_petugas') is-invalid @enderror" readonly>
                                        @error('id_petugas')
                                           {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror">
                                        @error('username')
                                           {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Nama Petugas</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nama_petugas" class="form-control @error('nama_petugas') is-invalid @enderror">
                                        @error('nama_petugas')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Level</label>
                                    <div class="col-md-6">
                                        <select class="form-control @error('level') is-invalid @enderror" name="level">
                                                <option selected disabled>-- Pilih Level --</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Petugas">Petugas</option>
                                                <option value="Siswa">Siswa</option>
                                            </select>
                                        @error('level')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control @error('id_petugas') is-invalid @enderror">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7 ml-2">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

</x-layout-component>
