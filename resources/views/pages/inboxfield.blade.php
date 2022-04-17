<div class="message-wrapper">
    <ul class="message">
        <li class="message clearfix">
            @foreach($messages as $message)
            <div class="{{ ($message->from == $my_id) ? 'sent':'received' }}">
                <p>{{ $message->Message }}</p>
                <p class="date">{{date('d M, h:i', strtotime($message->created_at)) }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div class="input-text">
    <input type="text" name="message" class="submit">
</div>