<?php
$entryDateTime = $_REQUEST["month"];

$newEntryMonthNo = date('m', strtotime($entryDateTime));
// echo $newEntryMonthNo;

$newEntryYearNo = date('Y', strtotime($entryDateTime));
// echo $newEntryYearNo;

header("location:g_empAttenTable.php?month=$newEntryMonthNo&year=$newEntryYearNo");
?>