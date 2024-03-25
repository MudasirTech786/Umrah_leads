@extends('website_layouts.master')

@section('custom_styles')
    <!-- Any custom styles go here -->
@endsection

@section('content')
    <div>
        <!-- Currency selection dropdown -->
        <select id="currencySelect">
            <option value="SAR">SAR</option>
            <option value="USD">USD</option>
            <option value="PKR">PKR</option>
        </select>

        <!-- Displayed costs -->
        <p id="totalCost"><b>Total Cost:</b> {{ $total_cost }} SAR</p>
        <p id="hotelRoomPrice"><b>Hotel Room Price:</b> {{ $hotel_room_price }} SAR</p>
        <p id="hotelRoomPriceDay"><b>Hotel Room Per Day Price:</b> {{ $hotel_room_perday_price }} SAR</p>
        <p id="transportPrice"><b>Transport Cost:</b> {{ $transport_cost }} SAR</p>
        <p id="visa"><b>Visa Cost:</b> {{ $visa }} SAR</p>
    </div>

    <!-- JavaScript for currency conversion -->
    <script>
        // Add event listener for currency selection dropdown
        document.getElementById('currencySelect').addEventListener('change', function() {
            // Get the selected currency
            var selectedCurrency = this.value;

            // Perform calculations based on the selected currency
            switch (selectedCurrency) {
                case 'USD':
                    // Convert costs to USD based on the conversion rate
                    usd_price = {{ $sar_to_usd }};
                    total_cost = {{ $total_cost }} * usd_price;
                    hotel_room_price = {{ $hotel_room_price }} * usd_price;
                    hotel_room_perday_price = {{ $hotel_room_perday_price }} * usd_price;
                    transport_cost = {{ $transport_cost }} * usd_price;
                    visa = {{ $visa }} * usd_price;
                    // Adjust other costs accordingly
                    break;
                case 'PKR':
                    // Convert costs to PKR based on the conversion rate
                    pkr_price = {{ $sar_to_pkr }};
                    total_cost = {{ $total_cost }} * pkr_price;
                    hotel_room_price = {{ $hotel_room_price }} * pkr_price;
                    hotel_room_perday_price = {{ $hotel_room_perday_price }} * pkr_price;
                    transport_cost = {{ $transport_cost }} * pkr_price;
                    visa = {{ $visa }} * pkr_price;
                    // Adjust other costs accordingly
                    break;
                case 'SAR':
                    // Convert costs to PKR based on the conversion rate
                    total_cost = {{ $total_cost }};
                    hotel_room_price = {{ $hotel_room_price }};
                    hotel_room_perday_price = {{ $hotel_room_perday_price }};
                    transport_cost = {{ $transport_cost }};
                    visa = {{ $visa }};
                    // Adjust other costs accordingly
                    break;
                    // SAR is the default currency, no conversion needed
                default:
                    break;
            }

            // Update the displayed costs on the page
            document.getElementById('totalCost').innerHTML = '<b>Total Cost:</b> ' + total_cost.toFixed(2) + ' ' +
                selectedCurrency;
            document.getElementById('hotelRoomPrice').innerHTML = '<b>Hotel Room Price:</b> ' + hotel_room_price
                .toFixed(2) + ' ' + selectedCurrency;
            document.getElementById('hotelRoomPriceDay').innerHTML = '<b>Hotel Room Per Day Price:</b> ' +
                hotel_room_perday_price.toFixed(2) + ' ' + selectedCurrency;
            document.getElementById('transportPrice').innerHTML = '<b>Transport Cost:</b> ' + transport_cost
                .toFixed(2) + ' ' + selectedCurrency;
            document.getElementById('visa').innerHTML = '<b>Visa Cost:</b> ' + visa.toFixed(2) + ' ' +
                selectedCurrency;
            // Update other cost elements accordingly
        });
    </script>
@endsection
