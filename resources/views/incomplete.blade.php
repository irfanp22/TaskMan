<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Incomplete') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 mb-3 text-center text-4xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __("Incomplete Tasks List") }}
                </div>
                <div class="container">
                    <table id="tasks">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no =1;
                            @endphp
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $d->judul }}</td>
                                <td>{{ $d->deskripsi }}</td>
                                <td>{{ $d->status->status }}
                                    @if ($d->status_id == 1)
                                        <a href="tasks/completed">info</a>
                                    @else
                                        <a href="tasks/incomplete">info</a>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('status', ['id' => $d->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <x-primary-button>{{ __('Stat') }}</x-primary-button>
                                    </form>

                                    <form action="tasks/{{ $d->id }}" method="get">
                                        <x-primary-button>{{ __('Edit') }}</x-primary-button>
                                    </form> | 
                                    <form action="{{ route('hapus', ['id' => $d->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <x-primary-button>{{ __('Hapus') }}</x-primary-button>
                                    </form></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    

</x-app-layout>