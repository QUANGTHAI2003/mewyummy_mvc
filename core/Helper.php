<?php
function slug(string $text = '')
{
    $text = strtolower($text);
    $text = normalizer_normalize($text, Normalizer::FORM_KD);
    $text = preg_replace('/\p{Mn}/u', '', $text);

    $words = explode(' ', $text);

    return implode('-', $words);
}

function redirect(string $uri = '')
{
    if ($uri == '/') {
        header('Location: ' . _WEB_ROOT . $uri);
    } else {
        header('Location: ' . _WEB_ROOT . '/' . $uri);
    }
    exit();
}

// upload file function and show error
function uploadFile($file, $path)
{
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];

    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 2097152) {
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = $path . $file_name_new;
                if (move_uploaded_file($file_tmp, $file_destination)) {
                    return $file_name_new;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function script($js)
{
    echo '<script type="text/javascript">' . $js . '</script>';
}

// showMessage use js function
function showMessage(string $title = '', string $message = '', string $type = 'success', int $duration = 2000)
{
    $js = "
            showMessage('$title', '$message', '$type', $duration)
            ";
    script($js);
}


function linkPage($num = '', $type = 'page')
{
    $queryString = $_SERVER['QUERY_STRING'];
    if ($queryString) {
        $queryString = urldecode($queryString);
        $queryString = explode('&', $queryString);
        $queryString = array_filter($queryString, function ($item) use ($type) {
            return strpos($item, $type . '=') === false;
        });
        $queryString = implode('&', $queryString);
        $newQuery = '/san-pham?' . $type . '=' . $num . '&' . $queryString;
        $newQuery = rtrim($newQuery, '&');
        return $newQuery;
    } else {
        return '/san-pham?' . $type . '=' . $num;
    }
}


function actionPage()
{
    $newQuery = $_GET;
    // unset($newQuery['keyword'], $newQuery['minPrice'], $newQuery['maxPrice']);
    return $newQuery;
}

// ($_GET['sortName'] == 'az') ? 'checked' : '' code a function to check this sortName and az is a parameter
function checkSort(string $sortType = '', string $sortValue = '')
{
    if (isset($_GET[$sortType])) {
        if ($_GET[$sortType] == $sortValue) {
            return 'checked';
        }
    }
}
