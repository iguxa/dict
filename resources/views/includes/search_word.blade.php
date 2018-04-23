@foreach ($result as $word )
    <div class="word id_{{ $word->id }}">
        <div class="word-word"><b>{{ $word->word }}</b> </div>
        <div class="word-description"> {{ $word->description }}</div>
        <div class="word-edit">
            <button class="btn_edit" data-item="{{ $word->id }}"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn_delete" data-item="{{ $word->id }}"><i class="far fa-trash-alt"></i></button>
        </div>
    </div>
@endforeach