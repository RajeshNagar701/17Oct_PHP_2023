<?php

include_once('../admin/model.php');  // load model


class control extends model{  // extends model class

	function __construct()
	{
		session_start();
		
		model::__construct();    // db connectivity ke liye call model __construct
		
		$url=$_SERVER['PATH_INFO'];
		
		switch($url)
		{
			case '/index':
			include_once('index.php');
			break;
			
			case '/about':
			include_once('about.php');
			break;
			
			case '/classes':
			include_once('classes.php');
			break;
			
			case '/home':
			include_once('index.php');
			break;
			
			case '/facility':
			include_once('facility.php');
			break;
			
			case '/team':
			include_once('team.php');
			break;
			
			case '/call-to-action':
			include_once('call-to-action.php');
			break;
			
			case '/appointment':
			include_once('appointment.php');
			break;
			
			case '/testimonial':
			include_once('testimonial.php');
			break;
			
		
			case '/contact':
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['name'];
				$email=$_REQUEST['email'];
				$comment=$_REQUEST['comment'];
				
				$arr=array("name"=>$name,"email"=>$email,"comment"=>$comment);
				
				$res=$this->insert('inquiry',$arr);
				if($res)
				{
					echo "<script>
					alert('Contact success');
					window.location='contact';
					</script>";
				}
			}
			include_once('contact.php');
			break;
			
			case '/login':
			
			if(isset($_REQUEST['login']))
			{
				$email=$_REQUEST['email'];
				$password=md5($_REQUEST['password']); // enc pass
				
				$where=array("email"=>$email,"password"=>$password);
				
				$res=$this->select_where('customers',$where);
				$chk=$res->num_rows;
				if($chk==1)  // 1 means true
				{
					
					// fetch data
					$fetch=$res->fetch_object();
					
					if($fetch->status=="Unblock")
					{
						// create session	
						$_SESSION['userid']=$fetch->uid;
						$_SESSION['useremail']=$fetch->email;
						$_SESSION['username']=$fetch->name;
						
						echo "<script>
						alert('Login success');
						window.location='index';
						</script>";
					}
					else
					{
							echo "<script>
							alert('Account Blocked');
							window.location='login';
							</script>";
					}
				}
				else
				{
					echo "<script>
					alert('Login Failed');
					window.location='login';
					</script>";
				}
			}
			include_once('login.php');
			break;
			
			
			case '/profile':
			
				
			$where=array("uid"=>$_SESSION['userid']);
			
			$res=$this->select_where('customers',$where);
			$fetch=$res->fetch_object();
	
			include_once('profile.php');
			
			
			break;
			
			case '/edit_user':
			$arr_cuuntries=$this->select('cuuntries');
			if(isset($_REQUEST['edit_uid']))
			{
				$uid=$_REQUEST['edit_uid'];
				$where=array("uid"=>$uid);
			
				$res=$this->select_where('customers',$where);
				$fetch=$res->fetch_object();
				$old_img=$fetch->img;
				
				if(isset($_REQUEST['save']))
				{
					$name=$_REQUEST['name'];
					$email=$_REQUEST['email'];
					$gender=$_REQUEST['gender'];
					
					$hobby_arr=$_REQUEST['hobby'];  // get hobby in arr format
					$hobby=implode(',',$hobby_arr);
					
					$cid=$_REQUEST['cid'];
					
					if($_FILES['img']['size']>0)
					{
						$img=$_FILES['img']['name']; 
						$path='img/customer/'.$img;
						$tmp_img=$_FILES['img']['tmp_name']; 
						move_uploaded_file($tmp_img,$path);
					
						$data=array("name"=>$name,"email"=>$email,"gender"=>$gender,"hobby"=>$hobby,"cid"=>$cid,"img"=>$img);
						$res=$this->update_where('customers',$data,$where);
						if($res)
						{
							unlink('img/customer/'.$old_img);
							echo "<script>
							alert('Update success');
							window.location='profile';
							</script>";
						}
					}
					else
					{
						$data=array("name"=>$name,"email"=>$email,"gender"=>$gender,"hobby"=>$hobby,"cid"=>$cid);
						$res=$this->update_where('customers',$data,$where);
						if($res)
						{
							echo "<script>
							alert('Update success');
							window.location='profile';
							</script>";
						}
					}
				}
			}
			include_once('edit_user.php');
			break;
			
			case '/logout':
			
			unset($_SESSION['userid']);
			unset($_SESSION['useremail']);
			unset($_SESSION['username']);
			
			echo "<script>
			alert('Logout success');
			window.location='index';
			</script>";
			
			break;
			
			
			case '/signup':
			$arr_cuuntries=$this->select('cuuntries');
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['name'];
				$email=$_REQUEST['email'];
				$password=md5($_REQUEST['password']); // enc pass
				$gender=$_REQUEST['gender'];
				
				$hobby_arr=$_REQUEST['hobby'];  // get hobby in arr format
				$hobby=implode(',',$hobby_arr);
				
				$cid=$_REQUEST['cid'];
				
				
				$img=$_FILES['img']['name']; 
				
				$path='img/customer/'.$img;
				$tmp_img=$_FILES['img']['tmp_name']; 
				move_uploaded_file($tmp_img,$path);
				
				$arr=array("name"=>$name,"email"=>$email,"password"=>$password,"gender"=>$gender,"hobby"=>$hobby,"cid"=>$cid,"img"=>$img);
				
				$res=$this->insert('customers',$arr);
				if($res)
				{
					echo "<script>
					alert('Register success');
					window.location='signup';
					</script>";
				}
				else
				{
					echo "Not suucess";
				}	
				
			}
			include_once('signup.php');
			break;
			
			default:
			include_once('404.php');
			break;
			
		}
		
		
	}	
	
}
$obj=new control;




?>