<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'POS Application') ?></title>
    <style>
        :root { --ink: #1f2937; --muted: #64748b; --brand: #0f766e; --brand-dark: #115e59; --line: #dbe5e3; --surface: #ffffff; --wash: #f0fdfa; }
        * { box-sizing: border-box; }
        body { background: #f7faf9; color: var(--ink); font-family: Arial, sans-serif; line-height: 1.6; margin: 0; }
        .site-shell { margin: 0 auto; max-width: 1120px; padding: 24px; }
        .site-header { align-items: center; display: flex; gap: 24px; justify-content: space-between; margin-bottom: 36px; }
        .brand { color: var(--brand-dark); font-size: 1.2rem; font-weight: 700; text-decoration: none; }
        nav { display: flex; flex-wrap: wrap; gap: 8px; }
        nav a { border-radius: 6px; color: var(--muted); padding: 8px 12px; text-decoration: none; }
        nav a:hover, nav a:focus { background: var(--wash); color: var(--brand-dark); }
        main { background: var(--surface); border: 1px solid var(--line); border-radius: 8px; padding: clamp(24px, 5vw, 56px); }
        h1 { color: var(--brand-dark); font-size: clamp(2rem, 5vw, 3.5rem); line-height: 1.1; margin: 0 0 16px; }
        h2 { color: var(--brand-dark); margin-top: 0; }
        .lead { color: var(--muted); font-size: 1.15rem; max-width: 680px; }
        .page-heading { margin-bottom: 28px; }
        table { border-collapse: collapse; margin-top: 20px; min-width: 680px; width: 100%; }
        .table-wrap { overflow-x: auto; }
        th, td { border-bottom: 1px solid var(--line); padding: 14px 12px; text-align: left; }
        th { background: var(--wash); color: var(--brand-dark); font-size: .85rem; letter-spacing: .04em; text-transform: uppercase; }
        footer { color: var(--muted); font-size: .9rem; padding: 20px 0; }
        form { display: grid; gap: 10px; max-width: 620px; }
        label { color: var(--brand-dark); font-weight: 700; margin-top: 8px; }
        input { border: 1px solid var(--line); border-radius: 6px; font: inherit; padding: 10px; width: 100%; }
        button, .button-link { background: var(--brand); border: 0; border-radius: 6px; color: white; cursor: pointer; display: inline-block; font: inherit; font-weight: 700; padding: 10px 14px; text-decoration: none; }
        button:hover, .button-link:hover { background: var(--brand-dark); }
        .form-actions, .page-heading-inline { align-items: center; display: flex; gap: 12px; justify-content: space-between; }
        .form-actions { justify-content: flex-start; margin-top: 12px; }
        .alert { border-radius: 6px; margin: 16px 0; padding: 12px 16px; }
        .alert-error { background: #fef2f2; color: #991b1b; }
        .alert-success { background: #ecfdf5; color: #166534; }
        .avatar { border-radius: 50%; height: 48px; object-fit: cover; width: 48px; }
        .avatar-small { vertical-align: middle; }
        @media (max-width: 640px) { .site-header { align-items: flex-start; flex-direction: column; gap: 12px; } .site-shell { padding: 16px; } }
    </style>
</head>
<body>

<div class="site-shell">
    <header class="site-header">
        <a class="brand" href="<?= base_url('home') ?>">POS Workspace</a>
        <nav aria-label="Primary navigation">
            <a href="<?= base_url('home') ?>">Home</a>
            <a href="<?= base_url('about') ?>">About</a>
            <a href="<?= base_url('customers') ?>">Customers</a>
            <a href="<?= base_url('users') ?>">Users</a>
        </nav>
    </header>
    <main>