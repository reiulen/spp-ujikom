<x-layout-component title="Kelas">

                    <x-breadcrumb-component page="Pencatatan SPP">
                        <a href="{{ route('spp.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> {{ __('Tambah SPP') }}
                        </a>
                    </x-breadcrumb-component>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data SPP</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id SPP</th>
                                            <th>Tahun</th>
                                            <th>Nominal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody>
                                    @foreach ( $spp as $row )
                                        <tr>
                                            <td>{{ $row->id_spp }}</td>
                                            <td>{{ $row->tahun }}</td>
                                            <td>{{ format_rupiah($row->nominal) }}</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-circle hapus" onclick="hapus({{ $row->id }})" nama="{{ $row->id_spp }}" id="nama{{ $row->id }}">
                                                  <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="{{ route('spp.edit', $row->id) }}" class="btn btn-success btn-circle">
                                                    <i class="fas fa-check"></i>
                                                </a>

                                                <form action="{{ route('spp.destroy', $row->id) }}" id="hapus{{ $row->id }}" method="POST">
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
