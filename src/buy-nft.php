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


?>