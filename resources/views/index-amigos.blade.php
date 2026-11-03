<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-medium text-indigo-600">Agenda personal</p>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __($title) }}</h2>
            </div>
            <a href="{{ route('amigos.new') }}"
                class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                + Nuevo amigo
            </a>
        </div>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">
                <div class="border-b border-gray-200 px-6 py-5 sm:px-8">
                    <h1 class="text-2xl font-bold text-gray-900">Mis amigos</h1>
                    <p class="mt-1 text-sm text-gray-500">Consulta y administra tus contactos registrados.</p>
                </div>

                @if (session('success'))
                    <div class="mx-6 mt-6 rounded-md border border-green-200 bg-green-50 p-4 text-sm text-green-700 sm:mx-8">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <caption class="sr-only">Listado de amigos</caption>
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 sm:px-8">Amigo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Profesión</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Contacto</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-gray-500 sm:px-8">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse ($amigos as $amigo)
                                <tr class="transition hover:bg-gray-50">
                                    <td class="whitespace-nowrap px-6 py-4 sm:px-8">
                                        <div class="flex items-center gap-3">
                                            @if ($amigo->per_foto)
                                                <img src="{{ asset('storage/' . $amigo->per_foto) }}" alt="Foto de {{ $amigo->per_nom }}"
                                                    class="h-10 w-10 rounded-full object-cover ring-1 ring-gray-200">
                                            @else
                                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 text-sm font-semibold text-indigo-700">
                                                    {{ strtoupper(substr($amigo->per_nom, 0, 1)) }}
                                                </div>
                                            @endif
                                            <div class="font-semibold text-gray-900">{{ $amigo->per_nom }} {{ $amigo->per_appm }}</div>
                                        </div>
                                        <div class="mt-1 text-sm text-gray-500">CI: {{ $amigo->per_cod }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">{{ $amigo->per_prof }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <div>{{ $amigo->per_cel }}</div>
                                        <div class="max-w-xs truncate text-gray-500">{{ $amigo->per_email }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium sm:px-8">
                                        <div class="flex justify-end gap-3">
                                            <a href="{{ route('amigos.show', $amigo->per_cod) }}" class="text-indigo-600 transition hover:text-indigo-900">Detalle</a>
                                            <a href="{{ route('amigos.edit', $amigo->per_cod) }}" class="text-gray-600 transition hover:text-gray-900">Editar</a>
                                            <form method="POST" action="{{ route('amigos.delete', $amigo->per_cod) }}" onsubmit="return confirm('¿Deseas eliminar este amigo?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 transition hover:text-red-900">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-sm text-gray-500 sm:px-8">
                                        Todavía no hay amigos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>