
<div>
    <form wire:submit="save">
        <div class="card">
            <div >
                <x-validation-errors class="mb-4"/>
                    <!-- select materia -->
                    <div class="mb-4">
                        <x-label class="mb-3">
                            Materia
                        </x-label>

                        <x-select class="w-full" wire:model.live="calendario.materia_id"
                        wire:loading.attr="disabled" wire:target="calendario.materia_id">
                            <option value="" disabled>Seleccione una materia</option>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                            @endforeach
                        </x-select>
                        <x-label class="mb-3">
                            categoria
                        </x-label>
                        <x-select class="w-full" wire:model.live="calendario.grado_id">
                            <option value="" disabled {{ is_null($calendario['grado_id']) ? 'selected' : '' }}>
                                Seleccione una categoría</option>
                            @foreach ($this->grados as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </x-select>
                        
                    </div>

                    <!-- select categoria -->

                    <div>
                        <x-label class="mb-3">Nombre</x-label>
                        <x-input class="w-full" placeholder="Ingrese el nombre de la calendario" name="nombre"
                            wire:model="calendario.evento"/>
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-button>Guardar</x-button>
                </div>

            </div>

    </form>

    @dump($calendario);

</div>



                  