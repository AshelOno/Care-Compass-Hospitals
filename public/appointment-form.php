<?php if (isset($_SESSION['error'])): ?>
    <div style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div style="color: green;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>
