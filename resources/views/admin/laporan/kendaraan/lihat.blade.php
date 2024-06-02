@extends('layouts-admin.main')

@section('content')
    <div class="uppercase text-lg font-bold m-4 dark:text-white h-full">
        Table {{ $title }}
    </div>
    <livewire:transaksi-kendaraan-table>
    @endsection

    @section('head')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    @endsection

    @section('script')
        <script src="{{ asset('js/feature/toggle-table.js') }}"></script>
        <script src="{{ asset('js/feature/dp-field-toggle.js') }}"></script>
        <script>
            function ExportToExcel(id, type, fn, dl) {
                var elt = document.getElementById(id);
                var wb = XLSX.utils.table_to_book(elt, {
                    sheet: "sheet1"
                });
                return dl ?
                    XLSX.write(wb, {
                        bookType: type,
                        bookSST: true,
                        type: 'base64'
                    }) :


                    XLSX.writeFile(wb, fn || ('LAPORAN_TRANSAKSI_KENDARAAN_' + Date.now() + '.' + (type ||
                        'xlsx')));
            }
        </script>
    @endsection
