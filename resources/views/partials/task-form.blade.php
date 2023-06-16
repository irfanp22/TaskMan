<section>
    <form method="post" action="{{ $data ? route('edit.update', $data->id) : route('tambah.store') }}" class="form">
        @csrf
        @if($data)
            @method('PUT')
        @endif
        <div class="flex justify-center">
            <div class="w-full">
                <div>
                    <x-input-label for="judul" :value="__('Judul')" />
                    <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full" required autofocus value="{{ $data ? $data->judul : old('judul') }}"/>
                </div>

                <div>
                    <x-input-label for="desc" :value="__('Deskripsi')" />
                    <x-text-area-input id="desc" name="desc" class="mt-1 block w-full" required autofocus>{{ $data ? $data->deskripsi : old('desc') }}</x-text-area-input>
                </div>                

                <div class="flex justify-center mt-4">
                    <x-primary-button>{{ $data ? __('Update') : __('Tambah') }}</x-primary-button>
                </div>
            </div>
        </div>
    </form>
</section>
