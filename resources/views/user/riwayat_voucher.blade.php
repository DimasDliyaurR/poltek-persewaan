@extends('layouts-user.main')
@section('content')
    <div class="xl:space-x-2 w-full">
        {{-- Voucher --}}
        <div class="flex flex-col gap-5 w-full bg-gray-100 p-4">
            <p class="m-4 uppercase text-xl font-bold">Voucher yang sudah terpakai</p>
            @foreach ($voucher as $item)
                <div class="flex justify-between bg-white shadow-gray-400 p-5 rounded-lg">
                    <span>{{ $item->p_judul }}</span>
                    <span>{{ $item->p_tipe == 'fixed' ? 'Rp. ' . number_format($item->p_isi, 0, ',', '.') : $item->p_isi . '%' }}</span>
                    <span>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</span>
                    <button class="p-2 bg-primary text-white rounded-lg">{{ $item->p_kategori }}</button>
                </div>
            @endforeach
        </div>
        {{-- Voucher --}}

    </div>
@endsection
