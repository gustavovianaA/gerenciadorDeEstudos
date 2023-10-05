@if (isset($phase->id))
    else
    <form method="post" action="{{ route('phase.update', ['phase' => $phase->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    @else
        <form method="post" action="{{ route('phase.store') }}" enctype="multipart/form-data">
            @csrf
@endif

<div class="row">

<div class="mb-3 col-md-8">
    <label for="Name" class="form-label">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $phase->name ?? old('name') }}">
    <div class="form-text text-danger">{{ $errors->has('name') ? '* ' . $errors->first('name') : '' }}</div>
</div>

<div class="form-group col-md-4">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
        <option value="Não Iniciado" {{ isset($phase) ? ($phase->status == "Não iniciado" ? 'selected' : '') : '' }}>Não Iniciado</option>
        <option value="Iniciado" {{ isset($phase) ? ($phase->status == "Iniciado" ? 'selected' : '') : '' }}>Iniciado</option>
        <option value="Concluído" {{ isset($phase) ? ($phase->status == "Concluído" ? 'selected' : '') : '' }}>Concluído</option>
        <option value="Parado" {{ isset($phase) ? ($phase->status == "Parado" ? 'selected' : '') : '' }}>Parado</option>
    </select>
</div>

</div>

<div class="mb-3 form-outline">
    <label class="form-label" for="description">Decrição</label>
    <textarea class="form-control" name="description" id="description" rows="4">{{ $phase->description ?? old('description') }}</textarea>
    <div class="form-text text-danger">{{ $errors->has('description') ? '* ' . $errors->first('description') : '' }}
    </div>
</div>

<div class="form-group">
    <label for="goal">Meta</label>
    <textarea class="form-control" name="goal" id="goal" rows="4">{{ $phase->goal ?? old('goal') }}</textarea>
    <div class="form-text text-danger">{{ $errors->has('goal') ? '* ' . $errors->first('goal') : '' }}
    </div>
</div>

<div class="row">

<div class="mb-3 col-md-4">
    <label for="Name" class="form-label">Data de Início</label>
    <input type="date" class="form-control" name="start_date" id="start_date" value="{{ isset($phase) ? ($phase->start_date->format('Y-m-d') ?? old('start_date')) : '' }}">
    <div class="form-text text-danger">{{ $errors->has('start_date') ? '* ' . $errors->first('start_date') : '' }}</div>
</div>

<div class="mb-3 col-md-4">
    <label for="Name" class="form-label">Data de finalização prevista </label>
    <input type="date" class="form-control" name="expected_end_date" id="expected_end_date" value="{{ isset($phase) ? ($phase->expected_end_date->format('Y-m-d') ?? old('expected_end_date')) : '' }}">
    <div class="form-text text-danger">{{ $errors->has('expected_end_date') ? '* ' . $errors->first('expected_end_date') : '' }}</div>
</div>

<div class="mb-3 col-md-4">
    <label for="Name" class="form-label">Data de finalização</label>
    <input type="date" class="form-control" name="end_date" id="end_date" value="{{ isset($phase) ? ($phase->end_date == null ? old('end_date') : $phase->end_date->format('Y-m-d')) : '' }}">
    <div class="form-text text-danger">{{ $errors->has('end_date') ? '* ' . $errors->first('end_date') : '' }}</div>
</div>

</div>

<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary btn-block">Gravar</button>
</div>

</form>
