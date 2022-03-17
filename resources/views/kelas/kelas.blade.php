<x-layout-component title="Kelas">

                    <x-breadcrumb-component page="Pencatatan Kelas">
                        <a href="{{ route('kelas.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> {{ __('Tambah Kelas') }}
                        </a>
                    </x-breadcrumb-component>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>Kompetensi Keahlian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
                                        @foreach ( $kelas as $row )
                                        <tr>
                                            <td>{{ $row->kelas }}</td>
                                            <td>{{ $row->kompeten }}</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-circle hapus" onclick="hapus({{ $row->id }})" nama="{{ $row->nama_kelas }} {{ $row->kompeten }}" id="nama{{ $row->id }}">
                                                  <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="{{ route('kelas.edit', $row->id) }}" class="btn btn-success btn-circle">
                                                  <i class="fas fa-check"></i>
                                                </a>
                                                <form action="{{ route('kelas.destroy', $row->id) }}" id="hapus{{ $row->id }}" method="POST">
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
