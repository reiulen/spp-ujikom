<x-layout-component title="Pembayaran">

                    <x-breadcrumb-component page="Tambah Pembayaran">
                        <a href="{{ route('pembayaran.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> {{ __('Tambah Pembayaran') }}
                        </a>
                    </x-breadcrumb-component>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pembayaran</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>ID SPP</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
                                    @foreach ( $pembayaran as $row )
                                        <tr>
                                            <td>{{ $row->id_pembayaran }}</td>
                                            <td>{{ $row->nisn }}</td>
                                            <td>{{ $siswa->firstWhere('nisn', $row->nisn)->nama }}</td>
                                            <td>{{ $row->tgl_bayar . ' ' . $row->bulan_dibayar . ' ' .$row->tahun_dibayar }}</td>
                                            <td>{{ $row->spp->id_spp . ' - ' . $row->spp->tahun }}</td>
                                            <td>{{ format_rupiah($row->jumlah_bayar) }}</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-circle hapus" onclick="hapus({{ $row->id }})" nama="{{ $row->id_pembayaran }}" id="nama{{ $row->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="{{ route('pembayaran.edit', $row->id) }}" class="btn btn-success btn-circle">
                                                    <i class="fas fa-check"></i>
                                                </a>

                                                <form action="{{ route('pembayaran.destroy', $row->id) }}" id="hapus{{ $row->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

    @include('lib.datatable')
    @push('script')
    <script src="{{ asset('assets/js/pages/sweathapus.js') }}"></script>
    @endpush
</x-layout-component>
