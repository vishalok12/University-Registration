<?php
	//session_start();
	require_once('auth.php');
?>
<HTML>
 <HEAD>
 <TITLE>Insert Form</TITLE>
 <link href="javascript/style.css" rel="stylesheet" type="text/css" />
 <style type="text/css">
<!--
.style2 {font-size: xx-small}
.style3 {font-size: medium}
-->
 </style>
 </HEAD>
 <BODY>
 <div class="container">
<ul id="saturday">
	<li><a href="member-index.php">HOME</a></li>
	<li><a href="member-profile.php?i=1" class="left" >PROFILE</a></li>
	<li><a href="forum/topiclist.php" class="left">FORUM</a></li>
	<li class="right"><a href="logout.php">LOGOUT</a></li>
</ul>

 <?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>
 <p align=center style="font-size: 20pt; color:blue">
      <u>
      Fill Up All Entries To Complete registration form
      </u>
      </p>
 <FORM ACTION="insert_exec.php" METHOD=POST>
     <font color=#867F7F size=4pt>Residential Address
     </font><br>
    <br>
    <br>
	
    <table width="200" border="2" align="center" bgcolor="#999966">
      <tr>
        <td><table width="437" height="342" border="0" align="center">
          <tr>
            <td width="230">Address *: </td>
            <td width="197"><textarea name="address" cols="25" rows="5" class="textfield"></textarea></td>
          </tr>
          <tr>
            <td>City *: </td>
            <td><select name=city>
                <option>Select One</option>
                <option value="Abu Road">Abu Road</option>
                <option value="Anantnag">Anantnag</option>
                <option value="Agartala">Agartala</option>
                <option value="Agra">Agra</option>
                <option value="Aizawl">Aizwal</option>
                <option value="Ajmer">Ajmer</option>
                <option value="Akola">Akola</option>
                <option value="Allahabad">Allahabad</option>
                <option value="Aligarh">Aligarh</option>
                <option value="Almora">Almora</option>
                <option value="Aluva">Aluva</option>
                <option value="Alapuzha">Alapuzha</option>
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Amritsar">Amritsar</option>
                <option value="Ambala">Ambala</option>
                <option value="Anand">Anand</option>
                <option value="Asansol">Asansol</option>
                <option value="Aurangabad">Aurangabad</option>
                <option value="Baddi">Baddi</option>
                <option value="Bahadurgarh">Bahadurgarh</option>
                <option value="Ballabgarh">Ballabgarh</option>
                <option value="Bangalore">Bangalore</option>
                <option value="Bareilly">Bareilly</option>
                <option value="Belgaum">Belgaum</option>
                <option value="Bhagalpur">Bhagalpur</option>
                <option value="Bharuch">Bharuch</option>
                <option value="Bhatinda">Bhatinda</option>
                <option value="Bhavnagar">Bhavnagar</option>
                <option value="Bhilai">Bhilai</option>
                <option value="Bhopal">Bhopal</option>
                <option value="Bhubaneshwar">Bhubaneshwar</option>
                <option value="Bhuj">Bhuj</option>
                <option value="Bijbehara">Bijbehara</option>
                <option value="Bijnore">Bijnore</option>
                <option value="Bilaspur">Bilaspur</option>
                <option value="Bikaner">Bikaner</option>
                <option value="Bokaro">Bokaro</option>
                <option value="Budayun">Budayun</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chandausi">Chandausi</option>
                <option value="Chengannur">Chengannur</option>
                <option value="Chennai">Chennai</option>
                <option value="Coimbatore">Coimbatore</option>
                <option value="Cuddapah">Cuddapah</option>
                <option value="Cuttack">Cuttack</option>
                <option value="Dadri">Dadri</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Darjeeling">Darjeeling</option>
                <option value="Davangere">Davangere</option>
                <option value="Dehradun">Dehradun</option>
                <option value="Dhanbad">Dhanbad</option>
                <option value="Dharwad">Dharwad</option>
                <option value="Dibrugarh">Dibrugarh</option>
                <option value="Dimapur">Dimapur</option>
                <option value="Dindugal">Dindugal</option>
                <option value="Durg">Durg</option>
                <option value="Durgapur">Durgapur</option>
                <option value="Erode">Erode</option>
                <option value="Faridabad">Faridabad</option>
                <option value="Ferozpur">Ferozpur</option>
                <option value="Firozabad">Firozabad</option>
                <option value="Gangtok">Gangtok</option>
                <option value="Ghandinagar">Ghandinagar</option>
                <option value="Ghaziabad">Ghaziabad</option>
                <option value="Gwalior">Gwalior</option>
                <option value="Gorakhpur">Gorakhpur</option>
                <option value="Gulbarga">Gulbarga</option>
                <option value="Guna">Guna</option>
                <option value="Guntur">Guntur</option>
                <option value="Gurgaon">Gurgaon</option>
                <option value="Guwahati">Guwahati</option>
                <option value="Haldwani">Haldwani</option>
                <option value="Haldia">Haldia</option>
                <option value="Hapur">Hapur</option>
                <option value="Haridwar">Haridwar</option>
                <option value="Hathras">Hathras</option>
                <option value="Hazira">Hazira</option>
                <option value="Hissar">Hissar</option>
                <option value="Hooghly">Hooghly</option>
                <option value="Hoshiarpur">Hoshiarpur</option>
                <option value="Howrah">Howrah</option>
                <option value="Hubli">Hubli</option>
                <option value="Hyderabad">Hyderabad</option>
                <option value="Imphal">Imphal</option>
                <option value="Indore">Indore</option>
                <option value="Jabalpur">Jabalpur</option>
                <option value="Jaipur">Jaipur</option>
                <option value="Jalandhar">Jalandhar</option>
                <option value="Jalgaon">Jalgaon</option>
                <option value="Jammu">Jammu</option>
                <option value="Jamnagar">Jamnagar</option>
                <option value="Jamshedpur">Jamshedpur</option>
                <option value="Jhansi">Jhansi</option>
                <option value="Jodhpur">Jodhpur</option>
                <option value="Jorhat">Jorhat</option>
                <option value="Kakinada">Kakinada</option>
                <option value="Kandla">Kandla</option>
                <option value="Kannur">Kannur</option>
                <option value="Kanpur">Kanpur</option>
                <option value="Karnal">Karnal</option>
                <option value="Katni">Katni</option>
                <option value="Kharagpur">Kharagpur</option>
                <option value="Kohima">Kohima</option>
                <option value="Kolhapur">Kolhapur</option>
                <option value="Kolkata">Kolkata</option>
                <option value="Kollam">Kollam</option>
                <option value="Kochi">Kochi</option>
                <option value="Kottayam">Kottayam</option>
                <option value="Kozhikode">Kozhikode</option>
                <option value="Kota">Kota</option>
                <option value="Kodaikanal">Kodaikanal</option>
                <option value="Kovilpatti">Kovilpatti</option>
                <option value="Kurnool">Kurnool</option>
                <option value="Lucknow">Lucknow</option>
                <option value="Ludhiana">Ludhiana</option>
                <option value="Madurai">Madurai</option>
                <option value="Mangalore">Mangalore</option>
                <option value="Manipal">Manipal</option>
                <option value="Mapusa">Mapusa</option>
                <option value="Margao">Margao</option>
                <option value="Mathura">Mathura</option>
                <option value="Meerut">Meerut</option>
                <option value="Mehsana">Mehsana</option>
                <option value="Mettupalyam">Mettupalyam</option>
                <option value="Mirzapur">Mirzapur</option>
                <option value="Moradabad">Moradabad</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Muzaffarnagar">Muzaffarnagar</option>
                <option value="Muzaffarpur">Muzaffarpur</option>
                <option value="Mysore">Mysore</option>
                <option value="Nadiad">Nadiad</option>
                <option value="Nagercoil">Nagercoil</option>
                <option value="Nagpur">Nagpur</option>
                <option value="Nainital">Nainital</option>
                <option value="Nashik">Nashik</option>
                <option value="Navsari">Navsari</option>
                <option value="Nazira">Nazira</option>
                <option value="Nellore">Nellore</option>
                <option value="Noida">Noida</option>
                <option value="New Delhi">New Delhi</option>
                <option value="Nizamabad">Nizamabad</option>
                <option value="Ooty">Ooty</option>
                <option value="Patiala">Patiala</option>
                <option value="Palakkad">Palakkad</option>
                <option value="Panchkula">Panchkula</option>
                <option value="Panipat">Panipat</option>
                <option value="Panjim">Panjim</option>
                <option value="Pathankot">Pathankot</option>
                <option value="Patiala">Patiala</option>
                <option value="Patna">Patna</option>
                <option value="Ponda">Ponda</option>
                <option value="Pondicherry">Pondicherry</option>
                <option value="Port Blair">Port Blair</option>
                <option value="Pune">Pune</option>
                <option value="Puri">Puri</option>
                <option value="Raigarh">Raigarh</option>
                <option value="Raipur">Raipur</option>
                <option value="Rajkot">Rajkot</option>
                <option value="Rajamundry">Rajamundry</option>
                <option value="Rajapalayam">Rajapalayam</option>
                <option value="Ranchi">Ranchi</option>
                <option value="Raniganj">Raniganj</option>
                <option value="Ranipet">Ranipet</option>
                <option value="Ratlam">Ratlam</option>
                <option value="Rewa">Rewa</option>
                <option value="Rishikesh">Rishikesh</option>
                <option value="Roorkee">Roorkee</option>
                <option value="Rourkela">Rourkela</option>
                <option value="Salem">Salem</option>
                <option value="Sangor">Sangor</option>
                <option value="Saranpur">Saranpur</option>
                <option value="Satna">Satna</option>
                <option value="Secunderabad">Secunderabad</option>
                <option value="Shahjahanpur">Shahjahanpur</option>
                <option value="Shillong">Shillong</option>
                <option value="Shimla">Shimla</option>
                <option value="Shimoga">Shimoga</option>
                <option value="Sibsagar">Sibsagar</option>
                <option value="Silchar">Silchar</option>
                <option value="Siliguri">Siliguri</option>
                <option value="Silvasa">Silvasa</option>
                <option value="Sivakasi">Sivakasi</option>
                <option value="Srinagar">Srinagar</option>
                <option value="Surat">Surat</option>
                <option value="Thane">Thane</option>
                <option value="Thanjavur">Thanjavur</option>
                <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                <option value="Trissur">Trissur</option>
                <option value="Tiruchchirapalli">Tiruchchirapalli</option>
                <option value="Tirunelveli">Tirunelveli</option>
                <option value="Tirupati">Tirupati</option>
                <option value="Tiruppur">Tiruppur</option>
                <option value="Tiruvalla">Tiruvalla</option>
                <option value="Tumkur">Tumkur</option>
                <option value="Tuticorin">Tuticorin</option>
                <option value="Udaipur">Udaipur</option>
                <option value="Udupi">Udupi</option>
                <option value="Ujjain">Ujjain</option>
                <option value="Vijayawada">Vijayawada</option>
                <option value="Vishakapatnam">Vishakapatnam</option>
                <option value="Vapi">Vapi</option>
                <option value="Vasco">Vasco</option>
                <option value="Vadodara">Vadodara</option>
                <option value="Varanasi">Varanasi</option>
                <option value="Virudhunagar">Virudhunagar</option>
                <option value="Vrindavan">Vrindavan</option>
                <option value="Warangal">Warangal</option>
                <option value="Yamunanagar">Yamunanagar</option>
            </select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style2">If not in the list, Please specify(in others)<span class="style3"> </span></span></td>
          </tr>
          <tr>
            <td><span class="style2"><span class="style3">other:</span></span></td>
            <td><input type=text name=city1></td>
          </tr>
          <tr>
            <td>state* :</td>
            <td><select name=state>
                <option value="select one">select one</option>
                <option value="Assam">Assam</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Andaman & Nicobar">Andaman & Nicobar</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhatisgarh">Chhatisgarh</option>
                <option value="Delhi">Delhi</option>
                <option value="Daman & Diu">Daman & Diu</option>
                <option value="Nagar Haveli">Nagar Haveli</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Goa">Goa</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Haryana">Haryana</option>
                <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Manipur">Manipur</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Orissa">Orissa</option>
                <option value="Punjab">Punjab</option>
                <option value="Pondicherry">Pondicherry</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tripura">Tripura</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Uttaranchal">Uttaranchal</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="West Bengal">West Bengal</option>
            </select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="left"><span class="style2">If not in the list, Please specify(in others)</span></div></td>
          </tr>
          <tr>
            <td><span class="style2"><span class="style3"> other:</span></span></td>
            <td><input type=text name=state1 class="textfield"></td>
          </tr>
          <tr>
            <td>Pin/Zip* : </td>
            <td><input type=text name=pin size=10 class="textfield"></td>
          </tr>
          <tr>
            <td height="34">Phone/Mobile* : <br>
                <br></td>
            <td><input type=text name=mobile size=15 class="textfield"></td>
          </tr>
          <tr>
            <td height="24">E-mail ID *:</td>
            <td><input type=text name=email size=30 class="textfield"></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <P>
  
  <p><br>
     <font color=#867F7F size=4pt> Educational Qualification     </font><br>
      <font color=#867F7F size=3pt>  class 10th     </font><br>
  <p>
  
  <table width="408" height="65" border="2" align="center" bgcolor="#999966">
    <tr>
      <td width="437"><table width="437" height="111" border="0" align="center">
        <tr>
          <td width="220">Board*: </td>
          <td width="240"><select name=Board>
              <option>Select One</option>
              <option value="CBSE">CBSE</option>
              <option value="ICSC">ICSC</option>
              <option value="STATE">STATE</option>
          </select></td>
        </tr>
        <tr>
          <td>Qualification year*: </td>
          <td><select name=Q_year10>
              <br>
              <?php
     for($i=1980; $i<2009; $i++){
     echo "<option>$i</option>";
     }
     echo "</select>";
