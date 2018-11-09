<?php
    include('includes/connect.php');
    header('Content-type: text/xml');

       echo '<?xml version="1.0" encoding="UTF-8"?>
       <!DOCTYPE VAST [
       <!ATTLIST Ad    id    ID     #IMPLIED>
       <!ELEMENT MediaFiles (#PCDATA)>
       <!ELEMENT MediaFile (#PCDATA)>
       <!ELEMENT URL (#PCDATA)>
       ]>
       <VAST version="2.0" >';

       $data = mysqli_query($con,"SELECT * FROM ads");
       $adIndex = '0';
       while ($row = mysqli_fetch_array($data)){
       
       echo '<Ad id="mid-roll-'.$adIndex.'">
        		<InLine>
				<AdSystem>2.0</AdSystem>
				<AdTitle>Sample</AdTitle>
				<Impression></Impression>
				<Creatives>
				<Creative sequence="1" id="2" >
				<Linear>
				<Duration>00:02:00</Duration>
				<AdParameters>
				</AdParameters>
				<MediaFiles>
				<MediaFile delivery="progressive" bitrate="400" type="video/mp4">
				<URL>../inflightapp/storage/app/public/ad_videos/'.$row['ad_video'].'</URL>
				</MediaFile>
				</MediaFiles>
				</Linear>
				</Creative>
				</Creatives>
				</InLine>
				</Ad>';
       $adIndex++;
    } 
    echo '</VAST>';

?>