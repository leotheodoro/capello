@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>Alunos</h1>
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css"/>
@endsection

@section('content')
    <div class="box">
        <div class="box-body">
            @include('helpers.errors')
            @include('helpers.success')
            @if(count($students) > 0)
                    <table class="table table-bordered table-hover" id="studentsTable" data-order='[[ 1, "asc" ]]'>
                        <thead>
                            <th></th>
                            <th>Nome</th>
                            <th>RA</th>
                            <th>Curso</th>
                            <th>Ano</th>
                            <th>CPF</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>
                                    <div class="text-center">
                                        <label class="text-center">
                                        <div class="circle-small" id="profilePic" style="background-image: url({{$student->image ? asset('storage/users/'.$student->image) : asset('img/profile.png')}})"></div>
                                        </label>
                                    </div>
                                </td>
                                <td class="text-center" style="text-align: center; vertical-align: middle;">{{$student->name}}</td>
                                <td class="text-center" style="text-align: center; vertical-align: middle;">{{$student->ra}}</td>
                                <td class="text-center" style="text-align: center; vertical-align: middle;">{{$student->course_name}}</td>
                                <td class="text-center" style="text-align: center; vertical-align: middle;">{{$student->degree}}º ano</td>
                                <td class="text-center" style="text-align: center; vertical-align: middle;">{{$student->cpf}}</td>
                                <td class="text-center" style="text-align: center; vertical-align: middle;">{!! $student->status == 1 ? '<small class="label bg-red">Inativo</small>' : '<small class="label bg-green">Ativo</small>' !!}</td>
                                <td class="text-center" style="text-align: center; vertical-align: middle;"><a class="btn btn-sm btn-primary" href="{{route('students.profileStudents', ['id' => $student->id])}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
            @else
            <h1 class="text-center">Não há alunos cadastrados! <i class="fa fa-thumbs-down" aria-hidden="true"></i></h1>
            @endif
        </div>
    </div>

    <div class="modal modal-danger fade" id="deleteStudent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Desativar aluno</h4>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja desativar esse aluno?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                        <a href="" id="linkRoute"><button type="button" class="btn btn-outline">Desativar</button></a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    
@stop

@section('js')
<script src="{{asset('js/auth.js')}}"></script>
<script src="{{asset('js/jquery.mask.js')}}"></script>
<script src="{{asset('js/masks.js')}}"></script>
<script src="{{asset('js/functions.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#studentsTable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            },
            "columns": [
                { "orderable": false },
                null,
                null,
                null,
                null,
                null,
                null,
                { "orderable": false },
            ]
        });
    });
</script>
@stop