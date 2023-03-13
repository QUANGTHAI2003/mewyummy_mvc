<?php
function slug(string $text = '')
{
    $text = normalizer_normalize($text, Normalizer::FORM_D);
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
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


function actionPage(string|array $unsetKey)
{
    $queryParams = $_GET;
    if (is_array($unsetKey)) {
        foreach ($unsetKey as $key) {
            unset($queryParams[$key]);
        }
    } else {
        unset($queryParams[$unsetKey]);
    }
    return $queryParams;
}

function checkParamExist($value) {
    if(isset($_GET['sort'])) {
        if($_GET['sort'] == $value) {
            return true;
        }
    }
}

function numberFormatPrice($price)
{
    return number_format($price, 0, ',', '.') . '₫';
}

function addSlug($data)
{
    foreach ($data as $key => $value) {
        $data[$key]['slug'] = slug($value['name']);
    }
    return $data;
}

// format 100.000 => 100000
function formatPrice($price)
{
    return str_replace('.', '', $price);
}

function getParamRadio($param)
{
    if ($param) {
        $param = explode(':', $param);
        return $param;
    }
}
