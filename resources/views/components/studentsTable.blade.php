<div class="d-flex justify-content-between align-content-center my-4 p-3">
    <h2>Listado de estudiantes</h2>

    @auth()
        @if(Request::is('students'))
            <a class="btn btn-success" href="{{ route('students.create') }}">
                Crear nuevo estudiante
            </a>
        @endif
    @endauth
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th width="30%" scope="col">Nombre y Apellidos</th>
            <th width="40%" scope="col">Escuela</th>
            <th width="10%" scope="col">Fecha de Nacimiento</th>
            <th width="20%" scope="col">Ciudad Natal</th>
            @if(Request::is('students'))
                @auth()
                    <th></th>
                    <th></th>
                @endauth
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>
                    {{ $student->getName() . " " . $student->getSurname() }}
                </td>
                <td>
                    @if(empty($student->getSchool()))
                        Este estudiante no tiene ninguna escuela assignada
                    @else
                        @if (empty($student->getSchool()->getLogo()))
                            No hay logo para esta escuela
                        @else
                            <img class="d-block my-1 mx-auto w-75 h-auto" src="{{ asset('storage/' . $student->getSchool()->getLogo()) }}" alt="">
                        @endif

                        <p>
                            <b>Nombre de la escuela:</b> {{$student->getSchool()->getName()}}
                            <br>
                            <small>{{ $student->getSchool()->getDirection() }}</small>
                        </p>
                    @endif
                </td>
                <td>
                    {{ $student->getBirthday()->format("d/m/Y") }}
                </td>
                <td>
                    @if (empty($student->getHometown()))
                        Ciudad natal no indicada
                    @else
                        {{ $student->getHometown() }}
                    @endif
                </td>
                @if(Request::is('students'))
                    @auth()
                        <td>
                            <a class="btn btn-primary" href="{{ route('students.edit', $student) }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="#" onclick="event.preventDefault();document.getElementById('destroy-student-form').submit()">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <form action="{{ route('students.destroy', $student) }}" class="d-none" id="destroy-student-form" method="POST" >
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

@if(Request::is('students'))
    {{ $students->links() }}
@else
    <a href="{{ route('schools.index') }}">Visualizar todas los estudiantes</a>
@endif
