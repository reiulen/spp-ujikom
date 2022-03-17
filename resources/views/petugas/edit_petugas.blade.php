<x-layout-component title="Edit Petugas">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Petugas</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
                            @csrf
                            @method('put')
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">ID Petugas</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{ $petugas->id_petugas }}" name="id_petugas" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{ $petugas->username }}" name="username" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Nama</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{ $petugas->nama_petugas }}" name="nama_petugas" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Level</label>
                                    <div class="col-md-6">
                                        <select class="form-control " name="level">
                                            <option value="{{ $petugas->level }}">{{ $petugas->level }}</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Petugas">Petugas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7 ml-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
</x-layout-component>
