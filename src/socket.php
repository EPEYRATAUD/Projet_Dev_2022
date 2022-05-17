<?php
    $host ="127.0.0.1";
    $port= 20233;
    set_time_limit(0);

    
    $sock= socket_create(AF_INET, SOCK_STREAM, 0) or die("Impossible de créer un socket\n");
    $result = socket_bind($sock, $host, $port) or die("Impossible de lier un socket\n");

    $result = socket_listen($sock, 3) or die("Impossible de configurer l’écouteur de socket");
    echo "écoute... :)";

    class Chat
    {
        function readline()
        {
            return rtrim(fgets(STDIN));
        }

    }

    do
     {
         $accept = socket_accept($sock) or die("Impossible d’accepter la connexion entrante");
         $msg = socket_read($accept, 1024) or die("Impossible de lire l’entrée\n"); 
     
         $msg = trim($msg);
         echo "\n Le client à répondu:\t".$msg."\n\n";

         $line = new Chat();
         echo "Enter Reply:\t";
         $reply = $line->readline();

         socket_write($accept, $reply, strlen($reply)) or die("Impossible d'écrire en sortie");
     
        }while (true);

            socket_close($accept, $sock);
        

?>