<x-layout-component title="Siswa">

                    <x-breadcrumb-component page="Pencatatan Siswa">
                        <a href="{{ route('siswa.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> {{ __('Tambah Siswa') }}
                        </a>
                    </x-breadcrumb-component>

                    <!-- Content Row -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Alamat</th>
                                            <th>No.Telp</th>
                                            <th>ID SPP</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
                                    @foreach ( $siswa as $row )
                                        <tr>
                                            <td>{{ $row->nisn }}</td>
                                            <td>{{ $row->nis }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->kelas->kelas }} {{ $row->kelas->kompeten }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>{{ $row->no_telp }}</td>
                                            <td>{{ $row->spp->id_spp . ' - ' .$row->spp->tahun }}</td>
                                            <td>
                                                <a class="btn btn-danger btn-circle hapus" onclick="hapus({{ $row->id }})" nama="{{ $row->nama }}" id="nama{{ $row->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="{{ route('siswa.edit', $row->id) }}" class="btn btn-success btn-circle">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <form action="{{ route('siswa.destroy', $row->id) }}" id="hapus{{ $row->id }}" method="POST">
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
