<?php
if (in_array('roles-view', $_SESSION['account_role']['permission'])) {
?>
    <h1>Nhóm quyền</h1>
    <div class="card mb-4 mt-4">
        <div class="card-header p-2">
            <i class="fas fa-table me-1"></i>
            Danh sách
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID </th>
                        <th class="text-center">Nhóm quyền</th>
                        <th class="text-center">Mô tả</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($roles as $role) {
                        echo '</tr>';
                        echo '<td class="text-center">' . $role['role_id'] . '</td>';
                        echo '<td class="text-center">' . $role['title'] . '</td>';
                        echo '<td class="text-center">' . $role['description'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
};
?>