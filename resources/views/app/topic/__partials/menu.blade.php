<div class="py-4 px-3 mb-3">
    <a href="{{ route('topic.create') }}">
        <div class="btn btn-success">
            Novo Tópico
        </div>
    </a>

    @if (isset($topic->id))
        <a href="{{ route('note.create.topic' , ['topic_id' => $topic->id]) }}">
            <div class="btn btn-primary">
                Adicionar Caderno
            </div>
        </a>
    @endif
</div>
