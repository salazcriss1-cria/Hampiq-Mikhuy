<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight flex items-center gap-2">
            <span>🛡️</span> {{ __('Panel de Administración - Gestión de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#111c26] border border-gray-700 shadow-xl sm:rounded-lg p-6 text-white">
                
                @if(session('success'))
                    <div class="mb-4 bg-emerald-500/20 border border-emerald-500 text-emerald-300 p-4 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <h3 class="text-xl font-bold text-emerald-400 mb-4">Usuarios Registrados en Hampiq Mikhuy</h3>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-700 text-gray-400 text-sm">
                                <th class="p-3">Nombre</th>
                                <th class="p-3">Correo Electrónico</th>
                                <th class="p-3">Rol Actual</th>
                                <th class="p-3">Acciones (Cambiar Rol)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700/50 text-sm">
                            @foreach($users as $u)
                                <tr class="hover:bg-[#1a2634] transition">
                                    <td class="p-3 font-medium text-white">{{ $u->name }}</td>
                                    <td class="p-3 text-gray-300">{{ $u->email }}</td>
                                    <td class="p-3">
                                        <span class="px-2.5 py-1 rounded-full text-xs font-bold 
                                            @if($u->role === 'admin') bg-purple-500/20 text-purple-300 border border-purple-500
                                            @elseif($u->role === 'member') bg-emerald-500/20 text-emerald-300 border border-emerald-500
                                            @else bg-gray-600/30 text-gray-300 border border-gray-500 @endif">
                                            {{ strtoupper($u->role) }}
                                        </span>
                                    </td>
                                    <td class="p-3">
                                        <form action="{{ route('admin.users.update', $u->id) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            @method('PATCH')
                                            <select name="role" class="bg-[#1a2634] border border-gray-600 text-white text-xs rounded px-2 py-1 focus:ring-emerald-500 focus:border-emerald-500">
                                                <option value="user" {{ $u->role == 'user' ? 'selected' : '' }}>User</option>
                                                <option value="member" {{ $u->role == 'member' ? 'selected' : '' }}>Member</option>
                                            </select>
                                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white text-xs px-3 py-1 rounded transition">
                                                Actualizar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>