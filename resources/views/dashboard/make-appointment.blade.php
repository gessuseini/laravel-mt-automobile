<x-user-panel>
    <h1>Create Reservation</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="/appointments" method="post">
        @csrf
        <label for="customer_id">Customer:</label>
        <select name="customer_id" id="customer_id">
            @foreach ($customers as $customer)
                <option value="{{ $customer->customer_id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
            @endforeach
        </select><br>
        <label for="reservation_date">Reservation Date:</label>
        <input type="date" name="reservation_date" required><br>
        <label for="vehicle_type">Vehicle Type:</label>
        <input type="text" name="vehicle_type" required><br>
        <label for="total_amount">Total Amount:</label>
        <input type="number" name="total_amount" step="0.01" required><br>
        <label for="status">Status:</label>
        <input type="text" name="status" required><br>
        <button type="submit">Add Reservation</button>
    </form>
</x-user-panel>
