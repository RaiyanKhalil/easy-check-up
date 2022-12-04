@php
$doctorId = 1;
if(isset($_GET['doctor_id'])){ 
    $doctorId = $_GET['doctor_id']; 
};
@endphp

<form action="/appointment/create" method="POST">
    @csrf
    <input type="date" name="appointment_date" value=""/>
    <select name="appointment_time">
        <option value="09:00:00">
            09:00 - 10:00am
        </option>
        <option value="10:00:00">
            10:00 - 11:00am
        </option>
        <option value="11:00:00">
            11:00am - 12:00nn
        </option>
    </select>
    <input class="d-none" name="doctor_id" type="number" value={{$doctorId}}>

    <button type="submit">Book Appointment</button>
</form>