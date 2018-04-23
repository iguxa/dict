<div class="adder_word">
    <form class="add-form">
        <div class="add-result"><b>{{ $result or '' }}</b></div>
        <div class="add-word">
        <label for="word">Введите термин</label>
    <textarea name="word" id="word" cols="30" rows="2" required></textarea>
        </div>
        <div class="add-description">
        <label for="description">Описание</label>
    <textarea name="description" id="description" cols="30" rows="10" required></textarea>
        </div>
        <input class="token" type="hidden" name="_token" value="{{ csrf_token() }}">
        <button class="btn_add" type="submit">Добавить</button>
    </form>
</div>