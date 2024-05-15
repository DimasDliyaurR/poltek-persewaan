@extends('layouts-admin.main')

@section('content')
    <livewire:laporan-transaksi-terbayar-table>
    @endsection

    @section('head')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    @endsection

    @section('script')
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


                    XLSX.writeFile(wb, fn || ('LAPORAN_KEUANGAN_' + Date.now() + '.' + (type ||
                        'xlsx')));
            }

            $(document).ready(function() {
                $("#search-pemasukkan").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#tbody-pemasukkan tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });

                $("#search-transaksi").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#tbody-transaksi tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    @endsection
