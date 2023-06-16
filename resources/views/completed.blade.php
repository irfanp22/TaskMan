<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Completed') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 mb-3 text-center text-4xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __("Completed Tasks List") }}
                </div>
                <div class="px-4 py-2">
                    <a href="{{ route('dashboard') }}"><x-button><i class="fa-solid fa-arrow-left fa-lg"></i></x-button></a>
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
                                $no =1;
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
    <script type="module">
        $(document).ready(function(){
            $('#tasks').DataTable({
                order: [],
                columnDefs: [
                { targets: [0], orderable: false, searchable: false, orderFixed: true}
                ]
            })
            styling();
            $('#tasks_filter input[type="search"]').on('input', function(){
                styling();
            })
        })
    </script>
</x-app-layout>