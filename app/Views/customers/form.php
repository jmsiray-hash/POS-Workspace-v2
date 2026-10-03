<?= $this->include('templates/header') ?>

<div class="page-heading">
    <h2><?= esc($title) ?></h2>
    <p class="lead">Enter the customer details below. Required fields are validated before saving.</p>
</div>

<?php if (session()->getFlashdata('errors') || validation_list_errors()): ?>
    <div class="alert alert-error"><?= validation_list_errors() ?></div>
<?php endif; ?>

<form method="post" action="<?= esc($action) ?>">
    <?= csrf_field() ?>
    <label for="full_name">Full name <span aria-hidden="true">*</span></label>
    <input id="full_name" name="full_name" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>" required maxlength="100">
    <label for="email">Email <span aria-hidden="true">*</span></label>
    <input id="email" type="email" name="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>" required maxlength="100">
    <label for="phone">Phone</label>
    <input id="phone" name="phone" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>" maxlength="20">
    <div class="form-actions">
        <button type="submit">Save customer</button>
        <a href="<?= base_url('customers') ?>">Cancel</a>
    </div>
</form>

<?= $this->include('templates/footer') ?>
