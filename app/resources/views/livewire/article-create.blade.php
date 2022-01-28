<div class="container">

    <form action="submit" wire:click.prevent="post" method="post">
        @csrf

        <div class="card text-center col-md-6 mx-auto">
            <div class="card-header">
                <h4 class="fw-bold mt-2">投稿内容を入力</h4>
            </div>

            <div class="card-body">

                <div class="form-floating card-text mb-2">
                    <input type="text" class="form-control" id="floatingInput" placeholder="タイトルを入力"
                        wire:model.lazy="title">
                    <label for="floatingInput">タイトルを入力</label>
                    @error('title')
                        <span class="bg-danger text-white">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating card-text mb-2">
                    <select class="form-select" id="floatingSelect" aria-label="category select"
                        wire:model.lazy="category">
                        <option selected>選択する</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">カテゴリーを選択</label>
                    @error('category')
                        <span class="bg-danger text-white">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating card-text mb-2">
                    <textarea style="height: 100px" class="form-control" placeholder="コメントを入力" id="floatingTextarea"
                        wire:model.lazy="comment"></textarea>
                    <label for=" floatingTextarea">コメントを入力</label>
                    @error('comment')
                        <span class="bg-danger text-white">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-primary mx-auto">投稿</button>

            </div>
        </div>

    </form>

    @if (session()->has('message'))
        <div class="bg-danger text-white">{{ session('message') }}</div>
    @endif

</div>
