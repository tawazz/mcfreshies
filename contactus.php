<?php
    
echo "<h2> Contact Us </h2>";
echo "<p>You can contact us on 0800-686-879 or visit us at our Armadale Head Office at the address below </p>";
echo "<address> 7 Jull Street </br> Armadale </br> 6112 </br> Wersten Australia</address>";
echo "<p><b> You can also send an enquery form below and we will contact you</b> </p>";
    
?>

        <h2>Enquiry Form</h2>
        <form id="enq" name="enq" onsubmit="return checkEnq()">
            <label>Name</label><input type="text" name="name"></br>
            <label>Email</label><input type="text" name="email"></br>
            <label>Subject</label><input type="text" name="sub"></br>
            <textarea cols="73" rows="10"></textarea></br>
            <input type="submit" value="Send Enquiry">
        </form>