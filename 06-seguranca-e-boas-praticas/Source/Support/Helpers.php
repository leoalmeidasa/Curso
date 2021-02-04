<?php


/**
 * ####################
 * ###   VALIDATE   ###
 * ####################
 */


/**
 * @param string $email
 * @return mixed
 */
function is_email(string $email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param string $passwd
 * @return bool
 */
function is_passwd(string $passwd)
{
    if (password_get_info($passwd)['algo']) {
        return true;
    }
    return (mb_strlen($passwd) >= CONF_PASSWD_MIN_LEN && mb_strlen($passwd) <= CONF_PASSWD_MAX_LEN ? true : false);
}

/**
 * @param string $password
 * @return bool|string
 */
function passwd(string $password)
{
    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

/**
 * @param string $password
 * @param string $hash
 * @return bool
 */
function passwd_verify(string $password, string $hash)
{
    return password_verify($password, $hash);
}

/**
 * @param string $hash
 * @return bool
 */
function passwd_rehash(string $hash)
{
    return password_needs_rehash($hash, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

function csrf_input()
{
    session()->csrf();
    return "<input type='hidden' name='csrf' value='" . (session()->csrf_token ?? "") . "'/>";
}

function csrf_verify($request)
{
    if (empty(session()->csrf_token) || empty($request['csrf']) || $request['csrf'] != session()->csrf_token) {
        return false;
    }
    return true;
}

/**
 * ##################
 * ###   STRING   ###
 * ##################
 */


/**
 * @param string $string
 */
function str_slug(string $string)
{
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

    $slug = str_replace(["-----", "----", "---", "--"], "-",
        str_replace(" ", "-", trim(strtr(utf8_decode($string), utf8_decode($formats), $replace))));
    return $slug;
}

/**
 * @param string $string
 * @return mixed
 */
function str_studly_case(string $string)
{
    $string = str_slug($string);
    $studlyCase = str_replace(" ", "",
        mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE));

    return $studlyCase;
}

/**
 * @param string $string
 * @return string
 */
function str_camel_case(string $string)
{
    return lcfirst(str_studly_case($string));
}

/**
 * @param string $string
 * @return false|mixed|string|string[]|null
 */
function str_title(string $string)
{
    return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function str_limit_words(string $string, int $limit, string $pointer = "...")
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);

    if ($numWords < $limit) {
        return $string;
    }

    $words = implode(" ", array_slice($arrWords, 0, $limit));
    return "{$words}{$pointer}";
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function str_limit_chars(string $string, int $limit, string $pointer = "...")
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    if (mb_strlen($string) <= $limit) {
        return $string;
    }

    $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), " "));
    return "{$chars}{$pointer}";
}


/**
 * #####################
 * ###   NAVIGATION  ###
 * #####################
 */


/**
 * @param string $path
 * @return string
 */
function url(string $path)
{
    return CONF_URL_BASE . ($path[0] == "/" ? mb_substr($path, 1) : $path);
}

/**
 * @param string $url
 */
function redirect(string $url)
{
    header("HTTP/1.1 302 Redirect");

    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }

    $location = url($url);
    header("Location: {$location}");
    exit;
}


/**
 * ################
 * ###   CORE   ###
 * ################
 */


/**
 * @return PDO
 */
function db()
{
    return \Source\Core\Connect::getInstance();
}

/**
 * @return \Source\Core\Message
 */
function message()
{
    return new \Source\Core\Message();
}

/**
 * @return \Source\Core\Session
 */
function session()
{
    return new \Source\Core\Session();
}


/**
 * #################
 * ###   MODEL   ###
 * #################
 */


/**
 * @return \Source\Models\User
 */
function user()
{
    return new \Source\Models\User();
}