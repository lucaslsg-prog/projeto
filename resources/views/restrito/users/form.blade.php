@extends('adminlte::page')

@section('title', 'Formulário de Users')

@section('content_header')
    <h1>Formulário de Users</h1>
@stop

@section('content')
    <div class="card card-primary">
        @if (isset($user))
            {!! Form::model($user, ['url' => route('restrito.users.update', $user), 'method' => 'put']) !!}
        @else
            {!! Form::open(['url' => route('restrito.users.store')]) !!}
        @endif
            <div class="card-body">

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    @error('emal')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                    @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                {!! link_to_route('restrito.users.index', 'Voltar', null, ['class' => 'btn btn-secondary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')
@stop

@section('js')
@stop