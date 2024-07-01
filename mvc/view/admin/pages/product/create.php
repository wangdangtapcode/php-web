<button class="btn btn-bg-light border border-secondary-subtle btn-back"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
    </svg></button>
<h1 class="mb-4">Tạo mới sản phẩm truyện tranh</h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo _WEB_ROOT ?>/admin/product/create_done" method="POST">
                <div class="mb-3">
                    <label for="authorName" class="form-label">Tên tác giả</label>
                    <input type="text" class="form-control" id="authorName" name="authorName">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Thể loại</label>
                    <input type="text" class="form-control" id="genre" name="genre">
                </div>
                <div class="mb-3">
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="featured" id="feature1" value="1" checked>
                        <label class="form-check-label" for="feature1">Nổi bật</label>
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="featured" id="feature0" value="0" checked>
                        <label class="form-check-label" for="feature0">Không</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả sản phẩm</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="releaseDate" class="form-label">Ngày phát hành</label>
                    <input type="text" class="form-control" id="releaseDate" name="releaseDate">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" class="form-control" id="price" name="price" value="0" min="0">
                </div>
                <div class="mb-3">
                    <label for="coverImage" class="form-label">Chọn ảnh bìa</label>
                    <input type="file" class="form-control-file" id="coverImage" name="coverImage" accept="image/*">
                </div>
                <div class="mb-3">
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="active" value="active" checked>
                        <label class="form-check-label" for="active">Hoạt động</label>
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive">
                        <label class="form-check-label" for="inactive">Dừng hoạt động</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </form>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="coverImagePreview" class="form-label">Ảnh bìa</label>
                <img id="coverImagePreview" class="img-fluid" src="" alt="Ảnh bìa">
            </div>
        </div>
    </div>
</div>
<script>
    //load img
    const coverImageInput = document.getElementById('coverImage');
    const img = document.querySelector(".img-fluid");
    if (img && coverImageInput) {
        coverImageInput.addEventListener('change', function () {
            var weburl = "<?php echo _WEB_ROOT ?>/public/img/";
            var file = this.files[0].name;
            if (file) {
                img.src = weburl + file;
            }
        });
    }
    
    // end load img

    //back
    const btnBack = document.querySelector('.btn-back');
    if (btnBack) {
        btnBack.addEventListener("click", () => {
            window.history.back()
        });
    }
    //end back



</script>