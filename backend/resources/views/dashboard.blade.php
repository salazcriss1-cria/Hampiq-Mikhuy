<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Panel de Miembro - Hampiq Mikhuy') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#0b0f14] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @if(session('success'))
                <div class="bg-emerald-500/20 border border-emerald-500 text-emerald-300 p-4 rounded-xl text-sm shadow-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Panel de Bienvenida y Funciones Existentes -->
            <div class="bg-[#111c26] border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6 text-white">
                <h3 class="text-2xl font-bold mb-4">¡Bienvenido, {{ Auth::user()->name }}! 🌿</h3>
                <p class="text-gray-300 mb-6">Estás conectado al área exclusiva de miembros de Hampiq Mikhuy. Aquí podrás gestionar tu progreso de salud, recetas y hábitos.</p>
                
                <!-- Acceso rápido a funciones -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-[#1a2634] p-4 rounded-lg border border-gray-600">
                        <h4 class="font-bold text-lg mb-2">💧 Tu Registro de Hidratación</h4>
                        <p class="text-sm text-gray-400">Pronto podrás guardar tus avances diarios de agua directamente en tu cuenta.</p>
                    </div>
                    <div class="bg-[#1a2634] p-4 rounded-lg border border-gray-600">
                        <h4 class="font-bold text-lg mb-2">🍳 Recetas Exclusivas</h4>
                        <p class="text-sm text-gray-400">Contenido nutricional y preparaciones orientadas a la salud.</p>
                    </div>
                </div>
            </div>

            <!-- Sección de Planes VIP (Visible solo para usuarios con rol 'user') -->
            @if(Auth::user()->role === 'user')
                <div class="text-center my-10">
                    <h3 class="text-3xl font-extrabold text-white tracking-tight">Selecciona tu Plan VIP</h3>
                    <p class="text-gray-400 text-sm mt-2">Accede a recetarios andinos exclusivos, guías metabólicas y soporte prioritario.</p>
                </div>

                <!-- Tarjetas de Precios estilo Dark / Glow -->
                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto items-stretch">
                    
                    <!-- PLAN ANUAL (Destacado) -->
                    <div class="relative bg-[#0d131a] rounded-3xl p-8 border-2 border-transparent bg-clip-border text-white shadow-2xl flex flex-col justify-between"
                        style="border-image: linear-gradient(to bottom, #ff3b30, #ff9500) 1;">
                        
                        <!-- Badge Superior -->
                        <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-pink-500 to-rose-500 text-white font-black text-xs px-5 py-2 rounded-full uppercase tracking-wider shadow-lg whitespace-nowrap">
                            EL MÁS ELEGIDO · 3 MESES GRATIS
                        </div>

                        <div>
                            <span class="text-xs font-bold text-gray-400 tracking-widest uppercase">PLAN ANUAL</span>
                            <p class="text-gray-300 text-sm mt-1">El proceso completo, de principio a fin</p>

                            <div class="my-6 flex items-baseline gap-1">
                                <span class="text-2xl font-bold text-orange-500">$</span>
                                <span class="text-5xl font-extrabold text-orange-500 tracking-tight">13,9</span>
                            </div>
                            <p class="text-xs text-gray-400 -mt-4 mb-4">USD / mes · un solo pago de $167 USD por 12 meses</p>

                            <div class="flex items-center gap-2 mb-6">
                                <span class="text-gray-500 line-through text-xs">$236,40</span>
                                <span class="bg-pink-950/80 text-pink-400 text-xs font-bold px-3 py-1 rounded-full border border-pink-700/50">
                                    Ahorras $69,40 al año
                                </span>
                            </div>

                            <div class="bg-[#171b22] border border-red-900/40 rounded-xl p-4 mb-6 text-xs text-gray-300 leading-relaxed">
                                <strong class="text-red-400 font-bold block mb-1">Son $0,46 al día.</strong> 
                                Menos de lo que cuesta un café, con tu guía nutricional en el bolsillo todo el año.
                            </div>

                            <ul class="space-y-3 text-xs text-gray-300 mb-8">
                                <li class="flex items-start gap-2">
                                    <span class="text-rose-500 font-bold">✓</span> 12 meses seguidos, sin cortes ni cobros mes a mes
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-rose-500 font-bold">✓</span> Tiempo real para ver resultados en tu salud
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-rose-500 font-bold">✓</span> Tu precio queda congelado durante todo el año
                                </li>
                            </ul>
                        </div>

                        <div>
                            <a href="{{ route('subscription.index') }}" 
                                class="block w-full text-center bg-gradient-to-r from-orange-500 via-rose-500 to-pink-500 hover:opacity-95 text-white font-bold py-4 px-6 rounded-2xl shadow-[0_0_25px_rgba(255,87,34,0.4)] transition-all transform hover:-translate-y-0.5">
                                Quiero el plan anual y ahorrar $69
                            </a>
                            <div class="flex justify-center gap-4 text-[10px] text-gray-400 mt-3 font-medium">
                                <span>✓ Pago seguro</span>
                                <span>✓ Yape / Plin / Transferencia</span>
                            </div>
                        </div>
                    </div>

                    <!-- PLAN MENSUAL -->
                    <div class="bg-[#0d131a] rounded-3xl p-8 border border-gray-800 text-white shadow-xl flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-bold text-gray-400 tracking-widest uppercase">PLAN MENSUAL</span>
                            <p class="text-gray-300 text-sm mt-1">Flexible, mes a mes</p>

                            <div class="my-6 flex items-baseline gap-1">
                                <span class="text-2xl font-bold text-orange-500">$</span>
                                <span class="text-5xl font-extrabold text-orange-500 tracking-tight">19,7</span>
                            </div>
                            <p class="text-xs text-gray-400 -mt-4 mb-6">USD / mes · al año pagas $236,40 USD</p>

                            <hr class="border-gray-800 my-6">

                            <p class="text-xs text-gray-400 leading-relaxed mb-8">
                                Acceso completo a Hampiq Mikhuy VIP, sin compromiso de permanencia. Cancelas cuando quieras.
                            </p>
                        </div>

                        <div>
                            <a href="{{ route('subscription.index') }}" 
                                class="block w-full text-center bg-gradient-to-r from-orange-500 to-pink-500 hover:opacity-95 text-white font-bold py-4 px-6 rounded-2xl shadow-[0_0_20px_rgba(255,87,34,0.2)] transition-all">
                                Empezar con el plan mensual
                            </a>
                            <p class="text-center text-[10px] text-gray-400 mt-3">✓ Se renueva cada mes</p>
                        </div>
                    </div>

                </div>
            @endif

        </div>
    </div>
</x-app-layout>