?>
              <br>
          </select></td>
        </tr>
        <tr>
          <td>% marks* : <br></td>
          <td><input type=text name=percent10 size=5 class="textfield"></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <P><font color=#867F7F size=3pt>class 12th</font>  
  <P><br>
  <table width="200" border="2" align="center" bgcolor="#999966">
    <tr>
      <td><table width="437" border="0" align="center">
        <tr>
          <td width="211">Board*: <br></td>
          <td width="216"><select name=Board12>
              <option>Select One</option>
              <option value="CBSE">CBSE</option>
              <option value="ICSC">ICSC</option>
              <option value="STATE">STATE</option>
          </select></td>
        </tr>
        <tr>
          <td>Qualification year*: </td>
          <td><select name=Q_year12>
              <br>
              <?php
     for($i=1980; $i<2009; $i++){
     echo "<option>$i</option>";
     }
     echo "</select>";
?>
              <br>
          </select></td>
        </tr>
        <tr>
          <td>% marks* :</td>
          <td><input type=int name=percent12 size=5 class="textfield"></td>
        </tr>
        <tr>
          <td>AIEEE Score : <br></td>
          <td><input type=int name=Score size=5 class="textfield"></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <p><br>
</p>

<p>
	 <input type="submit" name="Submit" value="Register" />
</p>

      
     
     
  
 </FORM>
 </div>
 </BODY>
 </HTML>
