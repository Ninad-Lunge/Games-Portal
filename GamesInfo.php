<?php
$mysqli = new mysqli("localhost", "root", "", "games_portal");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT id, name, added_by, date FROM games_list WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $name, $added_by, $date);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>GameID</th>";
echo "<td>" . $id . "</td>";
echo "<th>Game Title</th>";
echo "<td>" . $name . "</td>";
echo "<th>Added By</th>";
echo "<td>" . $added_by . "</td>";
echo "<th>Date</th>";
echo "<td>" . $date . "</td>";
echo "</tr>";
echo "</table>";
?>