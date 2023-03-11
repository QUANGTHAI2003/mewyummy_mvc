<?php
use App\{Session};
if (Session::has('message')) {
    showMessage('Hello', 'Hello', 'error');
}
?>