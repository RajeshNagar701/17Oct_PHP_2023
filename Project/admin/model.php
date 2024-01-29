<?php



class model{

	public $conn="";
	function __construct()
	{
		$this->conn=new mysqli('localhost','root','','shop1');
	}	
	
	function select($tbl)
	{
		$sel="select * from $tbl"; // query
		$res=$this->conn->query($sel);  // run on db
		while($fetch=$res->fetch_object())
		{
			$arr[]=$fetch;
		}
		return $arr;
	}
	
	function insert($tbl,$arr)
	{
		$arr_col=array_keys($arr); // array("0"=>"name","1"=>"img");
		$col=implode(",",$arr_col);	// name,img    // arr to string
		
		$arr_value=array_values($arr); // array("0"=>"name","1"=>"img");
		$value=implode("','",$arr_value);	//'raj','falana.jpg'     // arr to string
		
		$ins="insert into $tbl($col) value('$value')";
		$res=$this->conn->query($ins);
		return $res;
		
	}
	
	
	// login / fetch select where 
	function select_where($tbl,$where)
	{
		$arr_col=array_keys($where); // array("0"=>"name","1"=>"img");
	
		$arr_value=array_values($where); // array("0"=>"name","1"=>"img");
		
		$sel="select * from $tbl where 1=1"; // query continue
		$i=0;
		foreach($where as $w)
		{
			echo $sel.=" and $arr_col[$i]='$arr_value[$i]'";
			$i++;
		}
		$res=$this->conn->query($sel);
		return $res;
	}
	
	// delete where 
	function delete_where($tbl,$where)
	{
		$arr_col=array_keys($where); // array("0"=>"name","1"=>"img");
		$arr_value=array_values($where); // array("0"=>"name","1"=>"img");
		
		$sel="delete from $tbl where 1=1"; // query continue
		$i=0;
		foreach($where as $w)
		{
			echo $sel.=" and $arr_col[$i]='$arr_value[$i]'";
			$i++;
		}
		$res=$this->conn->query($sel);
		return $res;
	}
	
	function update_where($tbl,$data,$where)
	{
		$arr_col=array_keys($data); // array("0"=>"name","1"=>"img");
		$arr_value=array_values($data); // array("0"=>"name","1"=>"img");
		
		$upd="update $tbl set "; // query continue
		$i=0;
		
		$total_upd=count($data);
		foreach($data as $w)
		{
			if($total_upd==$i+1)
			{
				$upd.=" $arr_col[$i]='$arr_value[$i]'";
			}
			else
			{
				$upd.=" $arr_col[$i]='$arr_value[$i]',";
				$i++;
			}
		}
		$warr_col=array_keys($where);
		$warr_value=array_values($where);
		
		$upd.="where 1=1"; // query continue
		$j=0;
		foreach($where as $w)
		{
			echo $upd.=" and $warr_col[$j]='$warr_value[$j]'";
			$j++;
		}
		$res=$this->conn->query($upd);
		return $res;
	}
	
}
$obj=new model;




?>