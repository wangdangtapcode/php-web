<?php
if (in_array('products-view', $_SESSION['account_role']['permission'])) {
?>
    <h1>Danh sách sản phẩm</h1>
    <?php
if (in_array('products-create', $_SESSION['account_role']['permission'])) {
?>
    <div class="d-flex  justify-content-end mb-2">
            <a href="<?php echo _WEB_ROOT ?>/admin/product/create" class="btn btn-outline-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                </svg>Thêm sản phẩm</a>
        </div>
<?php
};
?>

<div class="card mb-4">
    <div class="card-header p-2">
        <i class="fas fa-table me-1"></i>
        Danh sách sản phẩm
    </div>
    <div class="card-body">

        <div class="headertable d-flex justify-content-between align-items-center mb-3">
            <div class="datatable-dropdown d-flex align-items-center">
                <select class="form-select w-auto me-1" aria-label="" button-select-limit>
                    <option value="5" <?php if ($pagination['limit'] == 5) echo "selected"; ?>>5</option>
                    <option value="10" <?php if ($pagination['limit'] == 10) echo "selected"; ?>>10</option>
                    <option value="15" <?php if ($pagination['limit'] == 15) echo "selected"; ?>>15</option>
                    <option value="20" <?php if ($pagination['limit'] == 20) echo "selected"; ?>>20</option>
                </select>
                <label for="" class="form-label">Sản phẩm mỗi trang</label>
            </div>
            <form action="" id="form-search" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nhập từ khóa" name="keyword" value="<?php echo isset($keyword) ? $keyword : '' ?>">
                    <button class="btn btn-success btn-search" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <!-- Table -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID </th>
                    <th class="text-center">Hình ảnh</th>
                    <th class="text-center">Tiêu đề</th>
                    <th class="text-center">Tác giả</th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Ngày phát hành</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Nổi bật</th>
                    <th class="text-center">Hành động</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                    echo '</tr>';
                    echo '<td class="text-center">' . $product['comic_id'] . '</td>';
                    echo '<td class="text-center"><img src="' . _WEB_ROOT . $product['cover_image_url'] . '" alt="' . $product['title'] . '" width="100px" height="auto"></td>';
                    echo '<td class="text-center">' . $product['title'] . '</td>';
                    echo '<td class="text-center">' . $product['author_name'] . '</td>';
                    echo '<td class="text-center">' . $product['price'] . '</td>';
                    echo '<td class="text-center">' . $product['release_date'] . '</td>';
                    if(in_array('products-edit', $_SESSION['account_role']['permission'])){
                        if ($product['status'] == "active") {
                            echo '<td class="text-center"><a href="javascript:;" class="badge text-bg-success text-decoration-none" 
                            data-status = "active"
                            data-id =' . $product['comic_id'] . '
                            button-change-status
                            >Hoạt động</a></td>';
                        } else {
                            echo '<td class="text-center"><a href="javascript:;" class="badge text-bg-danger text-decoration-none" 
                            data-status = "inactive"
                            data-id =' . $product['comic_id'] . '
                            button-change-status
                            >Dừng hoạt động</a></td>';
                        }
                    }else{
                        echo '<td></td>';
                    }
                    if(in_array('products-edit', $_SESSION['account_role']['permission'])){
                        if ($product['featured'] == "0") {
                            echo '<td class="text-center fs-5 "><a href="'._WEB_ROOT.'/admin/product/change_feature/feature/'.$product['comic_id'].'"><i class="bi bi-star"></i></a></td>';
                        } else {
                            echo '<td class="text-center fs-5 "><a href="'._WEB_ROOT.'/admin/product/change_feature/unfeature/'.$product['comic_id'].'"><i class="bi bi-star-fill"></i></a></td>';
                        }
                    }else{
                        echo '<td></td>';
                    }
                    echo '<td class="text-center">';
                    if(in_array('products-edit', $_SESSION['account_role']['permission'])){
                        echo '<a href='._WEB_ROOT.'/admin/product/edit/'.$product['comic_id'].' class="btn btn-warning me-1"> Sửa</a>'; 
                    }
                    if(in_array('products-delete', $_SESSION['account_role']['permission'])){
                        echo '<button class="btn btn-danger me-1"  data-id =' . $product['comic_id'] . ' button-delete> Xóa</button>';
                    }
                    if(in_array('products-view', $_SESSION['account_role']['permission'])){
                        echo '<button class="btn btn-primary me-1" data-id =' . $product['comic_id'] . ' button-detail> Xem</button>';
                    }                    
                    
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <div class="footer d-flex justify-content-between align-self-center">
            <?php
            echo "<div class='datatable-info'>Hiện " . ($pagination['productStart'] + 1) . " đến " . ($pagination['productStart'] + $pagination['limit']) . " của " . $pagination['countProduct'] . " Sản phẩm</div>";
            ?>

            <nav aria-label="Page navigation example" class="">
                <ul class="pagination">
                    <?php
                    if ($pagination['currentPage'] > 1) {
                        echo "<li class='page-item'>
                            <button class='page-link' button-pagination='" . ($pagination['currentPage'] - 1) . "'>
                            <span aria-hidden='true'>&laquo;</span>
                            </button>
                        </li>";
                    }

                    for ($i = 1; $i <= $pagination['totalPage']; $i++) {
                        $isActive = ($i == $pagination['currentPage']) ? 'active' : '';

                        echo "<li class='page-item $isActive'><button class='page-link' button-pagination ='$i'>$i</button></li>";
                    }

                    if ($pagination['currentPage'] < $pagination['totalPage']) {
                        echo "<li class='page-item'>
                            <button class='page-link' button-pagination='" . ($pagination['currentPage'] + 1) . "'>
                            <span aria-hidden='true'>&raquo;</span>
                            </button>
                        </li>";
                    }

                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<form action="" method="POST" id="form-change-status" data-path="<?php echo _WEB_ROOT ?>/admin/product/change_status"></form>
<form action="" method="POST" id="form-delete-item" data-path="<?php echo _WEB_ROOT ?>/admin/product/delete"></form>
<form action="" method="POST" id="form-change-limit" data-path="<?php echo _WEB_ROOT ?>/admin/product/change_limit"></form>
<form action="" method="get" id="form-detail" data-path="<?php echo _WEB_ROOT ?>/admin/product/detail"></form>
<script src="<?php echo _WEB_ROOT ?>/public/admin/js/product.js"></script>
<?php
};
?>