<div class="container">

    <div class="d-flex justify-content-center">
        <h3>Article List</h3>
    </div>

    <div class="d-flex justify-content-end my-2">
        <form wire:submit.prevent="render" method="GET">

            <div class="input-group">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="category select"
                        wire:model.defer="category">
                        <option value="" selected>すべてを対象</option>
                        <option value="fun">楽しい</option>
                        <option value="ungly">怒り</option>
                        <option value="sad">悲しい</option>
                    </select>
                    <label for="floatingSelect">カテゴリー</label>
                </div>

                <div class="form-floating">
                    <select wire:model.defer="type" class="form-select" id="floatingSortSelect"
                        aria-label="sort select">
                        <option value="new">新着</option>
                        <option value="old">投稿が古い順</option>
                        <option value="many">イイねが多い順</option>
                        <option value="few">イイねが少ない順</option>
                    </select>
                    <label for="floatingSortSelect">並び替え</label>
                </div>

                <button wire:loading type="submit" class="btn btn-outline-secondary" disabled>
                    <span class="spinner-border" role="status" aria-hidden="true">
                    </span>
                    Loading...
                </button>

                <button wire:loading.remove type="submit" class="btn btn-outline-secondary">検索する</button>
            </div>

        </form>
    </div>

    <div>
        @if ($articles->isEmpty())
            <div class="d-flex justify-content-center">
                <h3>カテゴリー "{{ $result }}" に一致する検索結果がありません。</h3>
            </div>
        @endif
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($articles as $article)
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
                        @if (!Auth::check())
                            <button
                                class="btn shadow rounded-pill bg-white text-danger btn-outline-danger position-absolute bottom-0 end-0  position-relative"
                                wire:click.prevent="like({{ $article }})" disabled>
                                Like <i class="far fa-heart"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger bg-gradient">
                                    {{ $article->likes->count() }}
                                </span>
                            </button>
                        @elseif ($article->user_id === Auth::id())
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

    <div class="d-flex justify-content-center mt-3">
        {{ $articles->links() }}
    </div>

</div>
