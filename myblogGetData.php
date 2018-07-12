<?php
class Post{
	public $postno = 0;
	public $poster = "";
	public $message = "";
	public $time = "";
	public $likes = "";
	public function __construct($postno, $poster, $message, $time, $likes) {
                $this->postno = $postno;
                $this->poster = $poster;
                $this->message = $message;
                $this->time = $time;
                $this->likes = $likes;
        }
}
	$start = $_GET["start"];
	$yo = $start+3;
	$con = mysqli_connect("localhost:3306", "root", "", "blog");
	if($con)
	{
		//echo "Connected to DB";
		$sql = "Select * from posts where postno >= $start and postno <= $yo";
		$result = $con->query($sql);
		$count = $start;
		$data = array();
		while($row = $result->fetch_assoc() )
		{
			$count -= 1;
			$temp = new Post($row["postno"], $row["poster"], $row["blogmessage"], $row["time"], $row["likes"]);
			array_push($data, $temp);

		}
		//echo $data[0]->postno;
		//
		echo json_encode($data);

	}
	else
	{
		echo "Jai Balayya";
	}
?>