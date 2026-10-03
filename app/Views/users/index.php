<?= $this->include('templates/header') ?>

<div class="container mt-4">
    <div class="page-heading page-heading-inline"><h2>User List</h2><a class="button-link" href="<?= base_url('users/new') ?>">Add user</a></div>
    <?php if (session()->getFlashdata('message')): ?><div class="alert alert-success"><?= esc(session()->getFlashdata('message')) ?></div><?php endif; ?>
    <table class="table table-striped table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Avatar</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><img class="avatar" src="<?= base_url(! empty($user['avatar']) ? 'uploads/' . rawurlencode($user['avatar']) : 'images/avatar-placeholder.svg') ?>" alt="<?= esc($user['full_name']) ?> avatar"></td>
                        <td><?= esc($user['created_at']) ?></td>
                        <td><a href="<?= base_url('users/' . $user['id'] . '/edit') ?>">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->include('templates/footer') ?>