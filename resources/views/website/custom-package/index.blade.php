@extends('website_layouts.master')

@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('css/customPackage.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <style>
        /* Add More Button Style */
        #addMoreBtn {
            background-color: #4CAF50;
            /* Green background */
            border: none;
            color: white;
            padding: 10px 20px;
            /* Padding for better spacing */
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            /* Add margin for spacing */
            cursor: pointer;
            border-radius: 5px;
            /* Rounded corners */
            transition-duration: 0.4s;
            /* Smooth hover transition */
        }

        #addMoreBtn:hover {
            background-color: #45a049;
            /* Darker green on hover */
        }
    </style>
    <div class="mx-auto min-h-[500px] relative flex flex-col items-center justify-center py-20 my-20">
        <video autoplay muted loop class="-z-10 h-full w-full absolute top-0 left-0 object-cover">
            <source src="{{ asset('videos/package-bg.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="bg-white/80 p-10  pb-20 rounded-xl  lg:w-[80%] max-w-[1000px] ">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Dayim!</b>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br><br>
            @endif
            <h2 class="text-green-600">Note: The rates may vary, kindly contact admin by clicking <a href="/contact"
                    class="text-red-600">this link</a> </h2>
            <form method="POST" action="{{ route('calculate.calculate_package_result') }}" class="space-y-2"
                id="custom-package-form" enctype="multipart/form-data">
                @csrf
                <!-- Select Stay in Makkah -->
                <h4 class="font-semibold text-sm ">Select Stay in Makkah</h4>
                <div class="flex flex-col md:flex-row stay relative">
                    <select id="makkah_hotel" name="makkah_hotel"
                        class="place w-full  border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400">
                        <option value="">Select Hotel</option>
                        @foreach ($makkah_hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                        @endforeach
                    </select>

                    <select id="makkah_hotel_room_type" name="makkah_hotel_room_type"
                        class="place  border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400 ">
                        <option value="">Select Room Type</option>
                        <option value="1">Single</option>
                        <option value="2">Double</option>
                        <option value="3">Triple</option>
                        <option value="4">Quad</option>
                    </select>

                    <div class=" flex items-center relative ">
                        <i class="fa-regular fa-calendar absolute left-3 text-gray-400"></i>
                        <input type="text" id="makkah_hotel_start_date" name="makkah_hotel_start_date"
                            placeholder="Start Date"
                            class="startDate pl-10 h-full w-full border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400">
                    </div>

                    <div class="flex items-center relative ">
                        <i class="fa-regular fa-calendar absolute left-3 text-gray-400"></i>
                        <input type="text" id="makkah_hotel_end_date" name="makkah_hotel_end_date" placeholder="End Date"
                            class="endDate pl-10 h-full w-full border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400">
                    </div>
                </div>

                <!-- Select Stay in Madinah -->
                <h4 class="font-semibold text-sm pt-3">Select Stay in Madinah</h4>
                <div class="flex flex-col md:flex-row stay relative">
                    <select id="madinah_hotel" name="madinah_hotel"
                        class="place  border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400 h-[40px]">
                        <option value="">Select Hotel</option>
                        @foreach ($madina_hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                        @endforeach
                    </select>

                    <select id="madinah_hotel_room_type" name="madinah_hotel_room_type"
                        class="place  border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400 h-[40px]">
                        <option value="">Select Room Type</option>
                        <option value="1">Single</option>
                        <option value="2">Double</option>
                        <option value="3">Triple</option>
                        <option value="4">Quad</option>
                    </select>

                    <div class=" flex items-center relative h-[40px]">
                        <i class="fa-regular fa-calendar absolute left-3 text-gray-400"></i>
                        <input type="text" id="madinah_hotel_start_date" name="madinah_hotel_start_date"
                            placeholder="Start Date"
                            class="startDate pl-10 h-full w-full border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400">
                    </div>

                    <div class=" flex items-center relative h-[40px]">
                        <i class="fa-regular fa-calendar absolute left-3 text-gray-400"></i>
                        <input type="text" id="madinah_hotel_end_date" name="madinah_hotel_end_date"
                            placeholder="End Date"
                            class="endDate pl-10 h-full w-full border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400">
                    </div>
                </div>

                <!-- Transport in Makah -->
                <h4 class="font-semibold text-sm pt-3">Select Transport </h4>
                <div id="RoutesDiv">
                    <div class="flex flex-col md:flex-row stay relative">
                        <select id="route" name="route[]"
                            class="place  border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400 h-[40px]">
                            <option value="">Select Route</option>
                            @foreach ($routes as $route)
                                <option value="{{ $route->id }}">{{ $route->name }}</option>
                            @endforeach
                        </select>

                        <select id="vehicle" name="vehicle[]"
                            class="place  border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400 h-[40px]">
                            <option value="">Select Vehicle</option>
                            @foreach ($transport_types as $trantransport_type)
                                <option value="{{ $trantransport_type->id }}">{{ $trantransport_type->name }}</option>
                            @endforeach
                        </select>

                        <div class=" flex items-center relative h-[40px]">
                            <i class="fa-regular fa-calendar absolute left-3 text-gray-400"></i>
                            <input type="date" id="travel_date" name="travel_date[]" placeholder="Date"
                                class="startDate pl-10 h-full w-full border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400">
                        </div>
                    </div>
                </div>
                <button id="addMoreBtn" class="btn btn-primary">Add More</button>



                <!-- Visa -->
                <h4 class="font-semibold text-sm pt-3">Select Visa</h4>
                <div class="flex flex-col md:flex-row  relative">
                    <select
                        class="residence_country border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400 h-[40px]"
                        name="visa">
                        <option value="umrah" selected>Umrah Visa</option>
                    </select>

                    {{-- <select
                        class="nationality border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400 h-[40px]" name="nationality">
                        <option value="">Select Nationality</option>
                        <option value="one">1</option>
                        <option value="two">2</option>
                        <option value="three">3</option>
                    </select> --}}
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-[#c02428] mt-6 py-2 px-2 rounded-md hover:bg-red-500 text-white">Calculate your
                        package</button>
                </div>
            </form>
        </div>


    </div>
    <script>
        $(document).ready(function() {
            $('#makkah_hotel').change(function() {
                var selectedValue = $(this).val();
                // Make AJAX request
                $.ajax({
                    url: '{{ route('calculate.hotel_room_type') }}',
                    method: 'POST',
                    data: {
                        selectedValue: selectedValue
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Extract data from the response
                        var responseData = response.data;

                        populate_makkah_hotel_room_type(responseData);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });



            });

            function populate_makkah_hotel_room_type(data) {
                var options = '<option value="">Select Room Type</option>'; // Add a default option

                // Loop through the data and create options for the second dropdown
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                }

                // Populate the second dropdown with options
                $('#makkah_hotel_room_type').html(options);
            }


            $('#addMoreBtn').click(function(e) {
                e.preventDefault();
                var newInputGroup = $('<div class="flex flex-col md:flex-row stay relative">' +
                    '<select name="route[]" class="place border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400 h-[40px]">' +
                    '<option value="">Select Route</option>' +
                    '@foreach ($routes as $route)' +
                    '<option value="{{ $route->id }}">{{ $route->name }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '<select name="vehicle[]" class="place border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400 h-[40px]">' +
                    '<option value="">Select Vehicle</option>' +
                    '@foreach ($transport_types as $trantransport_type)' +
                    '<option value="{{ $trantransport_type->id }}">{{ $trantransport_type->name }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '<div class="flex items-center relative h-[40px]">' +
                    '<i class="fa-regular fa-calendar absolute left-3 text-gray-400"></i>' +
                    '<input type="date" name="travel_date[]" placeholder="Date" class="startDate pl-10 h-full w-full border-gray-400 rounded-md text-gray-900 text-sm focus:border-gray-400">' +
                    '<button class="deleteBtn">Delete</button>' +
                    '</div>' +
                    '</div>');

                // Append the new HTML structure to the container
                $('#RoutesDiv').append(newInputGroup);
                initFlatpickr(newInputGroup[0]);
            });

            // Add click event listener to dynamically added delete buttons using event delegation
            $('#RoutesDiv').on('click', '.deleteBtn', function(e) {
                e.preventDefault();
                $(this).closest('.stay').remove(); // Adjusted the selector here
            });
        });

        const initialFields = document.querySelectorAll('.stay'); // Select all initial fields

        const initFlatpickr = function(element) {
            const startDateInput = flatpickr(element.querySelector(".startDate"), {
                minDate: "today",
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr, instance) {
                    endDateInput.disabled = false;

                    const minEndDate = instance.selectedDates[0];
                    minEndDate.setDate(minEndDate.getDate() + 5);
                    endDateInput.set("minDate", minEndDate);
                }
            });

            const endDateInput = flatpickr(element.querySelector(".endDate"), {
                dateFormat: "Y-m-d",
                disable: [new Date()],
            });
        };




        // Initialize Flatpickr for the initial fields
        initialFields.forEach(initFlatpickr);

        function addNewDiv() {
            // Clone the first div with the class "stay"
            const newDiv = document.querySelector('.stay').cloneNode(true);

            // Clear values in the new div (optional)
            const inputElements = newDiv.querySelectorAll('input');
            inputElements.forEach(input => input.value = '');

            // Create a "Remove" button
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.innerHTML =
                '<i class="fa-solid fa-minus text-red-500 absolute right-[-25px] bottom-0"></i>';
            removeButton.onclick = function() {
                // Remove the parent div when the "Remove" button is clicked
                newDiv.remove();
            };

            // Append the "Remove" button to the new div
            newDiv.appendChild(removeButton);

            // Append the new div to the form
            // document.getElementById('custom-package-form').appendChild(newDiv);
            document.querySelector(".stay").insertAdjacentElement('afterend', newDiv);

            // Initialize Flatpickr for the new fields
            initFlatpickr(newDiv);
        }

        function getFormValues() {
            let error = false;
            const formData = [];
            const allFields = document.querySelectorAll('.stay');

            allFields.forEach(field => {
                const placeValue = field.querySelector('.place').value;
                const startDateValue = field.querySelector('.startDate').value;
                const endDateValue = field.querySelector('.endDate').value;
                const personsValue = field.querySelector('.persons').value;
                if (placeValue === "" || startDateValue === "" || endDateValue === "" ||
                    personsValue === "") {
                    error = true;
                }
                formData.push({
                    place: placeValue,
                    startDate: startDateValue,
                    endDate: endDateValue,
                    persons: personsValue
                });
            });

            const journey = document.querySelector(".journey").value;
            const vehiclequantity = document.querySelector(".vehiclequantity").value;
            const vehicle = document.querySelector(".vehicle").value;
            const operator_comapny = document.querySelector(".operator_comapny").value;
            const residence_country = document.querySelector(".residence_country").value;
            const nationality = document.querySelector(".nationality").value;

            if (journey === "" || vehiclequantity === "" || vehicle === "" || operator_comapny === "" ||
                residence_country === "" || nationality === "") {
                error = true;
            }

            formData.push({
                journey: journey,
                vehiclequantity: vehiclequantity,
                vehicle: vehicle,
                operator_comapny: operator_comapny,
                residence_country: residence_country,
                nationality: nationality
            });

            if (error === true) {
                return alert("All fields are required");
            }
            console.log(formData);
            console.log("error = " + error);
            // You can now use the formData array as needed (e.g., send it to the server).
        }
    </script>



@endsection
