<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            My Bookings
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto text-white">

        <!-- Create Button -->
        <div class="mb-6">
            <a href="{{ route('bookings.create') }}"
               class="inline-block px-5 py-2 border border-white rounded
                      text-white hover:bg-white hover:text-black transition">
                + Create New Booking
            </a>
        </div>

        <!-- Booking List -->
        <ul>
            @forelse ($bookings as $booking)
                <li class="mb-4 p-4 border border-white rounded bg-gray-800">
                    <strong>{{ $booking->service_name }}</strong><br>
                    Date: {{ $booking->booking_date }}<br>
                    Time: {{ $booking->booking_time }}

                    <div class="mt-3">
                        <a href="{{ route('bookings.edit', $booking) }}"
                           class="underline mr-4 text-blue-400">
                            Edit
                        </a>

                        <form action="{{ route('bookings.destroy', $booking) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Delete this booking?')"
                                    class="underline text-red-400">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="p-4 border border-white rounded bg-gray-800 text-white">
                    No bookings found.
                </li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
