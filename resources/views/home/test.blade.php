@foreach ($result as $word )
    <div class="word id_{{ $word->id }}">
        <div class="inner_word"><b>{{ $word->word }}</b> </div>
        <div class="inner_description"> {{ $word->description }}</div>
    </div>
@endforeach




<?php
echo '<pre>';
var_dump($result);
if(empty ($result)) echo 'empty';