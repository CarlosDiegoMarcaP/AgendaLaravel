<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-medium text-indigo-600">Agenda personal</p>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Editar amigo
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
                    <h1 class="text-2xl font-bold text-gray-900">Editar información</h1>
                    <p class="mt-1 text-sm text-gray-500">
                        Actualiza los datos de {{ $amigo->per_nom }} {{ $amigo->per_appm }}.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mx-6 mt-6 rounded-md border border-red-200 bg-red-50 p-4 text-sm text-red-700 sm:mx-8" role="alert">
                        <p class="font-semibold">Por favor corrige los siguientes errores:</p>
                        <ul class="mt-2 list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('amigos.update') }}" enctype="multipart/form-data" class="px-6 py-6 sm:px-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        @php
                            $fields = [
                                ['name' => 'per_cod', 'label' => 'Carnet', 'value' => $amigo->per_cod, 'placeholder' => 'Código de identidad'],
                                ['name' => 'per_nom', 'label' => 'Nombres', 'value' => $amigo->per_nom, 'placeholder' => 'Nombres'],
                                ['name' => 'per_appm', 'label' => 'Apellidos', 'value' => $amigo->per_appm, 'placeholder' => 'Apellidos'],
                                ['name' => 'per_prof', 'label' => 'Profesión', 'value' => $amigo->per_prof, 'placeholder' => 'Ingeniero'],
                                ['name' => 'per_telf', 'label' => 'Teléfono', 'value' => $amigo->per_telf, 'placeholder' => 'Teléfono'],
                                ['name' => 'per_cel', 'label' => 'Celular', 'value' => $amigo->per_cel, 'placeholder' => 'Celular'],
                                ['name' => 'per_email', 'label' => 'Correo electrónico', 'value' => $amigo->per_email, 'placeholder' => 'juanperez@uagrm.edu.bo', 'type' => 'email'],
                                ['name' => 'per_dir', 'label' => 'Dirección', 'value' => $amigo->per_dir, 'placeholder' => 'Dirección'],
                                ['name' => 'per_fnac', 'label' => 'Fecha de nacimiento', 'value' => $amigo->per_fnac, 'placeholder' => 'Fecha de nacimiento'],
                                ['name' => 'per_lnac', 'label' => 'Lugar de nacimiento', 'value' => $amigo->per_lnac, 'placeholder' => 'Santa Cruz'],
                            ];
                        @endphp

                        @foreach ($fields as $field)
                            <div>
                                <x-input-label :for="$field['name']" :value="$field['label']" />
                                <x-text-input
                                    :id="$field['name']"
                                    :name="$field['name']"
                                    :type="$field['type'] ?? 'text'"
                                    class="mt-1 block w-full"
                                    :value="old($field['name'], $field['value'])"
                                    :placeholder="$field['placeholder']"
                                    :aria-invalid="$errors->has($field['name']) ? 'true' : 'false'"
                                />
                                <x-input-error :messages="$errors->get($field['name'])" class="mt-2" />
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        <x-input-label for="per_foto" value="Foto del amigo" />
                        @if ($amigo->per_foto)
                            <img src="{{ asset('storage/' . $amigo->per_foto) }}" alt="Foto de {{ $amigo->per_nom }}"
                                class="mb-3 h-24 w-24 rounded-full object-cover ring-2 ring-indigo-100">
                        @endif
                        <input id="per_foto" name="per_foto" type="file" accept="image/jpeg,image/png,image/gif,image/webp"
                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-2 file:font-semibold file:text-gray-700 hover:file:bg-gray-200" />
                        <p class="mt-1 text-xs text-gray-500">Selecciona una nueva imagen para reemplazar la actual. Máximo 2 MB.</p>
                        <x-input-error :messages="$errors->get('per_foto')" class="mt-2" />
                    </div>

                    <div class="mt-8 flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 sm:flex-row sm:justify-end">
                        <a href="{{ route('amigos.show', $amigo->per_cod) }}"
                            class="inline-flex items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Cancelar
                        </a>
                        <x-primary-button>
                            Guardar cambios
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
