@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('components.schoolTable', ['schools' => $data['schools']])
            @include('components.studentsTable', ['students' => $data['students']])
        </div>
    </div>
</div>
@endsection
