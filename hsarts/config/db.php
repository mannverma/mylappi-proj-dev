<?php
class db
{
	private $host = "localhost";
	private $dbname = "hsarts";
	private $user = "root";
	private $pass = "";
	private $pdo = "";
	public $site_title = "";
	public function __construct()
	{
		$this->site_title = "HS Art Works";
		try
		{
			$this->pdo = new PDO("mysql:host=".$this->host."; dbname=".$this->dbname,$this->user,$this->pass);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			exit(0);
		}
	}
	public function getPage($page)
	{
		$query = $this->pdo->prepare("select * from pages where page_name=?");
		$query->execute(array($page));
		return $query->fetch();
	}
	public function getCatsList()
	{
		$query = $this->pdo->prepare("select * from category order by id");
		$query->execute();
		return $query->fetchAll();
	}
	public function getCategoryById($id)
	{
		$query = $this->pdo->prepare("select * from category where id=?");
		$query->execute(array($id));
		return $query->fetch();
	}
	public function getCategoryByName($name)
	{
		$query = $this->pdo->prepare("select * from category where lower(name)=?");
		$query->execute(array(strtolower($name)));
		return $query->fetch();
	}
	
	public function getHomeProducts()
	{
		$count = 0;
		$query = $this->pdo->prepare("select * from category order by id");
		$query->execute();
		$rs = $query->fetchAll();
		foreach($rs as $row)
		{
			$query2 = $this->pdo->prepare("select * from products where cid=?");
			$query2->execute(array($row['id']));
			
			if($query2->rowCount()>=1)
			{
				$rset[] = $query2->fetch();
				$count++;
			}
			if($count == 4)
			{
				break;
			}
		}

		return $rset;
	}
	public function getProductsByCatID($id)
	{
		$query = $this->pdo->prepare("select * from products where cid=?");
		$query->execute(array($id));
		return $query->fetchAll();
	}
	public function getProductByName($name)
	{
		$query = $this->pdo->prepare("select * from products where name=:name");
		$query->bindParam(":name", $name, PDO::PARAM_STR);
		$query->execute();
		return $query->fetch();
	}
}
$db = new db();
?>