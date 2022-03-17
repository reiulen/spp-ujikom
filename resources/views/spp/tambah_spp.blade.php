<x-layout-component title="Tambah SPP">
                   <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Entry SPP</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('spp.store') }}" method="POST">
                            @csrf
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">ID SPP</label>
                                    <div class="col-md-6">
                                        @php
                                            if (!$spp) {
                                                $input = 'SPP01';
                                            }else {
                                                $proses = substr($spp->id_spp, 3) + 1;
                                                $bil = sprintf("%03s", $proses);
                                                $input = substr($spp->id_spp, 0, 2) . $bil;
                                            }
                                        @endphp
                                        <input type="text" name="id_spp" value="{{  $input  }}" class="form-control @error('id_spp') is-invalid @enderror" readonly>
                                        @error('id_spp')
                                           {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Tahun</label>
                                    <div class="col-md-6">
                                        <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror">
                                        @error('tahun')
                                           {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Nominal</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nominal" class="form-control @error('nominal') is-invalid @enderror">
                                        @error('nominal')
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
            inputTahun: document.querySelector("input[name='tahun']"),
            inputUang : document.querySelector("input[name='nominal']")
        };
        Inputmask({ alias: "datetime", inputFormat: "yyyy" }).mask(
            DOMstrings.inputTahun
        );

        var rupiah = DOMstrings.inputUang;
            rupiah.addEventListener("keyup", function (e) {
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }

        </script>
    @endpush
</x-layout-component>
