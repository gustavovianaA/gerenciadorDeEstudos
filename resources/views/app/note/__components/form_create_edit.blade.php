@if (isset($note->id))
    else
    <form method="post" action="{{ route('note.update', ['note' => $note->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    @else
        <form method="post" action="{{ route('note.store') }}" enctype="multipart/form-data">
            @csrf
@endif

<input type="hidden" name="topic_id" value="{{ $topic_id }}">

<div class="mb-3">
    <label for="Name" class="form-label">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $note->name ?? old('name') }}" required>
    <div class="form-text text-danger">{{ $errors->has('name') ? '* ' . $errors->first('name') : '' }}</div>
</div>


<div class="mb-3 form-outline">
    <label class="form-label" for="content">Conteúdo</label>
    <textarea class="summernote form-control" name="content" id="content" required>{{ $note->content ?? old('content') }}</textarea>
    <div class="form-text text-danger">{{ $errors->has('content') ? '* ' . $errors->first('content') : '' }}
    </div>
</div>

<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary btn-block">Gravar</button>
</div>

</form>
