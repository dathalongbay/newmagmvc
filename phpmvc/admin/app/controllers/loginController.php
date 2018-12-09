<?php
class loginController extends appController{

    public function __construct()
    {
        /**
         * Generate admin 1 first time
         */

        $adminModel = new adminModel();

        $admins = $adminModel->getRows();

        if (empty($admins)) {
            $data = array(
                'username' => 'datdo',
                'email' => 'dathalongbay@gmail.com',
                'password' => 'a12345678',
                'status' => 1
            );
            $adminModel->store($data);
        }


    }

    /**
     * phuong thuc de hien thi login view
     */
    public function indexAction() {

        if ( (isset($_COOKIE["member_login"]) && $_COOKIE["member_login"]) &&
            (isset($_COOKIE["member_password"]) && $_COOKIE["member_password"])) {
            $email = $_COOKIE['member_login'];
            $password = $_COOKIE['member_password'];

            $adminModel = new adminModel();

            $admin = $adminModel->getLogin($email, $password);

            if (isset($admin['username']) && isset($admin['email']) && isset($admin['password'])) {
                $_SESSION['login_user'] = $admin;

                $adminURL = ADMIN_URL . 'index.php?controller=index&action=index';

                header("Location: $adminURL");
                die;
            }


        }

        return $this->view('login', 'index', array());
    }

    /**
     * phuong thuc login
     */
    public function loginAction() {




        /**
         * Xu ly login sau do redirect ve dashboard
         */
        if ( (isset($_POST['Sign_In']) && ($_POST['Sign_In'] == 'Login')) &&
            (isset($_POST['email']) && ($_POST['email'])) &&
            (isset($_POST['password']) && ($_POST['password']))) {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $adminModel = new adminModel();

            $admin = $adminModel->getLogin($email, $password);

            if (isset($admin['username']) && isset($admin['email']) && isset($admin['password'])) {
                $_SESSION['login_user'] = $admin;

                if(isset($_POST['remember']) && !empty($_POST['remember'])) {
                    /**
                     * Session_id
                     */
                    setcookie ("member_login", $email, time()+ (1 * 24 * 60 * 60));
                    setcookie ("member_password", $password, time()+ (1 * 24 * 60 * 60));
                } else {
                    if(isset($_COOKIE["member_login"])) {
                        setcookie ("member_login","");
                    }
                    if(isset($_COOKIE["member_password"])) {
                        setcookie ("member_password","");
                    }
                }

                $adminURL = ADMIN_URL . 'index.php?controller=index&action=index';

                header("Location: $adminURL");
                die;
            }


        }

        $_SESSION['login_fail'] = 'Login fail. Invalid email or password';

        $loginURL = ADMIN_URL . 'index.php?controller=login&action=index';

        header("Location: $loginURL");
        die;
    }

    /**
     * phuong thuc logout
     */
    public function logoutAction() {

        /**
         * xu ly logout sau do redirect ve trang login
         */

        session_start();
        unset($_SESSION["login_user"]);

        if(isset($_COOKIE["member_login"])) {
            setcookie ("member_login","");
        }
        if(isset($_COOKIE["member_password"])) {
            setcookie ("member_password","");
        }

        $loginURL = ADMIN_URL . 'index.php?controller=login&action=index';

        header("Location: $loginURL");
        die;
    }


}