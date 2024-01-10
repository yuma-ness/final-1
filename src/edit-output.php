
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>リスト１－２</title>
	</head>
	<body>
<?php
$pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('update tuuka set name=?,count=? where ID=?');

    if (empty($_POST['n'])) {
        echo '商品名を入力してください。';
    } else
    if (!preg_match('/[0-9]+/', $_POST['c'])) {
        echo '枚数を整数で入力してください。';

    } else if($sql->execute([htmlspecialchars($_POST['n']),$_POST['c'],$_POST['i']])){
        echo '更新に成功しました。';
    }else {
        echo '更新に失敗しました。';
    }
    
?>
        <hr>
      

<?php
// foreach ($pdo->query('select * from tuuka') as $row) {
//     echo '<tr>';
//         echo '<td>', $row['ID'], '</td>';
//         echo '<td>', $row['name'], '</td>';
//         echo '<td>', $row['count'], '</td>';
        
// }
?>
        </table>
        <button id="button2" onclick="location.href='delete-input.php'">編集画面へ戻る</button>
        <button id="button3" onclick="location.href='index.php'">トップへ戻る</button>
    </body>
</html>
