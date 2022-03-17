<x-layout-component title="Tambah Pembayaran">
                   <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Entry Pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
                            @method('put')
                            @csrf
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">ID Pembayaran</label>
                                    <div class="col-md-6">
                                        <input type="text" name="id_pembayaran" value="{{  $pembayaran->id_pembayaran  }}" class="form-control  @error('id_pembayaran') is-invalid @enderror" readonly>
                                        @error('id_pembayaran')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Nama</label>
                                    <div class="col-md-6">
                                       <select onchange="getval(this.value)" class="form-control select2" name="nama">
                                            <option value="{{ $siswa->firstwhere('nisn', $pembayaran->nisn)->id }}" selected>{{ $pembayaran->nisn . ' - ' .  $siswa->firstwhere('nisn', $pembayaran->nisn)->nama  }}</option>
                                            @foreach ($siswa as $row)
                                            <option value="{{ $row->id }}">{{ $row->nisn . ' - ' . $row->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row mx-auto">
                                    <label class="col-md-3 text-right">Jumlah Bayar</label>
                                    <div class="col-md-6">
                                        <input type="text" name="jumlah_bayar" value="{{ format_rupiah($pembayaran->jumlah_bayar) }}" class="form-control" @error('jumlah_bayar') is-invalid @enderror>
                                        @error('jumlah_bayar')
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
                @include('lib.select2');
                @push('script')
                    <script>
                        const url = "{{ url("") }}";
                        const DOMstrings = {
                            inputUang : document.querySelector("input[name='jumlah_bayar']")
                        }
                        $('.select2').select2();

                        function getval(id){
                            $.getJSON(`${url}/api/siswa/${id}`, function(data){
                                $("input[name='jumlah_bayar']").val(`Rp. ${formatRupiah(data.nominal)}`)
                            })
                        }
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
