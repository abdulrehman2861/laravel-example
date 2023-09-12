<div>
    <div wire:loading.delay.longer wire:loading.flex
        class="col-12 position-absolute justify-content-center align-items-center"
        style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="direct-chat-messages">
        @foreach ($transaction->comments as $key => $comment)
            @if ($comment->user_id == auth()->user()->id)
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">{{ $comment->user->name ?? '-' }}</span>
                        <span class="direct-chat-timestamp float-right">{{ $comment->created_at }}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{ $comment->user->short_name }}"
                        alt="{{ $comment->user->name ?? '-' }}">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">

                        {!! $comment->content !!}

                    </div>
                    <!-- /.direct-chat-text -->
                </div>
            @else
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">{{ $comment->user->name ?? '-' }}</span>
                        <span class="direct-chat-timestamp float-left">{{ $comment->created_at }}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{ $comment->user->short_name }}"
                        alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {!! $comment->content !!}
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
            @endif
        @endforeach
    </div>
</div>
