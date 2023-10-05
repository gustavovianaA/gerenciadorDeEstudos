<div class="py-4 px-3 mb-3">
    <a href="{{ route('phase.create') }}">
        <div class="btn btn-success">
            Nova Fase
        </div>
    </a>

    @if (isset($phase->id))
        <a href="{{ route('phase.edit' , ['phase' => $phase]) }}">
            <div class="btn btn-success">
                Editar Fase
            </div>
        </a>
    @endif
</div>
