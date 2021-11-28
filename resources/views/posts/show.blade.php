<x-front-layout>
    <div class="job_descp">
        <h2>{{ $post->content }}</h2>
        <h4> tags used #{{ $post->tags->count() }}</h4>
        <br>
        <ul class="skill-tags">
            @foreach ($post->tags as $tag)

                <li><a href="#" title="">{{ $tag->name }} </a></li>

            @endforeach
        </ul>
        @if ($post->media)
            <div class="mb-4">
                <img class="border p-1 roun " src="{{ asset('storage/' . $post->media) }}">
            </div>
        @endif

    </div>
    <div class="comment-sec">
        <ul class="comment-list-{{ $post->id }}">
            @foreach ($post->comments()->with('user')->get()
    as $comment)
                <li>
                    <div class="comment-list">
                        <div class="comment">
                            <div class="usy-dt">
                                <img src=" {{ $comment->user->profile->avatar_url }} " alt="123" height="42"
                                    width="37">
                                <div class="usy-name">
                                    <h3>{{ $comment->user->profile->full_name }}
                                    </h3>
                                    <span><img src="{{ asset('front/images/clock.png') }}"
                                            alt="">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <p>{{ $comment->content }}</p>

                        </div>
                    </div>
                </li>

            @endforeach
        </ul>
    </div>

    <div class="post-comment">

        <div class="comment_box">
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <input type="text" name="content" placeholder="Posta comment">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit">Send</button>
            </form>
        </div>
    </div>


</x-front-layout>
