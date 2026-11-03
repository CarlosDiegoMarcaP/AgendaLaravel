<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-medium text-indigo-600">Agenda personal</p>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Detalle del amigo
                </h2>
            </div>
            <a href="{{ route('amigos.index') }}"
                class="inline-flex items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Volver a Amigos
            </a>
        </div>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">
                <div class="border-b border-gray-200 px-6 py-5 sm:px-8">
                    <p class="text-sm text-gray-500">Información registrada</p>
                    <h1 class="mt-1 text-2xl font-bold text-gray-900">
                        {{ $amigo->per_nom }} {{ $amigo->per_appm }}
                    </h1>
                    <p class="mt-1 text-sm text-gray-500">Código: {{ $amigo->per_cod }}</p>
                    @if ($amigo->per_foto)
                        <img src="{{ asset('storage/' . $amigo->per_foto) }}" alt="Foto de {{ $amigo->per_nom }}"
                            class="mt-5 h-32 w-32 rounded-full object-cover ring-4 ring-indigo-100">
                    @endif
                </div>

                <dl class="grid grid-cols-1 gap-x-8 gap-y-6 px-6 py-6 sm:grid-cols-2 sm:px-8">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Nombres</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $amigo->per_nom }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Apellidos</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $amigo->per_appm }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Profesión</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $amigo->per_prof }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $amigo->per_telf }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Celular</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $amigo->per_cel }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Correo electrónico</dt>
                        <dd class="mt-1 break-words text-base text-gray-900">{{ $amigo->per_email }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $amigo->per_dir }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Fecha de nacimiento</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $amigo->per_fnac }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Lugar de nacimiento</dt>
                        <dd class="mt-1 text-base text-gray-900">{{ $amigo->per_lnac }}</dd>
                    </div>
                </dl>

                <div class="flex flex-col gap-3 border-t border-gray-200 bg-gray-50 px-6 py-4 sm:flex-row sm:justify-end sm:px-8">
                    <a href="{{ route('amigos.edit', $amigo->per_cod) }}"
                        class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Editar amigo
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
