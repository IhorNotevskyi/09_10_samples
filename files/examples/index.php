<?php

$dir = __DIR__ . '/data';
$lorem = 'Lorem ipsum dolor sit amet, eu vix equidem similique scripserit. Postea splendide cu eum, modus perfecto accommodare ei mea. Elit indoctum facilisis has ea, ea pro idque everti bonorum, vix diam liber eu. Omnium expetenda vel eu, illud ignota feugiat sed ea, dicant tractatos vix ei.
Sale electram quo ut, ea est unum nominati, nonumy euismod vis ne. Ne usu movet inciderint reformidans, soleat graecis eos no, no quo verterem conceptam. Omnium indoctum est id. Ea has vitae nominavi eloquentiam, pri no lorem volutpat, erant malorum insolens ea eam. Te cum molestie inimicus, ad stet aperiam oblique quo, verterem persequeris dissentiunt mel ex. Volumus liberavisse ei mei.
Cu mea vocibus tractatos. Eum te brute iudicabit tincidunt, dicat elitr pri id, sit no munere legere intellegat. Quo ea nisl omnes mnesarchum. Mea exerci viderer invidunt no, ei prima atqui elaboraret sea, erat aliquam ad eos. Eam at malis eruditi volutpat. Ad eam rebum percipit luptatum, cum eu omittam noluisse postulant. Et nam iuvaret nominati, vis novum vidisse regione ne.
His ex nulla volumus, fugit feugait accusata quo et, omnium corpora mel at. Ea pri fuisset luptatum. Nec ad debitis corrumpit, munere perpetua mediocrem ei qui. Apeirian lucilius id ius, numquam antiopam vituperata per ex.
Nam movet suavitate scribentur id, nam diam nonumy detracto in, quo delectus eloquentiam cu. Nam vero harum causae ne, ex simul corrumpit vel, quidam putant pericula pri et. Vix autem aeterno consectetuer eu. Pri at case posse, enim aliquid ad vel, has omnis similique ne.';

$file = "{$dir}/file_put_contents.txt";
//file_put_contents($file, $lorem, FILE_APPEND);
echo 'file_get_contents: ', strlen(file_get_contents($file)), '<br>';

//$lines = file($file);
$lines = [];

$fileResource = fopen($file, 'r');
while (!feof($fileResource)) {
    $lines[] = fread($fileResource, 512);
}
fclose($fileResource);


$file2 = "{$dir}/fwrite.txt";
$fileResource = fopen($file2, 'a');
foreach ($lines as $line) {
    fwrite($fileResource, $line);
}
fclose($fileResource);

$newDir = "{$dir}/test";
if (!file_exists($newDir)) {
    mkdir($newDir);
    copy($file, "{$newDir}/1.txt");
    copy($file2, "{$newDir}/2.txt");
}

var_dump(file_exists('1.txt'));
chdir($newDir);
var_dump(file_exists('1.txt'));

$dirResource = opendir($newDir);
while (($file = readdir($dirResource)) !== false) {
    var_dump($file);
}
closedir($dirResource);

var_dump(scandir($newDir));
//rmdir($newDir);
