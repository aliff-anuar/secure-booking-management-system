<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Admin – All Bookings
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto text-white">

        <div class="overflow-x-auto">
            <table class="w-full border border-white rounded">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="border border-white px-4 py-2">User</th>
                        <th class="border border-white px-4 py-2">Service</th>
                        <th class="border border-white px-4 py-2">Date</th>
                        <th class="border border-white px-4 py-2">Time</th>
                        <th class="border border-white px-4 py-2">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($bookings as $booking)
                        <tr class="bg-gray-700">
                            <td class="border border-white px-4 py-2">
                                {{ $booking->user->email }}
                            </td>
                            <td class="border border-white px-4 py-2">
                                {{ $booking->service_name }}
                            </td>
                            <td class="border border-white px-4 py-2">
                                {{ $booking->booking_date }}
                            </td>
                            <td class="border border-white px-4 py-2">
                                {{ $booking->booking_time }}
                            </td>
                            <td class="border border-white px-4 py-2">
                                <form method="POST"
                                      action="{{ route('admin.bookings.destroy', $booking) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Delete this booking?')"
                                            class="underline text-red-400">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="text-center p-4 bg-gray-800 text-white">
                                No bookings found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
