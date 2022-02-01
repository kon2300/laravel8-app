<div class="container">
    <div class="row">
        <div class="col-md-6 text-center text-md-end mt-2">
            <p class="fs-3"><span>@</span>{{ $user->name }} </p>
            @if ($user->id !== Auth::id() && $followers->isEmpty())
                <p>
                    <button wire:click.prevent="follow({{ $user }})" class="btn btn-info rounded-pill">
                        フォロー<i class="fas fa-user-plus"></i>
                    </button>
                </p>
            @endif
            @foreach ($followers as $follower)
                @switch ($follower->followings->id)
                    @case(Auth::id())
                        <button wire:click.prevent="removeFollow({{ $follower }})" class="btn btn-danger rounded-pill">
                            アンフォロー <i class="fas fa-user-minus"></i>
                        </button>
                    @break
                    @default
                        <button wire:click.prevent="follow({{ $user }})" class="btn btn-info rounded-pill">
                            フォロー<i class="fas fa-user-plus"></i>
                        </button>
                @endswitch
            @endforeach
        </div>

        <div class="col-md-3">
            <div class="list-group list-group-flush">
                <button type="button" class="btn fs-4 list-group-item list-group-item-action bg-light bg-gradient"
                    data-bs-toggle="modal" data-bs-target="#followerModal">
                    follower
                    <span class="badge bg-secondary bg-gradient">
                        {{ $followers->count() }}
                    </span>
                </button>
                <button type="button" class="btn fs-4 list-group-item list-group-item-action bg-light bg-gradient"
                    data-bs-toggle="modal" data-bs-target="#followModal">
                    follow
                    <span class="badge bg-secondary bg-gradient">
                        {{ $followings->count() }}
                    </span>
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="followerModal" tabindex="-1" aria-labelledby="followerModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="followerModalTitle">フォロワー</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                @if ($followers->isEmpty())
                    <div class="d-flex justify-content-center my-3">
                        <h7 class="text-muted">フォローされていません</h7>
                    </div>
                @endif
                @foreach ($followers as $follower)
                    <div class="list-group list-group-flush">
                        <a href="{{ route('user.show', [$follower->followings->id]) }}"
                            class="list-group-item list-group-item-action">
                            <span>@</span>{{ $follower->followings->name }}
                        </a>
                    </div>
                @endforeach
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="followModal" tabindex="-1" aria-labelledby="followModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="followModalTitle">フォロー</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                @if ($followings->isEmpty())
                    <div class="d-flex justify-content-center my-3">
                        <h7 class="text-muted">フォローしていません</h7>
                    </div>
                @endif
                @foreach ($followings as $following)
                    <div class="list-group list-group-flush">
                        <a href="{{ route('user.show', [$following->followers->id]) }}"
                            class="list-group-item list-group-item-action">
                            <span>@</span>{{ $following->followers->name }}
                        </a>
                    </div>
                @endforeach
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 col-md-10 row-cols-md-2 g-4 mx-auto fs-5">
        Recently Post
    </div>

    @if ($user->articles->isEmpty())
        <div class="d-flex justify-content-center my-3">
            <h5 class="text-muted">投稿はまだありません</h5>
        </div>
        <div class="d-flex justify-content-center my-3">
            <button class="btn btn-dark bg-gradient">
                <a class="text-white" href="{{ route('article.create') }}">投稿してみる</a>
            </button>
        </div>
    @else
        <div class="row row-cols-1 col-md-10 row-cols-md-2 g-4 mx-auto">
            @foreach ($user->articles as $article)
                <div class="col">
                    <div class="card h-100 shadow">
                        <div class="card-header bg-info bg-gradient position-relative">
                            <a href="{{ route('article.detail', [$article->id]) }}" class="link-info">
                                <h5 class="card-title text-white pt-2 text-truncate">
                                    {{ $article->title }}
                                </h5>
                            </a>
                            <span class="fs-6 badge bg-warning bg-gradient position-absolute top-0 end-0">
                                {{ $article->category }}
                            </span>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-truncate">
                                {{ $article->content }}
                            </p>
                        </div>
                        <div class="card-footer text-muted position-relative">
                            <p class="card-title text-white pt-2">
                                <a href="{{ route('user.show', [$article->user->id]) }}" class="link-dark">
                                    <span>@</span>{{ $article->user->name }}
                                </a>
                            </p>
                            <p class="card-title h7">{{ $article->updated_at }}</p>
                            @if ($article->user_id === Auth::id())
                                <button
                                    class="btn shadow rounded-pill bg-white text-danger btn-outline-danger position-absolute bottom-0 end-0  position-relative">
                                    Like <i class="fas fa-heart"></i>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger bg-gradient">
                                        {{ $article->likes->count() }}
                                    </span>
                                    <span
                                        class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-success bg-gradient">
                                        自分の投稿
                                    </span>
                                </button>
                            @elseif ($article->likes->isEmpty())
                                <button
                                    class="btn shadow rounded-pill bg-white text-danger btn-outline-danger position-absolute bottom-0 end-0  position-relative"
                                    wire:click.prevent="like({{ $article }})">
                                    Like <i class="far fa-heart"></i>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger bg-gradient">
                                        {{ $article->likes->count() }}
                                    </span>
                                </button>
                            @else
                                @foreach ($article->likes as $like)
                                    @if ($like->user_id === Auth::id())
                                        <button
                                            class="btn shadow rounded-pill bg-white text-danger btn-outline-danger position-absolute bottom-0 end-0  position-relative"
                                            wire:click.prevent="removeLike({{ $article }})">
                                            Like <i class="fas fa-heart"></i>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger bg-gradient">
                                                {{ $article->likes->count() }}
                                            </span>
                                        </button>
                                    @elseif ($like->user_id !== Auth::id())
                                        <button
                                            class="btn shadow rounded-pill bg-white text-danger btn-outline-danger position-absolute bottom-0 end-0  position-relative"
                                            wire:click.prevent="like({{ $article }})">
                                            Like <i class="far fa-heart"></i>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger bg-gradient">
                                                {{ $article->likes->count() }}
                                            </span>
                                        </button>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
