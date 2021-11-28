<x-front-layout>

    <section class="cover-sec">
        <img src="{{ asset('front/images/resources/cover-img.jpg') }}" alt="">
    </section>
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <img src="{{ $user->profile->avatar_url }}" alt="">
                                    </div>
                                    <div class="user_pro_status">
                                        @if ($user->id != Auth::id())
                                            <ul class="flw-hr">
                                                {{-- <li>
                                                    @if (Auth::user()->following($user->id))


                                                        <form class="form-inline" method="POST"
                                                            action="{{ route('unfollow') }}">
                                                            @csrf
                                                            <input type="hidden" name="following_id"
                                                                value="{{ $user->id }}">
                                                            <button class="flww" type="submit">UnFollow</button>
                                                        </form>

                                                    @else
                                                        <form class="form-inline" method="POST"
                                                            action="{{ route('follow') }}">
                                                            @csrf
                                                            <input type="hidden" name="following_id"
                                                                value="{{ $user->id }}">
                                                            <button class="flww" type="submit">Follow</button>
                                                        </form>

                                                    @endif
                                                </li> --}}
                                                <li id="follow-actions">

                                                    @if (Auth::user()->following($user->id))
                                                        <a href="" title="" class="flww"
                                                            data-follow-action="{{ route('unfollow') }}"
                                                            data-id="{{ $user->id }}"><i
                                                                class="fas fa-minus"></i>Unfollow</a>
                                                    @else
                                                        <a href="" title="" class="flww"
                                                            data-follow-action="{{ route('follow') }}"
                                                            data-id="{{ $user->id }}"><i
                                                                class="fas fa-plus"></i>follow</a>
                                                    @endif

                                                </li>

                                                <li><a href="#" title="" class="hre">Hire</a></li>
                                            </ul>
                                        @endif
                                        <ul class="flw-status">
                                            <li>
                                                <span>Following</span>
                                                <b>{{ $user->followings()->count() }}</b>
                                            </li>
                                            <li>
                                                <span>Followers</span>
                                                <b>{{ $user->followers()->count() }}</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="social_links">

                                        <li><a href="#" title=""><i class="fab fa-facebook-square"></i>
                                                Http://www.facebook.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fab fa-twitter"></i>
                                                Http://www.Twitter.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fab fa-google-plus-square"></i>
                                                Http://www.googleplus.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fab fa-behance-square"></i>
                                                Http://www.behance.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fab fa-pinterest"></i>
                                                Http://www.pinterest.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fab fa-instagram"></i>
                                                Http://www.instagram.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fab fa-youtube"></i>
                                                Http://www.youtube.com/john...</a></li>
                                    </ul>
                                </div>
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Suggestions</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                    <div class="suggestions-list">
                                        <div class="suggestion-usd">
                                            <img src="{{ asset('front/images/resources/s1.png') }}" alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="fas fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{ asset('front/images/resources/s2.png') }}" alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="fas fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{ asset('front/images/resources/s3.png') }}" alt="">
                                            <div class="sgt-text">
                                                <h4>Poonam</h4>
                                                <span>Wordpress Developer</span>
                                            </div>
                                            <span><i class="fas fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{ asset('front/images/resources/s4.png') }}" alt="">
                                            <div class="sgt-text">
                                                <h4>Bill Gates</h4>
                                                <span>C & C++ Developer</span>
                                            </div>
                                            <span><i class="fas fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{ asset('front/images/resources/s5.png') }}" alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="fas fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{ asset('front/images/resources/s6.png') }}" alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="fas fa-plus"></i></span>
                                        </div>
                                        <div class="view-more">
                                            <a href="#" title="">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec">
                                    <h3>{{ $user->profile->full_name }}</h3>
                                    <div class="star-descp">
                                        <span>{{ $user->profile->bio }}</span>
                                        <ul>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star"></i></li>
                                            <li><i class="far fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                    <br>
                                    <br>
                                    <br>


                                </div>
                                <div class="product-feed-tab current" id="feed-dd">
                                    <div class="posts-section">

                                        @foreach ($user->posts()->where('visibilaty', '<>', 'me')->get()
    as $post)

                                            @php
                                                $post->increment('views_count', 1);

                                            @endphp


                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="{{ $user->profile->avatar_url }}" alt="" width="50" height="50">
                                                        <div class="usy-name">
                                                            <h3>{{ $user->profile->full_name }}</h3>
                                                            <span><img src="{{ asset('front/images/clock.png') }}"
                                                                    alt="">{{ $post->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i
                                                                class="fas fa-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="{{ route('posts.edit', $post->id) }}"
                                                                    title="">Edit
                                                                    Post</a></li>

                                                            <li>
                                                                <form
                                                                    action="{{ route('posts.destroy', $post->id) }}"
                                                                    class="form-inline" method="post">
                                                                    @csrf
                                                                    @method('delete')

                                                                    <button class="btn btn-link" type="submit"> Delete
                                                                    </button>
                                                                </form>
                                                            </li>

                                                            {{-- {{route('trash.forceDelete',['post'=>$post->id ,])}} --}}
                                                            @if ($post->deleted_at)
                                                                <li>
                                                                    <form
                                                                        action=" {{ route('trash.forceDelete', $post->id) }}"
                                                                        class="form-inline" method="post">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <button class="btn btn-link" type="submit">
                                                                            force delete
                                                                        </button>
                                                                    </form>
                                                                </li>

                                                                <li>
                                                                    <form
                                                                        action=" {{ route('trash.restore', $post->id) }}"
                                                                        class="form-inline" method="post">
                                                                        @csrf
                                                                        @method('put')

                                                                        <button class="btn btn-link" type="submit">
                                                                            restore
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            @endif
                                                        </ul>


                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="{{ asset('front/images/icon8.png') }}"
                                                                alt=""><span>Epic
                                                                Coder</span>
                                                        </li>
                                                        <li><img src="{{ asset('front/images/icon9.png') }}"
                                                                alt=""><span>India</span>
                                                        </li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i class="far fa-bookmark"></i></a>
                                                        </li>
                                                        <li><a href="#" title=""><i class="far fa-envelope"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>{{ $user->profile->bio }}</h3>
                                                    <ul class="job-dt">
                                                        <li><span>${{ $user->profile->hour_rate }} / hr</span></li>
                                                    </ul>
                                                    <p>{{ $post->content }}<a href="#" title="">view more</a></p>

                                                    <h4> tags used #{{ $post->tags->count() }}</h4>
                                                    <br>

                                                    <ul class="skill-tags">
                                                        @foreach ($post->tags as $tag)

                                                            <li><a href="#" title="">{{ $tag->name }} </a></li>

                                                        @endforeach
                                                    </ul>
                                                    @if ($post->media)
                                                        <div class="mb-4">
                                                            <img class="border p-1 roun "
                                                                src="{{ asset('storage/' . $post->media) }}">
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="job-status-bar">
                                                    <ul class="like-com">
                                                        <li>
                                                            <a href="#"><i class="fas fa-heart"></i> Like</a>
                                                            <img src="{{ asset('front/images/liked-img.png') }}"
                                                                alt="">
                                                            <span>25</span>
                                                        </li>
                                                        <li><a href="#" class="com"><i class="fas fa-comment-alt"></i>
                                                                Comments {{ $post->comments_count }}</a></li>
                                                    </ul>
                                                    <a href="#"><i class="fas fa-eye"></i>Views
                                                        {{ $post->views_count }}</a>
                                                </div>
                                                <div class="comment-section">

                                                    <div class="comment-sec">
                                                        <ul>
                                                            @foreach ($post->comments()->with('user')->get()
    as $comment)
                                                                <li>
                                                                    <div class="comment-list">
                                                                        <div class="comment">
                                                                            <div class="usy-dt">
                                                                                <img src=" {{ $comment->user->profile->avatar_url }} "
                                                                                    alt="123" height="42" width="37">
                                                                                <div class="usy-name">
                                                                                    <h3>{{ $comment->user->profile->full_name }}
                                                                                    </h3>
                                                                                    <span><img
                                                                                            src="{{ asset('front/images/clock.png') }}"
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
                                                            <form method="post"
                                                                action="{{ route('comments.store') }}">
                                                                @csrf
                                                                <input type="text" name="content"
                                                                    placeholder="Posta comment">
                                                                <input type="hidden" name="post_id"
                                                                    value="{{ $post->id }}">
                                                                <button type="submit">Send</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>






                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">

                                <div class="message-btn">
                                    <a href="#" title=""><i class="far fa-envelope"></i> Message</a>
                                </div>

                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>Portfolio</h3>
                                        <img src="{{ asset('front/images/photo-icon.png') }}" alt="">
                                    </div>
                                    <div class="pf-gallery">
                                        <ul>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery1.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery2.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery3.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery4.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery5.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery6.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery7.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery8.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery9.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery10.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery11.png') }}"
                                                        alt=""></a>
                                            </li>
                                            <li><a href="#" title=""><img
                                                        src="{{ asset('front/images/resources/pf-gallery12.png') }}"
                                                        alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


</x-front-layout>
