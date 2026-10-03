<?= $this->include('templates/header') ?>

<div class="page-heading">
    <h2><?= esc($title) ?></h2>
    <p class="lead">Enter the account details below. Avatar uploads must be JPG or PNG files no larger than 2MB.</p>
</div>

<?php if (validation_list_errors()): ?>
    <div class="alert alert-error"><?= validation_list_errors() ?></div>
<?php endif; ?>

<form method="post" action="<?= esc($action) ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <label for="username">Username <span aria-hidden="true">*</span></label>
    <input id="username" name="username" value="<?= esc(old('username', $user['username'] ?? '')) ?>" required maxlength="50">
    <label for="full_name">Full name <span aria-hidden="true">*</span></label>
    <input id="full_name" name="full_name" value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>" required maxlength="100">
    <label for="avatar">Profile picture (optional)</label>
    <input id="avatar" type="file" name="avatar" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
    <?php if (! empty($user['avatar'])): ?>
        <p>Current avatar: <img class="avatar avatar-small" src="<?= base_url('uploads/' . rawurlencode($user['avatar'])) ?>" alt="Current profile picture"></p>
    <?php endif; ?>
    <div class="form-actions">
        <button type="submit">Save user</button>
        <a href="<?= base_url('users') ?>">Cancel</a>
    </div>
</form>

<?= $this->include('templates/footer') ?>
