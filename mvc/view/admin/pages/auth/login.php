<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-5">
            <div class="card ">
                <div class="card-header p-2 bg-primary-subtle">
                </div>
                <div class="card-body ">
                    <form action="<?php echo _WEB_ROOT ?>/admin/auth/login_done" method="POST">
                        <div class="form-group mb-2">
                            <label for="username " class="mb-1">Tên đăng nhập:</label>
                            <input type="text" class="form-control mb-2" id="username" placeholder="Nhập tên đăng nhập" name="username">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password" class="mb-1">Mật khẩu:</label>
                            <input type="password" class="form-control mb-2" id="password" placeholder="Nhập mật khẩu"  name="password">
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Đăng Nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>