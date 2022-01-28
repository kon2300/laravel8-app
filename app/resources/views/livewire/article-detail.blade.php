<div class="container">

    <div class="card col-md-6 mx-auto">
        <div class="card-header position-relative">
            <h5 class="card-title">Book title</h5>
            <span class="badge bg-secondary position-absolute top-0 end-0">Category</span>
        </div>
        <div class="card-body">
            <p class="card-text">
                Some quick example text to build on the card title and make up the bulk of
                the
                card's
                content.
            </p>
        </div>
        <div class="card-footer text-muted position-relative">
            <h6 class="card-title">Created At</h6>
            <button class="btn btn-outline-success position-absolute bottom-0 end-0 position-relative">
                Like <i class="far fa-heart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                    +99
                </span>
            </button>
        </div>
    </div>

    <form action="submit" wire:click.prevent="" method="post">
        @csrf

        <div class="card text-center col-md-6 mx-auto mt-5">

            <div class="card-body">

                <div class="form-floating card-text mb-2">
                    <textarea style="height: 100px" class="form-control" placeholder="コメントを入力" id="floatingTextarea"
                        wire:model.lazy="comment"></textarea>
                    <label for=" floatingTextarea">この投稿へのコメントを入力</label>
                    @error('comment')
                        <span class="bg-danger text-white">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-primary mx-auto mt-1">コメントする</button>

            </div>
        </div>

    </form>


    <div class="d-flex justify-content-center my-3">
        <h3>この投稿へのコメント</h3>
    </div>

    <div class="card col-md-6 mx-auto position-relative">
        <button class="btn btn-sm btn-danger position-absolute top-0 end-0">
            <i class="far fa-trash-alt"></i>
        </button>
        <div class="card-body">
            <p class="card-text">user name </p>
            <p class="card-text">参考になった</p>
            <p class="card-text text-muted text-end">created at</p>
        </div>
    </div>

</div>
