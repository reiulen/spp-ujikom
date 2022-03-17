<x-layout-component title="Tambah Siswa">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Entry Siswa</h6>
                        </div>
                        <div class="card-body">
                            <form action={{ route ('siswa.store')}} method="POST">
                            @csrf
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">NISN</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nisn" class="form-control" @error('nisn') is-invalid @enderror>
                                        @error('nisn')
                                           {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">NIS</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nis" class="form-control" @error('nis') is-invalid @enderror>
                                        @error('nis')
                                           {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Nama</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nama" class="form-control" @error('nama') is-invalid @enderror>
                                        @error('nama')
                                           {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Kelas</label>
                                    <div class="col-md-6">
                                        <select class="form-control @error('id_kelas') is-invalid @enderror" name="id_kelas">
                                                <option selected disabled>-- Pilih Kelas --</option>
                                                @foreach ( $kelas as $row )
                                                    <option value="{{$row->id}}">{{$row->kelas}} {{$row->kompeten}}</option>
                                                @endforeach
                                            </select>
                                        @error('id_kelas')
                                           {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Alamat</label>
                                    <div class="col-md-6">
                                        <input type="text" name="alamat" class="form-control" @error('alamat') is-invalid @enderror>
                                        @error('alamat')
                                           {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">No. Telp</label>
                                    <div class="col-md-6">
                                        <input type="text" name="no_telp" class="form-control" @error('no_telp') is-invalid @enderror>
                                        @error('no_telp')
                                           {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">ID SPP</label>
                                    <div class="col-md-6">
                                        <select class="form-control @error('id_spp') is-invalid @enderror" name="id_spp">
                                                <option selected disabled>-- Pilih SPP --</option>
                                                @foreach ( $spp as $row )
                                                    <option value="{{ $row->id }}">{{ $row->id_spp. ' - ' .$row->tahun }}</option>
                                                @endforeach
                                            </select>
                                        @error('id_spp')
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
     @push('script')
        <script src="{{ asset('assets/js/inputmask.js') }}"></script>
        <script>
            const DOMstrings = {
                inputNisn : document.querySelector('input[name="nisn'),
                inputNis : document.querySelector('input[name="nis"]')
            }

            Inputmask({ mask: "999999999" }).mask(
                DOMstrings.inputNisn
            );
            Inputmask({ mask: "999999999" }).mask(
                DOMstrings.inputNis
            )
        </script>
    @endpush
</x-layout-component>
