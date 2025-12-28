<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Edit Booking
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto text-white">

        <form method="POST" action="{{ route('bookings.update', $booking) }}">
            @csrf
            @method('PUT')

            <!-- SERVICE -->
            <div class="mb-5">
                <label class="block mb-2">Service</label>

                <select name="service_name"
                        required
                        class="w-full p-3 rounded
                               bg-gray-200 text-gray-900
                               focus:bg-gray-200 focus:text-gray-900
                               focus:outline-none focus:ring-2 focus:ring-blue-500">

                    @foreach ([
                        'Consultation',
                        'System Maintenance',
                        'Technical Support',
                        'Security Audit'
                    ] as $service)
                        <option value="{{ $service }}"
                            @selected($booking->service_name === $service)>
                            {{ $service }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- DATE -->
            <div class="mb-5">
                <label class="block mb-2">Date</label>

                <input type="date"
                       name="booking_date"
                       value="{{ $booking->booking_date }}"
                       required
                       class="w-full p-3 rounded
                              bg-gray-200 text-gray-900
                              focus:bg-gray-200 focus:text-gray-900
                              focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- TIME -->
            <div class="mb-6">
                <label class="block mb-2">Time</label>

                <input type="time"
                       name="booking_time"
                       value="{{ $booking->booking_time }}"
                       required
                       class="w-full p-3 rounded
                              bg-gray-200 text-gray-900
                              focus:bg-gray-200 focus:text-gray-900
                              focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- BUTTONS -->
            <div class="flex gap-4">
                <button type="submit"
                        class="px-5 py-2 border border-white rounded
                               text-white hover:bg-white hover:text-black transition">
                    Update Booking
                </button>

                <a href="{{ route('bookings.index') }}"
                   class="px-5 py-2 border border-gray-400 rounded
                          text-gray-300 hover:bg-gray-300 hover:text-black transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</x-app-layout>
