<?php
include_once('model.php'); // step 1 load model 

class control extends model{  // extends model in control

	function __construct()
	{
		session_start();
		
		$url=$_SERVER['PATH_INFO'];
		
		model::__construct(); // call modell __construct for data connectivity
		
		switch($url)
		{
			case '/admin':
			
			if(isset($_REQUEST['adminlogin']))
			{
				$email=$_REQUEST['email'];
				$password=$_REQUEST['password'];
				
				$epassword=md5($password); // enc pass
				
				$where=array("email"=>$email,"password"=>$epassword);
				
				$res=$this->select_where('admins',$where);
				$chk=$res->num_rows;
				if($chk==1)  // 1 means true
				{
					
					// cookie create 
					if(isset($_REQUEST['rem']))
					{
						setcookie('ac_email',$email,time()+3600);
						setcookie('ac_password',$password,time()+3600);
					}
					
					
					// fetch data
					$fetch=$res->fetch_object();
					// create session	
					$_SESSION['adminid']=$fetch->aid;
					$_SESSION['adminemail']=$fetch->email;
					$_SESSION['adminname']=$fetch->name;
					
					echo "<script>
					alert('Login success');
					window.location='dashboard';
					</script>";
				}
				else
				{
					echo "<script>
					alert('Login Failed');
					window.location='admin';
					</script>";
				}
			}
			include_once('index.php');
			break;
			
			case '/adminlogout':
			
			unset($_SESSION['adminid']);
			unset($_SESSION['adminemail']);
			unset($_SESSION['adminname']);
			
			echo "<script>
			alert('Logout success');
			window.location='admin';
			</script>";
			
			break;
			
			case '/dashboard':
			include_once('dashboard.php');
			break;
			
			case '/add_categories':
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['name'];
				$img=$_FILES['img']['name'];  // get only input type="file"
				
				$path="assets/img/categories/".$img; // path set
				$temp_file1=$_FILES['img']['tmp_name'];
				move_uploaded_file($temp_file1,$path);
				
				$data=array("name"=>$name,"img"=>$img);
				
				$res=$this->insert('categories',$data);
				if($res)
				{
					echo "<script>
						alert('Categories add success');
						window.location='add_categories';
					</script>";
				}
			}
			include_once('add_categories.php');
			break;
			
			case '/manage_categories':
			$arr_categories=$this->select('categories');
			include_once('manage_categories.php');
			break;
			
			case '/add_product':
			include_once('add_product.php');
			break;
			
			case '/manage_product':
			$product_arr=$this->select('product');
			include_once('manage_product.php');
			break;
			
			case '/add_employee':
			include_once('add_employee.php');
			break;
			
			case '/manage_employee':
			$employees_arr=$this->select('employees');
			include_once('manage_employee.php');
			break;
			
			case '/manage_user':
			$customers_arr=$this->select('customers');
			include_once('manage_user.php');
			break;
			
		
			case '/manage_inquiry':
			$inquiry_arr=$this->select('inquiry');
			include_once('manage_inquiry.php');
			break;
			
			case '/manage_order':
			include_once('manage_order.php');
			break;
			
			case '/delete':
			if(isset($_REQUEST['del_iid']))
			{
				$iid=$_REQUEST['del_iid'];
				$where=array('iid'=>$iid,);
				$res=$this->delete_where('inquiry',$where);
				if($res)
				{
					echo "<script>
						alert('Inquiry Delete success');
						window.location='manage_inquiry';
					</script>";
				}
			}
			
			if(isset($_REQUEST['del_cate_id']))
			{
				$cate_id=$_REQUEST['del_cate_id'];
				$where=array('cate_id'=>$cate_id);
				
				// fetch del image
				$ans=$this->select_where('customers',$where);
				$fetch=$ans->fetch_object();
				$img=$fetch->img;
			
				$res=$this->delete_where('categories',$where);
				if($res)
				{
					unlink('assets/img/categories/'.$img); // delete img from folder
					echo "<script>
						alert('categories Delete success');
						window.location='manage_categories';
					</script>";
				}
			}
			if(isset($_REQUEST['del_emp_id']))
			{
				$emp_id=$_REQUEST['del_emp_id'];
				$where=array('emp_id'=>$emp_id);
				$res=$this->delete_where('employees',$where);
				if($res)
				{
					echo "<script>
						alert('employees Delete success');
						window.location='manage_employee';
					</script>";
				}
			}
			
			if(isset($_REQUEST['del_uid']))
			{
				$uid=$_REQUEST['del_uid'];
				$where=array('uid'=>$uid);
				
				// fetch del image
				$ans=$this->select_where('customers',$where);
				$fetch=$ans->fetch_object();
				$img=$fetch->img;
				
				$res=$this->delete_where('customers',$where);
				if($res)
				{
					unlink('../website/img/customer/'.$img); // delete img from folder
					echo "<script>
						alert('customers Delete success');
						window.location='manage_user';
					</script>";
				}
			}
			
			break;
			
			
			case '/status':
			
			if(isset($_REQUEST['status_uid']))
			{
				$uid=$_REQUEST['status_uid'];
				$where=array('uid'=>$uid);
				
				// fetch del image
				$ans=$this->select_where('customers',$where);
				$fetch=$ans->fetch_object();
				$status=$fetch->status;
				if($status=="Block")
				{
					$data=array("status"=>"Unblock");
					$res=$this->update_where('customers',$data,$where);
					if($res)
					{
						echo "<script>
							alert(' Unblock success');
							window.location='manage_user';
						</script>";
					}
				}
				else
				{
					$data=array("status"=>"Block");
					$res=$this->update_where('customers',$data,$where);
					if($res)
					{
						echo "<script>
							alert(' Block success');
							window.location='manage_user';
						</script>";
					}
				}
				
			}
			
			break;
			
			
			default:
			include_once('404.php');
			break;
			
		}
		
		
	}	
	
}
$obj=new control;




?>