<div class="message-wrapper">
    <ul class="message">

        @if($messages->isEmpty())
        <div class="No_message"> No messages yet </div>
        @else
        @foreach($messages as $message)
        <li class="message clearfix">
            <div class="{{ ($message->from == $my_id) ? 'sent':'received' }}">
                <p>{{ $message->Message }}</p>
                <p class="date">{{date('d M, h:i', strtotime($message->created_at)) }}</p>
            </div>
        </li>
        @endforeach
        @endif


    </ul>
</div>
<div class="input-text">
    <input type="text" name="message" class="submit">
</div>