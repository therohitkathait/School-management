@extends('project.setting')

@section('setting-section')

<div id="profile" class="tabcontent">
    <h3>Update School Details</h3>
	<form action="{{ url('/school_profile') }}" method="post">
		@csrf

		<input type="text" name="schoolname" value="{{ $school_detail->schoolname }}" placeholder="School name" />
        <input type="text" name="reg" value="{{ $school_detail->reg }}" placeholder="Reg." />
        <input type="text" name="dise_code" value="{{ $school_detail->dise_code }}" placeholder="School Dise" />
        <input type="text" name="school_address" value="{{ $school_detail->school_address }}" placeholder="Address" />
        <input type="submit" name="Update" value="Update" />

	</form>
	<h3>Update Password</h3>
		<form action="{{ url('/school_pass') }}" method="post">
			@csrf
		<input type="password" name="password"  placeholder="Password" />
		
		<input type="submit" name="Updatepass" value="Update" />
	</form>
</div>

@endsection
