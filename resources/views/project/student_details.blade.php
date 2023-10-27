@extends('layouts.main')
@section('main-section')

<!-- The Modal -->
<div class="modal-content">

    <div class="modal-body">
        <table>
            <tr>
                <th>Student Photo</th>
                <td><img class="dp" src="{{ asset('storage/' . $student->image_path) }}" alt="Student Photo"></td>
            </tr>
            <tr>
                <th>Student Name</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $student->gender }}</td>
            </tr>
            <tr>
                <th>Father Name</th>
                <td>{{ $student->father_name }}</td>
            </tr>
            <tr>
                <th>Class</th>
                <td>{{ $student->class_name }}</td>
            </tr>
            <tr>
                <th>Mother Name</th>
                <td>{{ $student->mother_name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $student->number }}</td>
            </tr>
            <tr>
                <th>DOB</th>
                <td>{{ $student->dob }}</td>
            </tr>
            <tr>
                <th>Aadhar</th>
                <td>{{ $student->aadhar_number }}</td>
            </tr>
            <tr>
                <th>Samagra id</th>
                <td>{{ $student->samagra_id }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $student->address }}</td>
            </tr>
        </table>
    </div>

    <div class="modal-footer">
        <a href="{{url('/student_list')}}"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="window.print();return false;">Print</button>
    </div>

</div>

@endsection
