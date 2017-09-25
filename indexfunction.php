<?php 

include("adminpanel/connection.php");

function announcement(){




		$query = "select * from tb_announcements";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$anid = $row[0];
		$what = $row[1];
		$w_hen = $row[2];
		$w_here  = $row[3];
		$photo  = $row[4];
		
		
		

		echo '<div id="panel">';
		 echo $what; 
	
		  echo '<a href="viewannounce.php?ann=<?php echo $anid;?>" id="view">view</a>';

		 echo '<br>';

		 echo '</div>';

	}


}


function event(){




		$query = "select * from tb_events";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$eid = $row[0];
		$event_what = $row[1];
		$event_when = $row[2];
		$event_where  = $row[3];
		$event_photo  = $row[4];
		
		
		

		echo '<div id="panel">';
		 echo $event_what; 
		    echo '<a href="#" id="view">view</a>';
		 echo '<br>';

		 echo '</div>';

	}


}




function news(){




		$query = "select * from tb_news";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$nid = $row[0];
		$news_title = $row[1];
		$news_date_time = $row[2];
		$news_reporter  = $row[3];
		$news_content  = $row[4];
		$news_photo  = $row[5];
		
		
		

		echo '<div id="panel">';
		 echo $news_title; 
		   echo '<a href="#" id="view">view</a>';
		 echo '<br>';

		 echo '</div>';

	}


}


function administrators() {


		$query = "select * from tb_administrators";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$aid = $row[0];
		$firstname = $row[1];
		$middlename = $row[2];
		$lastname  = $row[3];
		$position  = $row[4];
		$otherinfo  = $row[5];
		$picture  = $row[6];
		
		
		

		echo '<div id="admins">';
		echo'<b>';
		echo '<a href="admininfo.php?administrator="'echo $aid;' id="names">';
		 echo $firstname;
		 echo '&nbsp;'; 
		 echo $middlename; 
		 echo '&nbsp;'; 
		 echo $lastname; 
		 echo '&nbsp;'; 
		 echo'</b>';
		 echo '</a>';
		 echo '<br>';
		 echo '<div id="pos">';
		 echo $position;
		 echo '</div>';
		
		echo '</div>';
	}


}
?>