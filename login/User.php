<?php

require "DbCon.php";

class User
{
    static function isLoggedIn()
    {
        if (isset($_SESSION['login_id'])) {
            return $_SESSION['login_id'];
        }

        if (isset($_COOKIE['login_key']) && $_COOKIE['login_key'] !== "") {
            $key = $_COOKIE['login_key'];
            $key = htmlspecialchars($key);
            global $db;
            $smt = "SELECT email FROM User WHERE login_key='$key' LIMIT 1";
            $smt = $db->query($smt);

            if ($smt->num_rows) {
                $smt = $smt->fetch_array()['email'];
                return $smt;
            }
        }
        return FALSE;
    }

    static function details(): array
    {
        global $db;
        $details = [];
        $login_id = self::isLoggedIn();

        $smt = "SELECT fullname, email FROM User WHERE email = ? LIMIT 1";
        $query = $db->prepare($smt);
        if (!$query) {
            die("Prepare failed: (" . $db->errno . ") " . $db->error);
        }
        $query->bind_param('s', $login_id);
        $query->execute();
        $res = $query->get_result();
        while ($r = $res->fetch_array()) {
            $details['username'] = $r['fullname'];
            $details['email'] = $r['email'];
        }
        return $details;
    }

    static function remember($email)
    {
        global $db;
        $randkey = random_bytes(8);
        $randkey = bin2hex($randkey);
        $smt = "UPDATE User SET login_key = ? WHERE email = ? ";

        $query = $db->prepare($smt);
        if (!$query) {
            die("Prepare failed: (" . $db->errno . ") " . $db->error);
        }
        $query->bind_param('ss', $randkey, $email);

        if ($query->execute()) {
            $next30days = (60 * 60 * 24 * 30);
            setcookie('login_key', $randkey, time() + $next30days, "/");
        } else {
            echo "error: " . $query->error;
        }
    }

    static function accountExit($email, $password = null)
    {
        global $db;
        $smt = "SELECT email FROM User WHERE email = ?";
        if ($password) {
            $password = crypt($password, "my-key");
            $smt .= " AND `password` = ?";
        }
        $query = $db->prepare($smt);
        if (!$query) {
            die("Prepare failed: (" . $db->errno . ") " . $db->error);
        }
        $ss = array_fill(0, count(func_get_args()), "s");
        $query->bind_param(implode($ss), ...func_get_args());
        $query->execute();
        $query->store_result();
        $total = $query->num_rows;
        return $total;
    }

    static function create($details = [])
    {
        global $db;
        $smt = "INSERT INTO User(fullname, email, `password`) VALUES (?, ?, ?)";

        $query = $db->prepare($smt);
        if (!$query) {
            die("Prepare failed: (" . $db->errno . ") " . $db->error);
        }
        $query->bind_param(
            'sss',
            $details['fullname'],
            $details['email'],
            $details['password']
        );

        if ($query->execute()) {
            return true;
        } else {
            echo "error: " . $query->error;
        }
    }
}
