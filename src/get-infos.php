<?php
$strJsonFileContents = file_get_contents("NFT.json");
$nftList = json_decode($strJsonFileContents,true);

function getAllUserNames($nftList) {
    for ($x = 0 ; $x < count($nftList) ; $x++ ) {
        print_r($nftList[$x]["user"]);
        echo("\n");
    }
}

function getUserName($user_num, $nftList) {
    print_r($nftList[$user_num]["user"]);
}
function getHash($hash_num, $nftList) {
    print_r($nftList[$hash_num]["hash"]);
}
function getPrice($price_num, $nftList) {
    print_r($nftList[$price_num]["price"]);
}

// function tryLogin($username, $password) {
//     $INSECURE_JSON = file_get_contents("LOGIN.json"); //récup les données du json
//     $logincred = json_decode($INSECURE_JSON, TRUE); // foutre les données du json dans une sorte de liste
//     foreach ($logincred as $insecure_val) { // boucler sur la longueur de la liste
//         if($insecure_val['username'] == $username // check si le username et le password correspondent a ceux du tour de boucle actuel
//            && $insecure_val['password'] == $password) {
//             print ("found"); // print un truc si le login est trouvé
//             break;
//         }
//     }
// }

function checkHash($hash, $nftList) {
    $hashes = [];
    $doesexist = false;
    for ($i=0; $i < sizeof($nftList); $i++){
        $value = $nftList[$i]["hash"];
        array_push($hashes, $value);
    }
    for ($x=0;$x < sizeof($hashes); $x++) {
        if ($hashes[$x] == $hash) {
            $doesexist = true;
        }
    }
    if ($doesexist == true) {
        printf ("Le NFT existe déjà, veuillez ne pas essayer de plagier le contenu des autres artistes !\n");
    } else {
        $jsonf = fopen('NFT.json', 'a');
        $data = file_get_contents('NFT.json');
        $json_arr = json_decode($data, true);
        $json_arr[] = array('username'=>"CURRENT USER", 'hash'=>$hash, 'price'=>15, 'time'=>'15:50');
        file_put_contents("NFT.json", "");
        file_put_contents('NFT.json', json_encode($json_arr));
        $section = file_get_contents('NFT.json', FALSE, NULL, 0, filesize("NFT.json")-4);
        print($section.= "\n");
        fclose($jsonf);
    }
}

checkHash('IHBA41oenjzrf5BV89AV', $nftList);

// getHash(0, $nftList)
?>