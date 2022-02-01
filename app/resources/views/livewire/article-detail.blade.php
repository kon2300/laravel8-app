<div class="container">

    <div class="d-flex justify-content-center">
        <h3>投稿の詳細</h3>
    </div>

    <div class="card col-md-6 mx-auto">
        <div class="col">
            <div class="card h-100 shadow">
                <div class="card-header bg-info bg-gradient position-relative">
                    <h5 class="card-title text-white pt-2">
                        {{ $article->title }}
                    </h5>
                    <span class="fs-5 badge bg-warning bg-gradient position-absolute top-0 end-0">
                        {{ $article->category }}
                    </span>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{ $article->content }}
                    </p>
                </div>
                <div class="card-footer text-muted position-relative">
                    @if ($article->user_id === Auth::id())
                        <a href="{{ route('article.edit', [$article->id]) }}"
                            class="btn btn-sm btn-secondary position-absolute top-100 start-0 translate-middle">
                            <i class="fas fa-edit"></i>
                        </a>
                    @endif
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
    </div>

    <form action="submit" wire:submit.prevent="comment({{ $article }})" method="post">
        @csrf

        <div class="card text-center col-md-6 mx-auto mt-5">

            <div class="card-body">
                <div class="card-title d-flex">{{ Auth::user()->name }}</div>

                <div class="form-floating card-text mb-2">
                    <textarea style="height: 100px" class="form-control" placeholder="コメントを入力" id="floatingTextarea"
                        wire:model.defer="content"></textarea>
                    <label for=" floatingTextarea">この投稿へのコメントを入力</label>
                    @error('content')
                        <span class="px-2 rounded-pill bg-danger text-white">{{ $message }}</span>
                    @enderror
                </div>

                <div wire:loading>
                    <button type="submit" class="btn btn-lg btn-primary mx-auto mt-1" disabled>
                        <span class="spinner-border" role="status" aria-hidden="true">
                        </span>
                        Loading...
                    </button>
                </div>

                <div wire:loading.remove>
                    <button type="submit" class="btn btn-lg btn-primary mx-auto mt-1">投稿</button>
                </div>


            </div>
        </div>

    </form>

    @if ($article->comments->isEmpty())
        <div class="d-flex justify-content-center my-3">
            <h5 class="text-muted">この投稿へのコメントはまだありません</h5>
        </div>
    @else
        <div class="d-flex justify-content-center my-3">
            <h4>この投稿へのコメント</h4>
        </div>
    @endif

    @foreach ($article->comments as $comment)
        <div class="card col-md-6 mx-auto position-relative">
            @if ($comment->user_id === Auth::id())
                <button class="btn btn-sm btn-danger position-absolute top-0 end-0"
                    wire:click.prevent="removeComment({{ $comment }})">
                    <i class="far fa-trash-alt"></i>
                </button>
            @endif
            <div class="card-body">
                <p class="card-title text-white pt-2">
                    <a href="{{ route('user.show', [$comment->user_id]) }}" class="link-dark">
                        <span>@</span>{{ $comment->user->name }}
                    </a>
                </p>
                <p class="card-text">{{ $comment->content }}</p>
                <p class="card-text text-muted text-end">{{ $comment->created_at }}</p>
            </div>
        </div>
    @endforeach

</div>
