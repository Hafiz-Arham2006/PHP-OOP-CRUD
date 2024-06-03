<?php

use FTP\Connection;

    class Datbase{
        public $conn;
        function Connection(){
            $this->conn=mysqli_connect("localhost","root","","oop_crud");
        }
            function Insert($f_name,$u_name,$email,$pass,$img){
                $sql="INSERT INTO `oop_tbl`(`f_name`, `u_name`, `email`, `pass`, `img`) VALUES ('$f_name','$u_name','$email','$pass','$img')";
                $ans=mysqli_query($this->conn,$sql);
            }
            function Show_Record(){
                $sql="SELECT * FROM oop_tbl";
                $ans=mysqli_query($this->conn,$sql);
                return $ans;
            }
            function Select_Record($id){
                $sql="SELECT * FROM oop_tbl WHERE id='$id'";
                $ans=mysqli_query($this->conn,$sql);
                return $ans;
            }
            function Update($id,$f_name,$u_name,$email,$pass,$img){
                $sql="UPDATE `oop_tbl` SET `f_name`='$f_name',`u_name`='$u_name',`email`='$email',`pass`='$pass',`img`='$img' WHERE id='$id'";
                $ans=mysqli_query($this->conn,$sql);
            }
                function Delete($id){
                    $sql="DELETE FROM oop_tbl WHERE id='$id'";
                    $ans=mysqli_query($this->conn,$sql);
                }
                function Search($search){
                    $sql="SELECT * FROM oop_tbl WHERE `id` like '$search' OR `f_name`like '$search%' OR `u_name` like '$search'";
                    $ans=mysqli_query($this->conn,$sql);
                    return $ans;
                }
                function Del_all(){
                    $sql="TRUNCATE TABLE oop_tbl";
                    $ans=mysqli_query($this->conn,$sql);
                }

    }
$obj= new Datbase();
$obj->Connection();




?>