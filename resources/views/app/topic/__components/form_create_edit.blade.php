@if (isset($topic->id))
    else
    <form method="post" action="{{ route('topic.update', ['topic' => $topic->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    @else
        <form method="post" action="{{ route('topic.store') }}" enctype="multipart/form-data">
            @csrf
@endif

<div class="mb-3">
    <label for="Name" class="form-label">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $topic->name ?? old('name') }}" required>
    <div class="form-text text-danger">{{ $errors->has('name') ? '* ' . $errors->first('name') : '' }}</div>
</div>


<div class="mb-3 form-outline">
    <label class="form-label" for="description">Decrição</label>
    <textarea class="form-control" name="description" id="description" rows="4" required>{{ $topic->description ?? old('description') }}</textarea>
    <div class="form-text text-danger">{{ $errors->has('description') ? '* ' . $errors->first('description') : '' }}
    </div>
</div>

<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary btn-block">Gravar</button>
</div>

</form>
