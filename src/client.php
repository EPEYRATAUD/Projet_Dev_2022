<html> 
<body>
    <form method='POST'>
   <table>
           <tr>
                <td><label>Entre le message></label>
                <input type="text" name="txtMessage">
                <input type="submit" name="btnSend" value="Send">
            </td>
        </tr> 
        <?php
            $host="127.0.0.1";
            $port=20233;

            if(isset($_POST['btnSend'])){
            $msg= $_REQUEST['txtMessage'];
            $sock= socket_create(AF_INET, SOCK_STREAM, 0);
            socket_connect($sock, $host, $port);

            socket_write($sock, $msg, strlen($msg));

            $reply = socket_read($sock, 1924);
            $reply = trim($reply);
            $reply = "le serveur répond:\t".$reply;

            }
        ?>
        <tr>
            <td>
                <textarea rows="10" cols="30">
               <?php echo @reply?>;
            </textarea>
                <td>
        </tr>            
     </table>
   </form>      
 </body>
</html>
