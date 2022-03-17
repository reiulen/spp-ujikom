<x-layout-component title="Petugas">


                    <x-breadcrumb-component page="Pencatatan Petugas">
                        <a href="{{ route('petugas.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> {{ __('Tambah Petugas') }}
                        </a>
                    </x-breadcrumb-component>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Petugas</th>
                                            <th>Username</th>
                                            <th>Nama Petugas</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($petugas as $row)
                                            <tr>
                                                <td>{{ $row->id_petugas }}</td>
                                                <td>{{ $row->username }}</td>
                                                <td>{{ $row->nama_petugas }}</td>
                                                <td>{{ $row->level }}</td>
                                                <td>
                                                    <a class="btn btn-danger btn-circle hapus" onclick="hapus({{ $row->id }})" nama="{{ $row->nama_petugas }}" id="nama{{ $row->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href="{{ route('petugas.edit', $row->id) }}" class="btn btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                    <form action="{{ route('petugas.destroy', $row->id) }}" id="hapus{{ $row->id }}" method="POST">
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
