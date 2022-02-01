<div class="container">

    <form wire:submit.prevent="store" method="post">
        @csrf

        <div class="card text-center col-md-6 mx-auto">
            <div class="card-header bg-info bg-gradient text-white">
                <h4 class="fw-bold mt-2">投稿内容を入力</h4>
            </div>

            <div class="card-body">

                <div class="form-floating card-text mb-2">
                    <input type="text" class="form-control" id="floatingInput" placeholder="タイトルを入力"
                        wire:model.defer="title">
                    <label for="floatingInput">タイトルを入力</label>
                    @error('title')
                        <span class="px-2 rounded-pill bg-danger text-white">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating card-text mb-2">
                    <select class="form-select" id="floatingSelect" aria-label="category select"
                        wire:model.defer="category">
                        <option selected>選択する</option>
                        <option value="fun">楽しい</option>
                        <option value="ungly">怒り</option>
                        <option value="sad">悲しい</option>
                    </select>
                    <label for="floatingSelect">カテゴリーを選択</label>
                    @error('category')
                        <span class="px-2 rounded-pill bg-danger text-white">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating card-text mb-2">
                    <textarea style="height: 100px" class="form-control" placeholder="コメントを入力" id="floatingTextarea"
                        wire:model.defer="content"></textarea>
                    <label for=" floatingTextarea">コメントを入力</label>
                    @error('content')
                        <span class="px-2 rounded-pill bg-danger text-white">{{ $message }}</span>
                    @enderror
                </div>

                <div wire:loading>
                    <button type="submit" class="btn btn-lg btn-primary mx-auto" disabled>
                        <span class="spinner-border" role="status" aria-hidden="true">
                        </span>
                        Loading...
                    </button>
                </div>

                <div wire:loading.remove>
                    <button type="submit" class="btn btn-lg btn-primary mx-auto">投稿</button>
                </div>


            </div>
        </div>

    </form>

</div>
