@if (isset($siswa))
    {{!! Form::hidden('id', $siswa->id) !!}}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('nisn') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nisn', 'NISN:', ['class' => 'control-label']) !!}
    {!! Form::text('nisn', null, ['class' => 'form-control', 'id' => 'nisn']) !!}
    @if ($errors->has('nisn'))
        <span class="help-block ">
            {{ $errors->first('nisn') }}
        </span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama', 'Nama:', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama']) !!}
    @if ($errors->has('nama'))
        <span class="help-block ">
            {{ $errors->first('nama') }}
        </span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal_lahir', !empty($siswa) ? $siswa->tanggal_lahir->format('Y-m-d') : null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
    @if ($errors->has('tanggal_lahir'))
        <span class="help-block ">
            {{ $errors->first('tanggal_lahir') }}
        </span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:', ['class' => 'control-label']) !!}
    <div class="radio">
        <label>
            {!! Form::radio('jenis_kelamin', 'L') !!} Laki-laki
        </label>
    </div>
    <div class="radio">
        <label>
            {!! Form::radio('jenis_kelamin', 'P') !!} Perempuan
        </label>
    </div>
    @if ($errors->has('jenis_kelamin'))
        <span class="help-block ">
            {{ $errors->first('jenis_kelamin') }}
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
