<?php
if (in_array('roles-permissions', $_SESSION['account_role']['permission'])) {
?>
    <h1 class="mb-4">Phân quyền</h1>
    <div data-roles="<?php echo htmlspecialchars(json_encode($roles)); ?>"></div>
    <table class="table table-hover table-bordered" table-permissions>
        <thead>
            <tr>
                <th class="text-center">Tính năng</th>
                <?php
                foreach ($roles as $role) {
                    echo '<th class="text-center">' . $role['title'] . '</th>';
                }
                ?>

            </tr>
        </thead>
        <tbody>
            <tr data-name="id" class="d-none">
                <td></td>
                <?php
                foreach ($roles as $role) {
                    echo '<td class="text-center"><input type="text" value= "' . $role['role_id'] . '"></td>';
                }
                ?>
            </tr>
            <tr>
                <td colspan="4"><b>Danh sách sản phẩm</b></td>
            </tr>
            <tr data-name="products-view">
                <td class="text-center">Xem</td>
                <?php
                foreach ($roles as $role) {
                    echo '<td class="text-center"> <input type="checkbox"></td>';
                }
                ?>
            </tr>
            <tr data-name="products-create">
                <td class="text-center">Thêm</td>
                <?php
                foreach ($roles as $role) {
                    echo '<td class="text-center"> <input type="checkbox"></td>';
                }
                ?>
            </tr>
            <tr data-name="products-edit">
                <td class="text-center">Sửa</td>
                <?php
                foreach ($roles as $role) {
                    echo '<td class="text-center"> <input type="checkbox"></td>';
                }
                ?>
            </tr>
            <tr data-name="products-delete">
                <td class="text-center">Xóa</td>
                <?php
                foreach ($roles as $role) {
                    echo '<td class="text-center"> <input type="checkbox"></td>';
                }
                ?>
            </tr>
            <tr>
                <td colspan="4"><b>Nhóm quyền</b></td>
            </tr>
            <tr data-name="roles-view">
                <td class="text-center">Xem</td>
                <?php
                foreach ($roles as $role) {
                    echo '<td class="text-center"> <input type="checkbox"></td>';
                }
                ?>
            </tr>
            <tr data-name="roles-permissions">
                <td class="text-center">Phân quyền</td>
                <?php
                foreach ($roles as $role) {
                    echo '<td class="text-center"> <input type="checkbox"></td>';
                }
                ?>
            </tr>
        </tbody>
    </table>

    <div class="text-end">
        <button type="submit" class="btn btn-primary mb-3" button-submit>Cập nhật</button>
    </div>

    <form action="<?php echo _WEB_ROOT ?>/admin/role/permissions_done" method="POST" id="form-change-permissions" class="d-none">
        <div class="form-group">
            <input type="text" class="form-control" name="permissions">
        </div>
    </form>
    <script src="<?php echo _WEB_ROOT ?>/public/admin/js/role.js"></script>
<?php
};
?>