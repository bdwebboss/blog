<?php

    Class blog{
        private $connection;

        public function __construct()
        {
            #database host, database user, database pass, database name
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = "";
            $dbname = 'blogsite';

            $this->connection= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
            
            if(!$this->connection){
                die("Database Connection Error!!");
            }
        }

        public function adminLogin($admin_info){
            $ad_mail = $admin_info['admin_email'];
            $ad_pass = md5($admin_info['admin_pass']);


            $ad_log_in_query = "SELECT * FROM admin_info where ad_email = '$ad_mail' && ad_pass = '$ad_pass'";
            if(mysqli_query($this->connection, $ad_log_in_query)){
                $loginInfo = mysqli_query($this->connection, $ad_log_in_query);

                if($loginInfo){
                header('location: dashboard.php');
                $admin_data = mysqli_fetch_assoc($loginInfo);
                session_start();
                $_SESSION['adminID'] = $admin_data['Id'];
                $_SESSION['adminName'] = $admin_data['ad_user'];
                }

            }

        }

        public function adminLogout(){
            unset($_SESSION['adminID']);
            unset($_SESSION['adminName']);
            header('location: index.php');
        }

        public function addpost($cat){
        $cat_name = $cat['cat_name'];
        $cat_des = $cat['cat_des'];
        

        $cat_Query = "INSERT INTO category(cat_name, cat_des) VALUES('$cat_name', '$cat_des')";

        if(mysqli_query($this->connection, $cat_Query)){
            return "category added successfully";
        }
    }

    }

?> 