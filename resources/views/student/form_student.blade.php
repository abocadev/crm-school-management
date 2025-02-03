@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (empty($data['student']))
                <h2>Crear un nuevo estudiante</h2>
            @else
                <h2>Modificar estudiante: {{ $data['student']->getName() . " " . $data['student']->getSurname() }}</h2>
            @endif
        </div>

        <div class="col-md-8">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ empty($data['student']) ? route('students.store') : route('students.update', $data['student']) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @if (!empty($data['student']))
                    @method('PUT')
                @endif

                <div class="form-group mb-4">
                    <label class="form-label" for="student_name">Nombre del estudiante:</label>
                    <input class="form-control" name="student_name" type="text" value="{{ empty($data['student']) ? null : $data['student']->getName() }}" required>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="student_surname">Apellidos del estudiante:</label>
                    <input name="student_surname" class="form-control" type="text" value="{{ empty($data['student']) ? null : $data['student']->getSurname() }}" required>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="student_hometown">Ciudad natal (opcional):</label>
                    <input class="form-control" name="student_hometown" type="text" value="{{ empty($data['student']) ? null : $data['student']->getHometown() }}">
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="student_birthday">Fecha de nacimiento:</label>
                    <input class="form-control" name="student_birthday" type="date" value="{{ empty($data['student']) ? null : $data['student']->getBirthday() }}" required>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="student_school">Selecciona escuela (opcional):</label>
                    <select class="form-select" name="student_school">
                        <option value="{{ null }}"{{ empty($data['student']) || empty($data['student']->getSchool()) ? 'selected' : ''}}>-- Selecciona una escuela --</option>
                        @foreach ($data['schools'] as $school)
                            <option value="{{$school->getId()}}"
                                {{ !empty($data['student']) && !empty($data['student']->getSchool()) && $data['student']->getSchool()->getId() == $school->getId() ? 'selected' : '' }}
                            >
                                {{ $school->getId() . ". " . $school->getName() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <input class="btn btn-primary" type="submit" value="{{ empty($data['student']) ? 'Crear estudiante' : 'Modificar estudiante' }}">
            </form>
        </div>
    </div>
@endsection
