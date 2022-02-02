<div class="container">
    <form wire:submit.prevent="update" method="post">
        @csrf

        <div class="card text-center col-md-6 mx-auto position-relative">

            <div class="card-header bg-info bg-gradient text-white">
                <h4 class="fw-bold mt-2">アカウント情報</h4>
            </div>

            <div class="card-body">

                <div class="form-floating card-text mb-2">
                    <input type="text" class="form-control" id="floatingInput" placeholder="名前"
                        wire:model.defer="name">
                    <label for="floatingInput">名前</label>
                    @error('name')
                        <span class="bg-danger text-white">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating card-text mb-2">
                    <input type="email" class="form-control" id="floatingInput" placeholder="E-mail"
                        wire:model.defer="email" disabled>
                    <label for="floatingInput">E-mail</label>
                </div>

                <div class="row card-text text-muted text-start">
                    <p class="col">
                        登録日時: {{ $user->created_at }}
                    </p>
                    <p class="col text-end">
                        更新日時: {{ $user->updated_at }}
                    </p>
                </div>

                <div wire:loading>
                    <button type="submit" class="btn btn-lg btn-primary mx-auto" disabled>
                        <span class="spinner-border" role="status" aria-hidden="true">
                        </span>
                        Loading...
                    </button>
                </div>

                <div wire:loading.remove>
                    <button type="submit" class="btn btn-lg btn-primary mx-auto">編集</button>
                </div>

            </div>
        </div>

    </form>

</div>
