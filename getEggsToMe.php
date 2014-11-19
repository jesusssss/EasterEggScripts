<?php
include("_config.php");

$userId = pget("userId");
$sql = "SELECT * FROM eggLocations LEFT JOIN userInfo ON eggLocations.byUser = userInfo.userId WHERE eggLocations.toUser = '$userId' AND eggLocations.available IS NOT NULL ORDER BY eggLocations.id DESC";
$res = $GLOBALS["db"]->query($sql);

$result = array();

if($res->num_rows !== 0) {
    while($row = $res->fetch_assoc()) {
        if($row["available"] == 1) {
            $status = "new";
        } else {
            $status = "cracked";
        }

        $result[] = array(
          "id" => $row["id"],
            "lat" => $row["lat"],
            "lng" => $row["lng"],
            "radius" => $row["radius"],
            "eggId" => $row["egg"],
            "toUser" => $row["toUser"],
            "userImage" => $row["profileImage"],
            "firstname" => $row["firstname"],
            "lastname" => $row["lastname"],
            "status" => $status
        );
    }
}
//$toUser = $result["toUser"];
//$getToUser = "SELECT profileImage, firstname, lastname FROM userInfo WHERE userId = '$toUser'";
//$newRes = $GLOBALS["db"]->query($getToUser);
//if($newRes->num_rows !== 0) {
//    while($row = $newRes->fetch_assoc()) {
//        $result["userImage"] = $row["profileImage"];
//        $result["firstname"] = $row["firstname"];
//        $result["lastname"] = $row["lastname"];
//    }
//}

echo json_encode($result);
