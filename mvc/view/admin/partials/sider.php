<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark " style="height: 100%;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="<?php echo _WEB_ROOT ?>/admin/dashboard/index" class="nav-link  text-white">
                Tổng quan
            </a>
        </li>
        <?php
        if (in_array('products-view', $_SESSION['account_role']['permission'])) {
        ?>
            <li>
                <a href="<?php echo _WEB_ROOT ?>/admin/product/index" class="nav-link  text-white">
                    Sản phẩm
                </a>
            </li>
        <?php
        };
        ?>
        <?php
        if (in_array('roles-view', $_SESSION['account_role']['permission'])) {
        ?>
            <li>
                <a href="<?php echo _WEB_ROOT ?>/admin/role/index" class="nav-link  text-white">
                    Nhóm quyền
                </a>
            </li>
        <?php
        };
        ?>
        <?php
        if (in_array('roles-permissions', $_SESSION['account_role']['permission'])) {
        ?>
            <li>
                <a href="<?php echo _WEB_ROOT ?>/admin/role/permissions" class="nav-link  text-white">
                    Phân quyền
                </a>
            </li>
        <?php
        };
        ?>

        <!-- Thêm các mục danh sách khác nếu cần -->
    </ul>
</div>
<?php
if (in_array('roles-permissions', $_SESSION['account_role']['permission'])) {
?>

<?php
};
?>