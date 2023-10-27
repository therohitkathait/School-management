@extends('layouts.main')

@section('main-section')
    <div class="contenier">
        <h1>Upload your CSV file here</h1>

        <form action="{{ route('upload.csv') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="csv_file" style="opacity : 1;margin:auto;padding-top: 10px;border-radius:1px;width:15%;border:none;">
            </div>
            <button type="submit" style="margin-top:90px;">Upload CSV</button>
        </form>
    </div>

@endsection
