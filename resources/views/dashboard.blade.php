<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 mb-3 text-center text-4xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __("Tasks List") }}
                </div>
                <div class="px-4 py-2">
                    <div class="flex justify-end">
                        <a href="{{ route('tambah') }}" class="btn btn-primary text-gray-900 dark:text-gray-100">Tambah</a>
                    </div>
                    <div class="p-4">
                        <table id="tasks" class="w-full border-collapse text-gray-900 dark:text-gray-100">
                            <thead>
                                <tr>
                                    <th class="py-2">No</th>
                                    <th class="py-2">Judul</th>
                                    <th class="py-2">Deskripsi</th>
                                    <th class="py-2 w-1/5">Status</th>
                                    <th class="py-2 w-1/5">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $d)
                                    <tr>
                                        <td class="py-2">{{ $no++ }}</td>
                                        <td class="py-2">{{ $d->judul }}</td>
                                        <td class="py-2">{{ $d->deskripsi }}</td>
                                        <td class="py-2">
                                            {{ $d->status->status }}
                                            @if ($d->status_id == 1)
                                                <a href="tasks/completed">info</a>
                                            @else
                                                <a href="tasks/incomplete">info</a>
                                            @endif
                                        </td>
                                        <td class="py-2">
                                            <div class="flex items-center">
                                                <form action="{{ route('status', ['id' => $d->id]) }}" method="post" class="form">
                                                    @csrf
                                                    @method('put')
                                                    <x-primary-button>{{ __('Stat') }}</x-primary-button>
                                                </form>
                                                |
                                                <form action="tasks/{{ $d->id }}" method="get" class="form">
                                                    <x-primary-button>{{ __('Edit') }}</x-primary-button>
                                                </form>
                                                |
                                                <form action="{{ route('hapus', ['id' => $d->id]) }}" method="post" class="form">
                                                    @csrf
                                                    @method('delete')
                                                    <x-primary-button>{{ __('Hapus') }}</x-primary-button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 mb-3 text-center text-4xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __("Tasks List") }}
                </div>
                <div class="px-4 py-2">
                    <div class="flex justify-end">
                        <a href="{{ route('tambah') }}"><x-button>{{ __('Tambah') }}</x-button></a>
                    </div>
                    <div class="p-4">
                        <div class="border border-gray-200 dark:border-gray-600 rounded-lg">
                            <div class="bg-white dark:bg-gray-800 px-4 py-3">
                                <table id="tasks" class="w-full border-collapse text-gray-900 dark:text-gray-100">
                                    <thead>
                                        <tr>
                                            <th class="py-2">No</th>
                                            <th class="py-2">Judul</th>
                                            <th class="py-2">Deskripsi</th>
                                            <th class="py-2 w-1/6">Status</th>
                                            <th class="py-2 w-1/6">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data as $d)
                                            <tr>
                                                <td class="py-2">{{ $no++ }}</td>
                                                <td class="py-2">{{ $d->judul }}</td>
                                                <td class="py-2">{{ $d->deskripsi }}</td>
                                                <td class="py-2">
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-sm font-medium text-white 
                                                        {{ $d->status_id == 1 ? 'bg-green-500' : 'bg-yellow-500' }} 
                                                        dark:{{ $d->status_id == 1 ? 'bg-green-100' : 'bg-yellow-100' }}">
                                                        {{ $d->status->status }}
                                                    </span>
                                                    @if ($d->status_id == 1)
                                                        <a href="tasks/completed"><i class="fa-solid fa-circle-info"></i></a>
                                                    @else
                                                        <a href="tasks/incomplete"><i class="fa-solid fa-circle-info"></i></a>
                                                    @endif
                                                </td>
                                                <td class="py-2">
                                                    <div class="flex items-center">
                                                        <form action="{{ route('status', ['id' => $d->id]) }}" method="post" class="form">
                                                            @csrf
                                                            @method('put')
                                                            @if ($d->status_id == 1)
                                                                <x-primary-button><i class="fa-solid fa-xmark fa-xl"></i></x-primary-button>
                                                            @else
                                                                <x-primary-button><i class="fa-solid fa-check fa-xl"></i></x-primary-button>
                                                            @endif
                                                        </form>
                                                        |
                                                        <form action="tasks/{{ $d->id }}" method="get" class="form">
                                                            <x-primary-button><i class="fa-regular fa-pen-to-square fa-xl"></i></x-primary-button>
                                                        </form>
                                                        |
                                                        <form action="{{ route('hapus', ['id' => $d->id]) }}" method="post" class="form">
                                                            @csrf
                                                            @method('delete')
                                                            <x-primary-button><i class="fa-solid fa-trash-can fa-xl"></i></x-primary-button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
        

</x-app-layout>
    <script type="module">
        $(document).ready(function(){
            $('#tasks').DataTable({
                order: [],
                columnDefs: [
                { targets: [0], orderable: false, searchable: false, orderFixed: true}
                ]
            })
            window.styling();
            $('#tasks_filter input[type="search"]').on('input', function(){
                window.styling();
            })
        })
    </script>
