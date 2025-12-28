<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Audit Logs
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto text-white">

        <table class="w-full bg-white text-black rounded">
            <thead>
                <tr>
                    <th class="p-2">User</th>
                    <th class="p-2">Action</th>
                    <th class="p-2">Entity</th>
                    <th class="p-2">Entity ID</th>
                    <th class="p-2">Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr class="border-b">
                        <td class="p-2">{{ $log->user->email ?? 'System' }}</td>
                        <td class="p-2">{{ $log->action }}</td>
                        <td class="p-2">{{ $log->entity }}</td>
                        <td class="p-2">{{ $log->entity_id }}</td>
                        <td class="p-2">{{ $log->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
