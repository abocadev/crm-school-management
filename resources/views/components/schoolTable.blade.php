<div class="d-flex justify-content-between align-content-center my-4 p-3">
    <h2 class="h2">Listado de escuelas</h2>

    @auth()
        @if(Request::is('schools'))
            <a class="btn btn-success" href="{{ route('schools.create') }}">
                Crear nueva escuela
            </a>
        @endif
    @endauth
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th width="10%" scope="col">Logo</th>
            <th width="25%" scope="col">Nombre de la Escuela</th>
            <th width="40%" scope="col">Información de contacto</th>
            <th width="25%" scope="col">Estudiantes</th>
            @if(Request::is('schools'))
                @auth()
                    <th></th>
                    <th></th>
                @endauth
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($schools as $school)
            <tr>
                <td>
                    @if(empty($school->getLogo()))
                        Logo no disponible
                    @else
                        <img class="d-block my-1 mx-auto w-100 h-auto" src="{{ asset('storage/' . $school->getLogo()) }}" alt="">
                    @endif
                </td>
                <td>
                    <p><b>{{ $school->getName() }}</b></p>
                    <small>{{ $school->getDirection() }}</small>
                </td>
                <td>
                    @if(!empty($school->getEmail()))
                        <b>Correo electrónico: </b> {{ $school->getEmail() }}
                        <br>
                    @endif

                    @if(!empty($school->getPhone()))
                        <b>Número de teléfono: </b> {{ $school->getPhone() }}
                        <br>
                    @endif

                    @if(!empty($school->getWebsite()))
                        <b>Página web: </b> <a href="{{ $school->getWebsite() }}">{{ $school->getWebsite() }}</a>
                    @endif
                </td>
                <td>
                    @if ($school->getStudents()->isEmpty())
                        No hay estudiantes en esta escuela
                    @else
                        <ul>
                            @foreach($school->getStudents() as $student)
                                <li> {{ $student->getName() . " " . $student->getSurname() }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>

                @if(Request::is('schools'))
                    @auth()
                        <td>
                            <a class="btn btn-primary" href="{{ route('schools.edit', $school) }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="#" onclick="event.preventDefault();document.getElementById('destroy-school-form').submit()">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <form action="{{ route('schools.destroy', $school) }}" class="d-none" id="destroy-school-form" method="POST" >
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    @endauth
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

@if(Request::is('schools'))
    {{ $schools->links() }}
@else
    <a href="{{ route('schools.index') }}">Visualizar todas las escuelas</a>
@endif
