<?= $this->include('templates/header') ?>

<div class="container mt-4">
    <div class="page-heading page-heading-inline"><h2>Customer List</h2><a class="button-link" href="<?= base_url('customers/new') ?>">Add customer</a></div>
    <?php if (session()->getFlashdata('message')): ?><div class="alert alert-success"><?= esc(session()->getFlashdata('message')) ?></div><?php endif; ?>
    <table class="table table-striped table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($customers) && is_array($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['id']) ?></td>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone']) ?></td>
                        <td><?= esc($customer['created_at']) ?></td>
                        <td><a href="<?= base_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No customers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->include('templates/footer') ?>