<?php

    $class = new Dataclass();
    if(isset($_GET['q'])){
        $class->$_GET['q']();
    }
    class Dataclass {
        
        function __construct(){
            if(!isset($_SESSION['id'])){
               header('location:../../');   
            }
        }
        
        //create logs
        function logs($act){            
            $date = date('m-d-Y h:i:s A');
            echo $q = "insert into log values(null,'$date','$act')";   
            mysql_query($q);
            return true;
        }
        
        //get all class info
        function getclass($search){
            $q = "select * from tb_class where grade_level like '%$search%'  or section like '%$search%' or grading_period like '%$search%' or subject like '%$search%' order by grade_level,section,grading_period asc";
            $r = mysql_query($q);
            
            return $r;
        }
        
        //get class by ID
        function getclassbyid($id){
            $q = "select * from tb_class where id=$id";
            $r = mysql_query($q);
            
            return $r;
        }
        //add class
        function addclass(){
            include('../../connection.php');
            $grade_level = $_POST['grade_level'];
            $year = $_POST['year'];
            $section = $_POST['section'];
            $grading_period = $_POST['grading_period'];
            $subject = $_POST['subject'];
            $sy = $_POST['sy'];
            
            echo $q = "insert into tb_class values('','$grade_level','$year','$section','$grading_period','','$subject','$sy')";
            mysql_query($q);
            $act = "create new class $course $year - $section with the subject of $subject";
            $this->logs($act);
            header('location:../addclass.php?r=added');
        }
        
        //update class
        function updateclass(){
            include('../../connection.php');
            $id = $_GET['id'];
            $grade_level = $_POST['grade_level'];
            $section = $_POST['section'];
            $grading_period = $_POST['grading_period'];
            $subject = $_POST['subject'];
            $sy = $_POST['sy'];
            
            echo $q = "update tb_class set grade_level='$grade_level',section='$section', grading_period='$grading_period', subject='$subject', sy='$sy' where id=$id";
            mysql_query($q);
            $act = "update tb_class $grade_level $year - $section with the subject of $subject";
            $this->logs($act);
            header('location:../addclass.php?r=updated');
        }
        
        //get all students in that class
        function getstudentsubject(){ 
            $classid = $_GET['classid'];
            $q = "select * from tb_studentsubject where classid=$classid";
            $r = mysql_query($q);
            $result = array();
            while($row = mysql_fetch_array($r)){
                $q2 = 'select * from tb_student where id='.$row['student_no'].'';
                $r2 = mysql_query($q2);
                $result[] = mysql_fetch_array($r2);
            }
            return $result;
        }
        
        //add student to class
        function addstudent(){
            include('../../connection.php');  
            $classid = $_GET['classid'];
            $student_no = $_GET['student_no'];
            $verify = $this->verifystudent($student_no,$classid);
            if($verify){
                echo $q = "INSERT INTO tb_studentsubject (student_no,classid) VALUES ('$student_no', '$classid');";
                mysql_query($q);
                header('location:../classstudent.php?r=success&classid='.$classid.'');
            }else{
                header('location:../classstudent.php?r=duplicate&classid='.$classid.'');
            }
            
            $tmp = mysql_query("select * from tb_class where id=$classid");
            $tmp_row = mysql_fetch_array($tmp);
            $tmp_subject = $tmp_row['subject'];
            $tmp_class = $tmp_row['grade_level'].' '.$tmp_row['year'].'-'.$tmp_row['section'];
            
            $tmp = mysql_query("select * from tb_students where id=$student_no");
            $tmp_row = mysql_fetch_array($tmp);
            $tmp_student = $tmp_row['fname'].' '.$tmp_row['lname'];
            
            $act = "add student $tmp_student to class $tmp_class with the subject of $tmp_subject";
            $this->logs($act);
        }
        //verify if he/she is enrolled
        function verifystudent($student_no,$classid){
            include('../../connection.php');  
            $q = "select * from tb_studentsubject where student_no=$student_no and classid=$classid";
            $r = mysql_query($q);
            if(mysql_num_rows($r) < 1){
                return true;
            }else{
                return false;   
            }
        }
        //remove student to the class
        function removestudent(){
            $classid = $_GET['classid'];
            $student_no = $_GET['student_no'];
            include('../../connection.php');  
            $q = "delete from tb_studentsubject where student_no=$student_no and classid=$classid";
            mysql_query($q);
            
            $tmp = mysql_query("select * from tb_class where id=$classid");
            $tmp_row = mysql_fetch_array($tmp);
            $tmp_subject = $tmp_row['subject'];
            $tmp_tb_class = $tmp_row['grade_level'].' '.$tmp_row['year'].'-'.$tmp_row['section'];
            
            $tmp = mysql_query("select * from tb_students where student_no=$student_no");
            $tmp_row = mysql_fetch_array($tmp);
            $tmp_tb_students = $tmp_row['fname'].' '.$tmp_row['lname'];
            
            $act = "remove tb_students $tmp_tb_students from class $tmp_class with the subject of $tmp_subject";
            $this->logs($act);
            
            header('location:../classstudent.php?r=success&classid='.$classid.'');
        }
        
        //update teacher
        function updateteacher(){
            $classid = $_GET['classid'];
            $teachid = $_GET['teachid'];
            include('../../connection.php'); 
            $q = "update tb_class set tb_teacher=$teachid where id=$classid";
            mysql_query($q);
            
            $tmp = mysql_query("select * from tb_class where id=$classid");
            $tmp_row = mysql_fetch_array($tmp);
            $tmp_tb_subject = $tmp_row['subject'];
            $tmp_tb_class = $tmp_row['grade_level'].' '.$tmp_row['year'].'-'.$tmp_row['section'];
            
            $tmp = mysql_query("select * from tb_teacher where id=$teachid");
            $tmp_row = mysql_fetch_array($tmp);
            $tmp_tb_teacher = $tmp_row['fname'].' '.$tmp_row['lname'];
            
            $act = "assign teacher $tmp_tb_teacher to tb_class $tmp_class with the subject of $tmp_subject";
            $this->logs($act);
            
            header('location:../classteacher.php?classid='.$classid.'&teacherid='.$teachid.'');
        }
        
    }
?>