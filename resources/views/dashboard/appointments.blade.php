<x-user-panel>
    <main class="bg-white shadow">
        <header>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Appointments</h1>
            </div>
        </header>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="mx-auto max-w-6xl py-6 sm:px-6 lg:px-8">
            <div class="mx-auto py-6">
                <a href=" {{ route('make-appointment') }} " class="more rounded-md" >Make appointment</a>
            </div>
            <div>
                <div class="mt-6 border-t border-gray-100">
                    <dl class="divide-y divide-gray-400">
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="border-b-2 p-2 text-left">ID</th>
                                <th class="border-b-2 p-2 text-left" >Service Type</th>
                                <th class="border-b-2 p-2 text-left" >Date</th>
                                <th class="border-b-2 p-2 text-left" >Vehicle</th>
                                <th class="border-b-2 p-2 text-left" >VIN NR.</th>
                                <th class="border-b-2 p-2 text-left" >Mileage</th>
                                <th class="border-b-2 p-2 text-left" >Plate NR.</th>
                                <th class="border-b-2 p-2 text-left" >Year built</th>
                                <th class="border-b-2 p-2 text-left" >Type Approval</th>
                                <th class="border-b-2 p-2 text-left">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @if ($reservations === null)
                                        <p>No reservations found.</p>
                                    @elseif ($reservations->isEmpty())
                                        <p>No reservations found.</p>
                                    @else
                                        @foreach ($reservations as $reservation)
                                            <tr class="animate-fade-in-down">
                                                <td class="border-b p-2">{{ $reservation->reservation_id }}</td>
                                                <td class="border-b p-2">{{ implode(', ', $reservation->reservation_type) }}</td>
                                                <td class="border-b p-2">{{ $reservation->reservation_date }}</td>
                                                <td class="border-b p-2">{{ $reservation->reservation_brand}} {{ $reservation->reservation_model }}</td>
                                                <td class="border-b p-2">{{ $reservation->reservation_vin_num }}</td>
                                                <td class="border-b p-2">{{ $reservation->reservation_mileage }}</td>
                                                <td class="border-b p-2">{{ $reservation->reservation_plate_number }}</td>
                                                <td class="border-b p-2">{{ $reservation->reservation_year }}</td>
                                                <td class="border-b p-2">{{ $reservation->reservation_typeApproval }}</td>
                                                <td class="border-b p-2">{{ $reservation->reservation_description }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </tbody>
                        </table>
                    </dl>
                </div>
            </div>
        </div>
    </main>
</x-user-panel>
