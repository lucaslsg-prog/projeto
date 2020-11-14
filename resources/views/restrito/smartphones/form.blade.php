@extends('adminlte::page')

@section('title', 'Formulário de Smartphones')

@section('content_header')
    <h1>Formulário de Smartphone</h1>
@stop

@section('content')
    <div class="card card-primary">
        @if (isset($smartphone))
            {!! Form::model($smartphone, ['url' => route('restrito.smartphones.update', $smartphone), 'method' => 'put']) !!}
        @else
            {!! Form::open(['url' => route('restrito.smartphones.store')]) !!}
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
                    {!! Form::label('model', 'Model') !!}
                    {!! Form::text('model', null, ['class' => 'form-control']) !!}
                    @error('model')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('tss', 'TSS') !!}
                    {!! Form::text('tss', null, ['class' => 'form-control']) !!}
                    @error('tss')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('radio', 'Radio') !!}
                    {!! Form::text('radio', null, ['class' => 'form-control']) !!}
                    @error('radio')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('tv', 'TV') !!}
                    {!! Form::text('tv', null, ['class' => 'form-control']) !!}
                    @error('tv')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('average_current', 'Average Current') !!}
                    {!! Form::text('average_current', null, ['class' => 'form-control']) !!}
                    @error('average_current')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('power_of_lock', 'Power of Lock') !!}
                    {!! Form::text('power_of_lock', null, ['class' => 'form-control']) !!}
                    @error('power_of_lock')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                {!! link_to_route('restrito.smartphones.index', 'Voltar', null, ['class' => 'btn btn-secondary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')
@stop

@section('js')
@stop