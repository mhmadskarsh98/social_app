<x-front-layout>

    <x-alert></x-alert>


    <main>
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3 col-md-4 pd-left-noneno-pd">
                        <div class="main-left-sidebar no-margin">
                            <div class="user-data full-width">
                                <div class="user-profile">
                                    <div class="username-dt">
                                        <div class="usr-pic">
                                            <img src=" {{ Auth::user()->profile->avatar_url }}">
                                        </div>
                                    </div>
                                    <div class="user-specs">
                                        <h3> {{ Auth::user()->profile->full_name }}</h3>

                                        <span>{{ Auth::user()->profile->bio }}</span>
                                    </div>
                                </div>
                                <ul class="user-fw-status">
                                    <li>
                                        <h4>Following</h4>
                                        <span>{{ Auth::user()->followings()->count() }}</span>
                                    </li>
                                    <li>
                                        <h4>Followers</h4>
                                        <span>{{ Auth::user()->Followers()->count() }}</span>

                                    </li>
                                    <li>
                                        <a href="{{ route('profile.index', [Auth::user()->username]) }}" title="">View
                                            Profile</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3>Suggestions</h3>
                                    <i class="fas fa-ellipsis-v"></i>
                                </div>
                                <div class="suggestions-list">
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s1.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s2.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s3.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>Poonam</h4>
                                            <span>Wordpress
                                                Developer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s4.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>Bill Gates</h4>
                                            <span>C & C++ Developer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s5.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s6.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="view-more">
                                        <a href="#" title="">View
                                            More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tags-sec full-width">
                                <ul>
                                    <li><a href="#" title="">Help
                                            Center</a></li>
                                    <li><a href="#" title="">About</a></li>
                                    <li><a href="#" title="">Privacy
                                            Policy</a></li>
                                    <li><a href="#" title="">Community
                                            Guidelines</a></li>
                                    <li>
                                        <a href="#" title="">Cookies
                                            Policy</a>
                                    </li>
                                    <li><a href="#" title="">Career</a></li>
                                    <li><a href="#" title="">Language</a></li>
                                    <li><a href="#" title="">Copyright
                                            Policy</a></li>
                                </ul>
                                <div class="cp-sec">
                                    <img src="{{ asset('front/images/logo2.png') }}" alt="">
                                    <p><img src="{{ asset('front/images/cp.png') }}" alt="">Copyright 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 no-pd">
                        <div class="post-topbar">

                            {{-- asset('front/profile_photo_path') --}}

                            <div class="usy-dt">
                                <img src=" {{ Auth::user()->profile->getAvatarUrlAttribute() }} " alt="123"
                                    height="42" width="37">
                                <div class="usy-name">
                                    <h3> {{ Auth::user()->profile->getFullNameAttribute() }}</h3>

                                </div>
                            </div>

                            <div class="post-st ">
                                <ul>
                                    <li>
                                        <a href="{{ route('posts.create') }}">
                                            <button class="btn btn-secondary">Create post</button>
                                        </a>

                                        <a href="{{ route('checkout') }}">
                                            <button class="btn btn-success"><i class="fas fa-ad"></i> إعلان
                                                ممول</button>
                                        </a>


                                    </li>
                                    {{-- <li><a class="post-jb active" href="#" title="">Post a Job</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="posts-section">

                            @foreach ($posts as $post)

                                @php
                                    $post->increment('views_count', 1);
                                    
                                @endphp


                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="{{ $post->user->profile->avatar_url }}" alt="" height="40"
                                                width="40">
                                            <div class="usy-name">
                                                <h3>{{ $post->user->profile->full_name }}</h3>
                                                <span><img src="{{ asset('front/images/clock.png') }}"
                                                        alt="">{{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i
                                                    class="fas fa-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="{{ route('posts.edit', $post->id) }}" title="">Edit
                                                        Post</a></li>

                                                <li>
                                                    <form action="{{ route('posts.destroy', $post->id) }}"
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
                                                        <form action=" {{ route('trash.forceDelete', $post->id) }}"
                                                            class="form-inline" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <button class="btn btn-link" type="submit">
                                                                force delete
                                                            </button>
                                                        </form>
                                                    </li>

                                                    <li>
                                                        <form action=" {{ route('trash.restore', $post->id) }}"
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
                                            <li><img src="{{ asset('front/images/icon8.png') }}" alt=""><span>Epic
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
                                        <h3>{{ $post->user->profile->bio }}</h3>
                                        <ul class="job-dt">
                                            <li><span>${{ $post->user->profile->hour_rate }} / hr</span></li>
                                        </ul>
                                        <p>{{ $post->content }}<a href="{{ route('posts.show', $post->id) }}"
                                                title="">view more</a></p>
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
                                                <a href="{{ route('likes.store') }}"
                                                    data-like-id="{{ $post->id }}" data-like-type="post"><i
                                                        class="fas fa-heart"></i> Like</a>
                                                <img src="{{ asset('front/images/liked-img.png') }}" alt="">
                                                <span>{{ $post->likes()->count() }}</span>
                                            </li>
                                            <li><a href="#" class="com"><i class="fas fa-comment-alt"></i>
                                                    Comments {{ $post->comments_count }}</a></li>
                                        </ul>
                                        <a href="#"><i class="fas fa-eye"></i>Views
                                            {{ $post->views_count }}</a>
                                    </div>
                                    <div class="comment-section">

                                        <div class="comment-sec">
                                            <ul class="comment-list-{{ $post->id }}">
                                                <div class="view-more">
                                                    <a href="#" title="" class="show_hide"
                                                        data-content="toggle-text">ViewMore
                                                    </a>
                                                </div>

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
                                                                        <span><img src="{{ asset('front/images/clock.png') }}" alt="">{{ $comment->created_at->diffForHumans() }}</span>

                                                                    </div>
                                                                </div>
                                                                <p>{{ $comment->content }}</p>
                                                                <a href="{{ route('likes.store') }}"
                                                                    data-like-id="{{ $comment->id }}"
                                                                    data-like-type="comment"><i
                                                                        class="fas fa-heart"></i>
                                                                    Like</a>
                                                                <span>{{ $post->likes()->count() }}</span>



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
                                    </div>
                                </div>






                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">
                            <div class="widget widget-about">
                                <x-weather />

                            </div>
                            <div class="widget widget-jobs">
                                <div class="sd-title">
                                    <h3>Top Jobs</h3>
                                    <i class="fas fa-ellipsis-v"></i></i>
                                </div>
                                <div class="jobs-list">
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior Product
                                                Designer</h3>
                                            <p>Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior UI / UX
                                                Designer</h3>
                                            <p>Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Junior Seo Designer</h3>
                                            <p>Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior PHP Designer</h3>
                                            <p>Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior Developer
                                                Designer</h3>
                                            <p>Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-jobs">
                                <div class="sd-title">
                                    <h3>Most Viewed This Week</h3>
                                    <i class="fas fa-ellipsis-v"></i></i>
                                </div>
                                <div class="jobs-list">
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior Product
                                                Designer</h3>
                                            <p>Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior UI / UX
                                                Designer</h3>
                                            <p>Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Junior Seo Designer</h3>
                                            <p>Lorem ipsum dolor sit
                                                amet, consectetur
                                                adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget suggestions full-width">
                                <div class="sd-title">
                                    <h3>Most Viewed People</h3>
                                    <i class="fas fa-ellipsis-v"></i></i>
                                </div>
                                <div class="suggestions-list">
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s1.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s2.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s3.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>Poonam</h4>
                                            <span>Wordpress
                                                Developer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s4.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>Bill Gates</h4>
                                            <span>C &amp; C++
                                                Developer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s5.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('front/images/resources/s6.png') }}" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="far fa-plus-square"></i></i></span>
                                    </div>
                                    <div class="view-more">
                                        <a href="#" title="">ViewMore</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    </main>




</x-front-layout>
