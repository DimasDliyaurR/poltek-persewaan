<x-modal-action action=" {{ $action }} ">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <input type="text" name="tgl_mulai"  class="form-control">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <input type="text" name="tgl_kembali" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <textarea name="title" id="title" class="form-control"></textarea>
            </div>
        </div>
    </div>
</x-modal-action>