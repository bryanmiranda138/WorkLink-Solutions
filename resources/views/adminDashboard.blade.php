<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuario: Empresa') }}
        </h2>
    </x-slot>

    @if (Auth::user()->type == 1 && isset($postulaciones))
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Ofertas con postulaciones activas</h1>

            @if ($ofertas->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($ofertas as $oferta)
                @foreach ($postulaciones as $postulacion)
                <div x-data="{ open: false, detalleOpen: false }" class="bg-white dark:bg-gray-900 shadow rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">
                        {{ $oferta->tituloOferta }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-3">
                        {{ Str::limit($oferta->descOferta, 100) }}
                    </p>
                    <button @click="open = true"
                        class="inline-block mt-3 text-blue-600 hover:text-blue-800 font-semibold">
                        Ver más
                    </button>

                    <!-- Modal -->
                    <div x-show="open" @keydown.escape.window="open = false"
                        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
                        style="display: none;">
                        <div @click.away="open = false"
                            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full">
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">{{ $oferta->tituloOferta }}</h2>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Empresa:</strong> {{ $oferta->empresa->nomEmpresa }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Descripción:</strong> {{ $oferta->descOferta }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Requisitos:</strong> {{ $oferta->requisitos }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Salario:</strong> {{ $oferta->salario }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Modalidad:</strong> {{ $oferta->modalidad }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Ubicación:</strong> {{ $oferta->ubicacion }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-4"><strong>Publicado:</strong> {{ \Carbon\Carbon::parse($oferta->fechaPublicacion)->format('d/m/Y') }}</p>                           
                            <hr/>                       
                            <h1>Postulantes aplicados</h1>
                            <hr/> 
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Fecha Postulacion:</strong> {{ $postulacion->fechaPostulacion }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>DUI:</strong> {{ $postulacion->user->Postulante->dui }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Nombre:</strong> {{ $postulacion->user->Postulante->primerNombre }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Apellido:</strong> {{ $postulacion->user->Postulante->primerApellido }}</p>
                            
                            <!-- Botón para abrir segundo modal -->
                            <button @click="detalleOpen = true"
                                class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                Ver información completa del postulante
                            </button>
                            <hr/>

                            <!-- Segundo modal anidado -->
                            <div x-show="detalleOpen" @keydown.escape.window="detalleOpen = false"
                                class="fixed inset-0 flex items-center justify-center z-60 bg-black bg-opacity-50"
                                style="display: none;">
                                <div @click.away="detalleOpen = false"
                                    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full">
                                    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Detalle del postulante</h2>

                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Nombre completo:</strong> {{ $postulacion->user->postulante->primerNombre }} {{ $postulacion->user->postulante->segundoNombre }} {{ $postulacion->user->postulante->primerApellido }} {{ $postulacion->user->postulante->segundoApellido }}</p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>DUI:</strong> {{ $postulacion->user->postulante->dui }}</p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Teléfono:</strong> {{ $postulacion->user->postulante->numTelefono }}</p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Correo electrónico:</strong> {{ $postulacion->user->email}}</p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Fecha de nacimiento:</strong> {{ $postulacion->user->postulante->fechaNacimiento }}</p>
                                    <h1>Direcciones</h1>
                                    <hr/>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Departamento:</strong> {{ $postulacion->user->postulante->ubicacion__postulantes[0]->nomDepartamento }}</p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Municipio:</strong> {{ $postulacion->user->postulante->ubicacion__postulantes[0]->nomMunicipio }}</p>
                                    <h1>Educación</h1>
                                    <hr/>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Titulo:</strong> {{ $postulacion->user->postulante->educaciones[0]->titulo }}</p>                                    
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Institución:</strong> {{ $postulacion->user->postulante->educaciones[0]->institucion }}</p>                                     
                                    <h1>Idiomas</h1>
                                    <hr/>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Idioma:</strong> {{ $postulacion->user->postulante->idiomas[0]->idioma }}</p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Nivel:</strong> {{ $postulacion->user->postulante->idiomas[0]->nivel }}</p>
                                    <h1>Experiencia</h1>
                                    <hr/>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Puesto:</strong> {{ $postulacion->user->postulante->experiencias[0]->puesto }}</p>                                    
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Empresa:</strong> {{ $postulacion->user->postulante->experiencias[0]->empresa }}</p>
                                    <h1>Certificaciones</h1>
                                    <hr/>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Certificación:</strong> {{ $postulacion->user->postulante->certificaciones[0]->nomCert }}</p>
                                    <h1>Habilidades</h1>
                                    <hr/>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Habilidad:</strong> {{ $postulacion->user->postulante->habilidades[0]->habilidad }}</p>
                                    <button @click="detalleOpen = true"
                                        class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                        Aprobar postulante
                                    </button>

                                    <button @click="detalleOpen = false"
                                        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                        Cerrar
                                    </button>
                                </div>
                            </div>

                            <button @click="open = false"
                                class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Cerrar
                            </button>                          
                        </div>                        
                    </div>
                </div>
                @endforeach
            @endforeach
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-300">No hay ofertas con postulaciones activas.</p>
            @endif
        </div>
    </div>
    @endif
</x-app-layout>