@extends('layouts.admin.app')

@section('css')
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <div class="container p-4">
        <div class="card bg-light">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-6 mt-2">
                        <h4>Laporan per Rentang Tanggal</h4>
                        <form action="{{ route('generate-pdf') }}" method="POST">
                            @csrf
                            <input type="hidden" name="input" value="tanggal">
                            <div class="form-group">
                                <label for="daterange">Pilih Rentang Tanggal:</label>
                                <input type="text" class="form-control" id="daterange" name="daterange">
                            </div>
                            <div class="form-group">
                                <label for="layanan">Layanan</label>
                                <select name="id_layanan" id="layanan" class="form-control">
                                    <option value="all">Semua</option>
                                    @foreach ($layanans as $layanan)
                                        <option value="{{ $layanan->id_layanan }}">{{ $layanan->nama_layanan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="id_status" id="status" class="form-control">
                                    <option value="all">Semua</option>
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success m-1">Cetak</button>
                        </form>
                    </div>
                    <div class="col-md-6 mt-2">
                        <h4 class="">Laporan per Bulan</h4>
                        <form action="{{ route('generate-pdf') }}" method="POST">
                            @csrf
                            <input type="hidden" name="input" value="bulan">
                            <div class="form-group">
                                <label for="month">Pilih Bulan:</label>
                                <input type="month" id="month" name="month" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="layanan_month">Layanan</label>
                                <select name="id_layanan" id="layanan_month" class="form-control">
                                    <option value="all">Semua</option>
                                    @foreach ($layanans as $layanan)
                                        <option value="{{ $layanan->id_layanan }}">{{ $layanan->nama_layanan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_month">Status</label>
                                <select name="id_status" id="status_month" class="form-control">
                                    <option value="all">Semua</option>
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success m-1">Cetak</button>
                        </form>
                    </div>
                    <div class="col-md-6 mt-2">
                        <h4 class="">Laporan per Tahun</h4>
                        <form action="{{ route('generate-pdf') }}" method="POST">
                            @csrf
                            <input type="hidden" name="input" value="tahun">
                            <div class="form-label-group">
                                <label for="date">Tahun</label>
                                <input type="number" class="form-control" min="1999" max="{{ date('Y') }}" name="tahun" value="{{ date('Y') }}">
                            </div>
                            <div class="form-group">
                                <label for="layanan_year">Layanan</label>
                                <select name="id_layanan" id="layanan_year" class="form-control">
                                    <option value="all">Semua</option>
                                    @foreach ($layanans as $layanan)
                                        <option value="{{ $layanan->id_layanan }}">{{ $layanan->nama_layanan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_year">Status</label>
                                <select name="id_status" id="status_year" class="form-control">
                                    <option value="all">Semua</option>
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success m-1">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#daterange').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Batal',
                    applyLabel: 'Pilih',
                    format: 'DD/MM/YYYY'
                }
            });

            $('#daterange').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format(
                    'DD/MM/YYYY'));
            });

            $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
             
        });
    </script>
@endpush
