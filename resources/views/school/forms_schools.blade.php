@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (empty($data['school']))
                    <h2>Crear una nueva escuela</h2>
                @else
                    <h2>Modificar la escuela: {{ $data['school']->getName() }}</h2>
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
                <form action="{{ empty($data['school']) ? route('schools.store') : route('schools.update', $data['school']) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    @if (!empty($data['school']))
                        @method('PUT')
                    @endif

                    <div class="form-group mb-4">
                        <label class="form-label" for="school_name">Nombre de la escuela:</label>
                        <input class="form-control" name="school_name" type="text" value="{{ empty($data['school']) ? null : $data['school']->getName() }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label" for="school_direction">Dirección de la escuela</label>
                        <input class="form-control" name="school_direction" type="text" value="{{ empty($data['school']) ? null : $data['school']->getDirection() }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label" for="school_email">Correo electrónico de la escuela:</label>
                        <input class="form-control" name="school_email" type="email" value="{{ empty($data['school']) ? null : $data['school']->getEmail() }}">
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label" for="school_phone">Teléfono de la escuela:</label>
                        <input class="form-control" name="school_phone" type="tel" value="{{ empty($data['school']) ? null : $data['school']->getPhone() }}">
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label" for="school_website">Web de la escuela:</label>
                        <input class="form-control" name="school_website" type="text" value="{{ empty($data['school']) ? null : $data['school']->getWebsite() }}">
                    </div>


                    <div class="form-group mb-4">
                        <label class="form-label fw-bold" for="school_logo">Logo de la escuela:</label>

                        <div class="d-flex align-items-center">
                            @if(!empty($data['school']) && $data['school']->getLogo())
                                <img src="{{ asset('storage/' . $data['school']->getLogo()) }}" alt="Logo actual" class="img-thumbnail me-3" width="100">
                            @endif

                            <input class="form-control" name="school_logo" type="file">
                            <input
                                name="current_logo"
                                type="hidden"
                                value="{{ !empty($data['school']) && !empty($data['school']->getLogo()) ? $data['school']->getLogo() : null }}"
                            />
                        </div>

                        <small class="text-muted d-block mt-1">Debe ser mínimo 200x200 px y no más de 2 MB.</small>
                    </div>

                    <div class="form-group mb-4">
                        <div class="row">
                            @php $counter = 0; @endphp
                            @foreach($data['students'] as $student)
                                @if ($counter % 3 == 0 && $counter > 0)
                                    </div>
                                    <div class="row">
                                @endif

                                <div class="col-md-4">
                                    <div class="form-check d-flex align-items-center">
                                        <input
                                            class="form-check-input"
                                            id="checkbox_{{ $student->getId() }}"
                                            name="students[]"
                                            type="checkbox"
                                            value="{{ $student->getId() }}"
                                            {{ (!empty($student->getSchool()) && $student->getSchool()->getId() == $data['school']->getId()) ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label ms-1" for="checkbox_{{ $student->getId() }}">
                                            {{ $student->getName() . " " . $student->getSurname() }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <input class="btn btn-primary" type="submit" value=" {{ empty($data['school']) ? 'Crear escuela' : 'Modificar escuela' }}">
                </form>
            </div>
        </div>
    </div>
@endsection
