<x-layout-component title="History Pembayaran">

                    <x-breadcrumb-component page="History Pembayaran">
                    </x-breadcrumb-component>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data History Pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="history" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pembayaran</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>ID SPP</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Nama Petugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ( $pembayaran as $row )
                                        <tr>
                                            <td>{{ $row->id_pembayaran }}</td>
                                            <td>{{ $row->nisn }}</td>
                                            <td>{{ $siswa->firstWhere('nisn', $row->nisn)->nama }}</td>
                                            <td>{{ $row->tgl_bayar . ' ' . $row->bulan_dibayar . ' ' .$row->tahun_dibayar }}</td>
                                            <td>{{ $row->spp->id_spp . ' - ' . $row->spp->tahun }}</td>
                                            <td>{{ format_rupiah($row->jumlah_bayar) }}</td>
                                            <td>{{ $row->petugas->nama_petugas }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

    @include('lib.datatablecetak')
    @push('script')
    <script>
        $(function () {
            $('#history')
            .DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                info: false,
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            })
            .buttons()
            .container()
            .appendTo('#history_wrapper .col-md-6:eq(0)');
        });
    </script>
    @endpush
</x-layout-component>
