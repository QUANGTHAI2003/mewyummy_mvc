<?php
use App\Core\{Session};
if (Session::has('message')) {
    showMessage('Hello', 'Hello', 'error');
}
?>