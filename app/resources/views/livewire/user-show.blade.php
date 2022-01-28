<div class="container">

    <div class="d-flex justify-content-center">
        <h2>User Profile </h2>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div>
            <h3>User name </h3>
            <button class="btn btn-info rounded-pill">フォロー <i class="fas fa-user-plus"></i></button>
        </div>

        <div>
            <ul>
                <ol>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#followerModal">
                        <span class="h4">follower</span>
                    </button>
                </ol>
                <ol>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#followModal">
                        <span class="h4">follow</span>
                    </button>
                </ol>
                <ol>
                    <button type="button" class="btn" data-bs-toggle="modal"
                        data-bs-target="#likedArticleModal">
                        <span class="h4">Liked Article</span>
                    </button>
                </ol>
                <ol>
                    <button type="button" class="btn" data-bs-toggle="modal"
                        data-bs-target="#commentedArticle">
                        <span class="h4">Commented Article</span>
                    </button>
                </ol>
            </ul>
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
                <div class="modal-body">
                    ...
                </div>
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
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="likedArticleModal" tabindex="-1" aria-labelledby="likedArticleModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="likedArticleModalTitle">いいねした記事</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="commentedArticle" tabindex="-1" aria-labelledby="commentedArticleTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentedArticleTitle">コメントした記事</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h2>Recently Post</h2>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <div class="card-header position-relative">
                    <h5 class="card-title">Book title</h5>
                    <span class="badge bg-secondary position-absolute top-0 end-0">Category</span>
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the
                        card's
                        content.</p>
                </div>
                <div class="card-footer text-muted position-relative">
                    <h6 class="card-title">Created At</h6>
                    <button class="btn btn-outline-success position-absolute bottom-0 end-0  position-relative">
                        Like <i class="far fa-heart"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                            +99
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
