<?php
session_start();

class PDO_ extends PDO
{
    public $dsn = 'mysql:host=localhost;dbname=a0343562_azamat_practical';
    public $user = 'a0343562_azamat_practical';
    public $pass = '3ASjX2ud';

    /**
     * PDO constructor.
     */
    public function __construct()
    {
        try {
            parent::__construct($this->dsn, $this->user, $this->pass);

        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();

        }
    }

    function SignUp($mail, $password, $name)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->prepare("INSERT INTO `user` (`mail`,`name`, `password`,`root`) VALUES (:mail,:name,:password,'user')");
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);

        $query->execute();
    }

    function getUserMail($mail)
    {
        $query = $this->prepare("SELECT mail FROM user WHERE mail=:mail");
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);

    }


    function getToken($mail)
    {
        $query = $this->prepare("SELECT mail, password FROM user WHERE mail=:mail");
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if ($row != null) {
            return $row['password'];
        } else return "";
    }

    function getUserPass($password, $token)
    {

        return password_verify($password, $token);
    }

    function checkUserPass($mail, $password)
    {

        return $this->getUserPass($password, $this->getToken($mail));
    }

    function logIn($mail, $password)
    {
        session_start();

        if (!isset($_SESSION['mail']) && !isset($_SESSION['password'])) {
            if ($this->checkUserPass($mail, $password) == true) {
                if ($this->admin_verify($mail) == "admin") {
                    $_SESSION['mail'] = $mail;
                    $_SESSION['root'] = $this->admin_verify($mail)['root'];
                } else {
                    $_SESSION['id_user'] = $this->getUserId($mail)['id_user'];
                    var_dump($this->getUserId($mail)['id_user']);
                    $_SESSION['name'] = $this->getUserName($mail)['name'];
                    $_SESSION['mail'] = $mail;
                    $_SESSION['root'] = $this->admin_verify($mail)['root'];
                }
            } else return false;
        } else return true;
    }

    function admin_verify($mail)
    {
        $query = $this->prepare("SELECT root FROM user WHERE mail=:mail");
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function getUserName($mail)
    {
        $query = $this->prepare("SELECT name FROM user WHERE mail=:mail");
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function getUserId($mail)
    {
        $query = $this->prepare("SELECT id_user FROM user WHERE mail=:mail");
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function logOut()
    {
        session_start();
        unset($_SESSION['id_user']);
        unset($_SESSION['name']);
        unset($_SESSION['mail']);
        unset($_SESSION['root']);
    }

    function addCourses($title, $description, $full_description, $date_courses, $price)
    {
        $query = $this->prepare("INSERT INTO `courses`(`title`,`description`,`full_description`, `date_courses`, `price` ) VALUES (:title,:description,:full_description,:date_courses,:price)");
        $query->bindParam(':full_description', $full_description, PDO::PARAM_STR);
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':date_courses', $date_courses, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_STR);
        $query->execute();
    }

    function deleteCourses($id_courses)
    {
        $query = $this->prepare("DELETE FROM `courses` WHERE id_courses=:id_courses");
        $query->bindParam(':id_courses', $id_courses, PDO::PARAM_STR);
        $query->execute();
    }
    function UnsaleCourse($id_courses)
    {
        $query = $this->prepare("DELETE FROM `sale` WHERE id_courses=:id_courses AND id_user=:id_user");
        $query->bindParam(':id_courses', $id_courses, PDO::PARAM_STR);
        $query->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
        $query->execute();
    }


    function checkUserSale($id_user,$id_courses){


        $query = $this->prepare("SELECT `id_user`,`id_courses` FROM `sale` WHERE `id_courses`=:id_courses AND `id_user`=:id_user");
        $query->bindParam(':id_courses', $id_courses, PDO::PARAM_INT);
        $query->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
        $query->execute();
        $row= $query->fetch(PDO::FETCH_ASSOC);
        if(($id_user==$row['id_user'])&&($id_courses==$row['id_courses'])){
            return false;
        }else{
            return true;
        }
    }

    function getCourse($id_courses)
    {
        $query = $this->prepare("SELECT * FROM `courses` WHERE `id_courses`=:id_courses");
        $query->bindParam(':id_courses', $id_courses, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function getCourses()
    {
        $query = $this->prepare("SELECT * FROM `courses` ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getCourseName()
    {
        $query = $this->prepare("SELECT courses.id_courses,courses.date_courses,courses.title,sale.id_user FROM sale INNER JOIN courses WHERE sale.id_user=:id_user AND sale.id_courses = courses.id_courses");
        $query->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getCourses_main()
    {
        $query = $this->prepare("SELECT `id_courses`,`title`,`description` FROM `courses` ORDER BY `id_courses` DESC LIMIT 3  ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function saleCourses($id_courses)
    {
        $query = $this->prepare("INSERT INTO `sale`(`id_user`, `id_courses`) VALUES (:id_user,:id_courses)");
        $query->bindParam(':id_courses', $id_courses, PDO::PARAM_STR);
        $query->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_STR);
        $query->execute();
    }

    function getUser()
    {

        $query = $this->prepare("SELECT name FROM user WHERE `id_user`=:id_user");
        $query->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);

    }

    function getAllId()
    {
        $query = $this->prepare("SELECT id_courses FROM `courses` ");
        $query->bindParam(':id_courses', $id_courses, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
