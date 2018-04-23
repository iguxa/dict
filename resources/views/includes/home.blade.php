<div class="title">
    <div class="title-title"><b>Термин</b></div>
    <div class="title-description"><b>Определение</b></div>
</div>
@foreach ($result[0] as $word => $value)
    <div class="letter"><b>{{ $word }}</b></div>
    @foreach($value as $desc)
    <div class="word id_{{ $desc[2] }}">
        <div class="word-word"><b>{{ $desc[0] }}</b> </div>
        <div class="word-description"> {{ $desc[1] }}</div>
        <div class="word-edit">
            <button class="btn_edit" title="изменить" data-item="{{ $desc[2] }}"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn_delete" title="удалить" data-item="{{ $desc[2] }}"><i class="far fa-trash-alt"></i></button>
        </div>
    </div>
    @endforeach
@endforeach
{{ $result[1] }}