@extends('layouts-home.navbar.nav-kalender')
@section('kalender')

<div class="container">
    <div class="row">
        <div class="col-12-mt-3">
        </div>
    </div>
    <div id="calendar">
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap5',
            events:'{{ route('layanan.list') }}' 
        });
        calendar.render();
        });
</script>
@endsection



