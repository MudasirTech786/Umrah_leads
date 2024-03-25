<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transport Validity About To Expire In One Day</title>
</head>
<body>
    <?php 
    $costItem = $formData['costs'][0];
    $routeItem = $formData['route']; ?>
    <h2>Transport Validity About To Expire In One Day</h2>
    @if($formData->transport_type_id == "1")
    <p><b>Transport Type:</b> Bus</p>
    @endif
    @if($formData->transport_type_id == "2")
    <p><b>Transport Type:</b> Car</p>
    @endif
    @if($formData->transport_type_id == "3")
    <p><b>Transport Type:</b> Wagon</p>
    @endif
    @if($formData->transport_type_id == "4")
    <p><b>Transport Type:</b> Coach</p>
    @endif
    
    <p><b>Route:</b> {{$routeItem->name}}</p>

    @foreach ($formData['costs'] as $costItem)
    
    @php
        $validityDate = \Carbon\Carbon::parse($costItem['validity']);
        $currentDate = \Carbon\Carbon::now();
        $daysDifference = $validityDate->diffInDays($currentDate);
    @endphp

    @if ($daysDifference == 0)
    <p><b>Cost:</b> SAR {{ $costItem['cost']}} </p>
    <p><b>Validity:</b> {{ $costItem['validity'] }}</p>
    @endif
@endforeach
</body>
</html>