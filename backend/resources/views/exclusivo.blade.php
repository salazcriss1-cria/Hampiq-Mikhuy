<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight flex items-center gap-2">
            <span>👑</span> {{ __('Área Exclusiva de Miembros - Hampiq Mikhuy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Banner de Bienvenida VIP -->
            <div class="bg-[#111c26] border border-gray-700 shadow-xl sm:rounded-lg p-8 text-white relative overflow-hidden">
                <div class="absolute right-4 top-4 text-6xl opacity-10">🌿</div>
                <h3 class="text-2xl font-bold text-emerald-400 mb-2">¡Bienvenido al espacio de bienestar avanzado, {{ Auth::user()->name }}!</h3>
                <p class="text-gray-300 max-w-3xl">
                    Como miembro activo de Hampiq Mikhuy, tienes acceso prioritario a formulaciones culinarias ancestrales, seguimientos metabólicos y guías de salud integrativa diseñadas para potenciar tu vitalidad.
                </p>
            </div>

            <!-- Grid de Secciones Exclusivas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Tarjeta 1: Recetas Andinas VIP -->
                <div class="bg-[#111c26] p-6 rounded-lg border border-gray-700 shadow-lg flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-2xl">🍲</span>
                            <h4 class="font-bold text-xl text-emerald-400">Recetario Terapéutico Andino</h4>
                        </div>
                        <p class="text-sm text-gray-300 mb-4">
                            Preparaciones orientadas a la recuperación y refuerzo inmunitario a base de granos andinos (quinua, kiwicha), raíces y hierbas medicinales de Huamancaca Chico y la región.
                        </p>
                        <ul class="text-xs text-gray-400 space-y-2 mb-6 border-t border-gray-700 pt-4">
                            <li>• Sopa reconstituyente de kiwicha con hierbas nativas.</li>
                            <li>• Infusiones de muña y eucalipto para el equilibrio respiratorio.</li>
                            <li>• Omelet funcional con vegetales andinos y selector de energía.</li>
                        </ul>
                    </div>
                    <button class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-2 px-4 rounded transition text-sm w-full">
                        Ver Recetas Completas
                    </button>
                </div>

                <!-- Tarjeta 2: Hidratación y Hábitos (Conectado a BD) -->
                <div class="bg-[#111c26] p-6 rounded-lg border border-gray-700 shadow-lg flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-2xl">💧</span>
                            <h4 class="font-bold text-xl text-emerald-400">Tu Registro de Hidratación Diario</h4>
                        </div>
                        <p class="text-sm text-gray-300 mb-4">
                            Controla tu consumo diario de agua para mantener el balance metabólico óptimo. Tus datos se guardan automáticamente en tu cuenta.
                        </p>
                        
                        <!-- Widget Interactivo de Agua -->
                        <div class="bg-[#1a2634] p-4 rounded-lg border border-gray-600 flex items-center justify-between mb-4">
                            <div>
                                <span id="water-count" class="text-3xl font-extrabold text-white">0</span>
                                <span class="text-sm text-gray-400"> / 8 vasos recomendados</span>
                            </div>
                            <div class="flex gap-2">
                                <button onclick="updateWater(-1)" class="bg-red-500/20 border border-red-500 text-red-300 px-3 py-1.5 rounded-lg hover:bg-red-500/30 font-bold transition">-</button>
                                <button onclick="updateWater(1)" class="bg-emerald-500/20 border border-emerald-500 text-emerald-300 px-3 py-1.5 rounded-lg hover:bg-emerald-500/30 font-bold transition">+</button>
                            </div>
                        </div>
                    </div>
                    <span class="text-xs text-gray-400 text-center">Sincronizado en tiempo real con la base de datos ⚡</span>
                </div>

            </div>

        </div>
    </div>

    <!-- Script de Sincronización de Hidratación -->
    <script>
        const csrfToken = "{{ csrf_token() }}";

        document.addEventListener("DOMContentLoaded", function() {
            fetch('/water/get')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('water-count').innerText = data.glasses;
                })
                .catch(error => console.error('Error al cargar hidratación:', error));
        });

        function updateWater(change) {
            let currentCount = parseInt(document.getElementById('water-count').innerText);
            let newCount = currentCount + change;
            if (newCount < 0) newCount = 0;

            fetch('/water/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ glasses_count: newCount })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    document.getElementById('water-count').innerText = data.glasses;
                }
            })
            .catch(error => console.error('Error al actualizar hidratación:', error));
        }
    </script>
</x-app-layout>