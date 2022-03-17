<x-layout-component title="Edit Kelas">
                   <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Kelas</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                            @csrf
                            @method('put')
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Kelas</label>
                                    <div class="col-md-6">
                                        <select class="form-control @error('kelas') is-invalid @enderror" name="kelas">
                                                <option value="{{ $kelas->kelas }}">-- {{ $kelas->kelas }} --</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Kompetensi Keahlian</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="kompeten">
                                                <option value="{{ $kelas->kompeten }}">-- {{ $kelas->kompeten }} --</option>
                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                <option value="Akuntansi">Akuntansi</option>
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
