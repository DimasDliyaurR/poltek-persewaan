@extends('layouts-home.navbar.nav-kalender')

@section('script')
<script>

document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    themeSystem: 'bootstrap5',
    events:"{{ route('asrama.list') }}"
});
calendar.render();
});

</script>
@endsection