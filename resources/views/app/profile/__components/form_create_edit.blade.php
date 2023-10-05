@if(isset($profile->id))
<form method="post" action="{{ route('profile.update', ['profile' => $profile->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @else
    <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
        @csrf
        @endif


        <div class="mb-3">
            <label class="form-label" for="image">Imagem</label>

            @if(isset($profile->id))
            <div class="col-3 mb-3">
                <img class="img-fluid" src="{{ asset($profile->image)}}" />
            </div>
            @endif
            <input type="file" class="form-control" name="image" id="image" />
            <div class="form-text text-danger">{{ $errors->has('image') ? '* ' . $errors->first('image') : '' }}</div>
        </div>

        <div class="row">

            <div class="mb-3 col-md-8">
                <label for="Name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $profile->name ?? old('name') }}">
                <div class="form-text text-danger">{{ $errors->has('name') ? '* ' . $errors->first('name') : '' }}</div>
            </div>

        </div>

        <div class="mb-3 form-outline">
            <label class="form-label" for="description">Decrição</label>
            <textarea class="form-control" name="description" id="description" rows="4">{{ $profile->description ?? old('description') }}</textarea>
            <div class="form-text text-danger">{{ $errors->has('description') ? '* ' . $errors->first('description') : '' }}</div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-block">Gravar</button>
        </div>

    </form>
