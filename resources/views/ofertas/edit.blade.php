<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar oferta') }}
        </h2>
    </x-slot>

<div class="container">
    <form action="{{ route('ofertas.update', $oferta->idOferta) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                {{-- Datos de la oferta --}}
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"> 
                    <h1 class="text-2xl font-bold">Detalles de la oferta</h1>
                    <hr/>  
                    <br/>   
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">              
                        <div>
                            <label for="tituloOferta" class="form-label">Título:</label>
                            <input type="text" name="tituloOferta" class="form-control" value="{{ $oferta->tituloOferta }}" required>
                        </div>

                        <div>
                            <label for="descOferta" class="form-label">Descripción:</label>
                            <textarea type="text" name="descOferta" class="form-control" value="{{ $oferta->descOferta }}" required>{{$oferta->descOferta}}</textarea>
                        </div>

                        <div>
                            <label for="requisitos" class="form-label">Requisitos:</label>
                            <textarea type="text" name="requisitos" class="form-control" value="{{ $oferta->requisitos }}" required>{{$oferta->requisitos}}</textarea>
                        </div>

                        <div>
                            <label for="modalidad" class="form-label">Modalidad:</label>
                            <input type="text" name="modalidad" class="form-control" value="{{ $oferta->requisitos }}" required>
                        </div>  

                        <div>
                            <label for="ubicacion" class="form-label">Ubicación:</label>
                            <input type="text" name="ubicacion" class="form-control" value="{{ $oferta->ubicacion }}" required>
                        </div>                                                

                        <div>
                            <label for="salario" class="form-label">Salario:</label>
                            <input type="text" name="salario" class="form-control" value="{{ $oferta->salario }}" required>
                        </div>
                    </div>
                </div>                      
            </div>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded mb-3"
                >Actualizar</button>
        </div>
    </form>
</div>
</x-app-layout>