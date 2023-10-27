@extends('layouts.main')
@section('main-section')

<!-- The Modal -->
<div class="modal-content">

    <div class="modal-body">
        <table>
            <tr>
                <th>staff Photo</th>
                <td><img class="dp" src="{{ asset('storage/' . $staff->image_path) }}" alt="staff Photo"></td>
            </tr>
            <tr>
                <th>Staff Name</th>
                <td>{{ $staff->name }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $staff->gender }}</td>
            </tr>
            <tr>
                <th>Father Name</th>
                <td>{{ $staff->father_name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $staff->number }}</td>
            </tr>
            <tr>
                <th>DOB</th>
                <td>{{ $staff->dob }}</td>
            </tr>
            <tr>
                <th>Sallery</th>
                <td>{{ $staff->sallery }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $staff->address }}</td>
            </tr>
            <tr>
                <th>Designation</th>
                <td>{{ $staff->designation }}</td>
            </tr>
        </table>
    </div>

    <div class="modal-footer">
        <a href="{{url('/staff_data')}}"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="window.print();return false;">Print</button>
    </div>

</div>

@endsection
