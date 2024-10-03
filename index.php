<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URANAI</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <p>占い結果</p>
    </div>
    <div class="main">
        <div id="consta" <?php if(isset($_GET['consta'])) { echo "class='resultWide'"; } ?>>
            <div class="constaHeader">
                <p>占い結果</p>
            </div>
            <div class="constaMain">
                <form action="./" method="get">
                    <select name="consta">
                        <option value="牡羊座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '牡羊座') echo 'selected'; ?>>牡羊座（おひつじ座）</option>
                        <option value="牡牛座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '牡牛座') echo 'selected'; ?>>牡牛座（おうし座）</option>
                        <option value="双子座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '双子座') echo 'selected'; ?>>双子座（ふたご座）</option>
                        <option value="蟹座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '蟹座') echo 'selected'; ?>>蟹座（かに座）</option>
                        <option value="獅子座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '獅子座') echo 'selected'; ?>>獅子座（しし座）</option>
                        <option value="乙女座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '乙女座') echo 'selected'; ?>>乙女座（おとめ座）</option>
                        <option value="天秤座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '天秤座') echo 'selected'; ?>>天秤座（てんびん座）</option>
                        <option value="蠍座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '蠍座') echo 'selected'; ?>>蠍座（さそり座）</option>
                        <option value="射手座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '射手座') echo 'selected'; ?>>射手座（いて座）</option>
                        <option value="山羊座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '山羊座') echo 'selected'; ?>>山羊座（やぎ座）</option>
                        <option value="水瓶座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '水瓶座') echo 'selected'; ?>>水瓶座（みずがめ座）</option>
                        <option value="魚座" <?php if(isset($_GET['consta']) && $_GET['consta'] == '魚座') echo 'selected'; ?>>魚座（うお座）</option>
                    </select>
                    
                    <select name="blood">
                        <option value="a" <?php if(isset($_GET['blood']) && $_GET['blood'] == 'a') echo 'selected'; ?>>A型</option>
                        <option value="b" <?php if(isset($_GET['blood']) && $_GET['blood'] == 'b') echo 'selected'; ?>>B型</option>
                        <option value="ab" <?php if(isset($_GET['blood']) && $_GET['blood'] == 'ab') echo 'selected'; ?>>AB型</option>
                        <option value="o" <?php if(isset($_GET['blood']) && $_GET['blood'] == 'o') echo 'selected'; ?>>O型</option>
                    </select>
                    
                    <button type="submit" name="submit">占う</button>
                </form>

                <div class="constaResults">
                    <?php
                    if (isset($_GET['consta']) && isset($_GET['blood'])) {
                        $consta = $_GET['consta'];
                        $blood = strtolower($_GET['blood']); 

                        $filepath = 'output.csv';  
                        $fp = fopen($filepath, 'r');  

                        if ($fp !== false) {
                            $header = fgetcsv($fp);
                            $found = false;

                            while ($row = fgetcsv($fp)) {
                                if ($row[0] == $consta && strtolower($row[1]) == $blood) {
                                    echo "<table class='resultTable'>";
                                    echo "<tr><th>順位</th><td>" . htmlspecialchars($row[4]) . "位</td></tr>"; // 順位を最初に表示
                                    echo "<tr><th>健康運</th><td>" . htmlspecialchars($row[2]) . "</td></tr>";
                                    echo "<tr><th>金運</th><td>" . htmlspecialchars($row[3]) . "</td></tr>";
                                    echo "<tr><th>恋愛運</th><td>" . htmlspecialchars($row[5]) . "</td></tr>";
                                    echo "<tr><th>総合運</th><td>" . htmlspecialchars($row[6]) . "</td></tr>";
                                    echo "<tr><th>対人運</th><td>" . htmlspecialchars($row[7]) . "</td></tr>";
                                    echo "<tr><th>メッセージ</th><td>君も広尾学園に来よう！</td></tr>"; // メッセージを最後に表示
                                    echo "</table>";

                                    $found = true;
                                    break;
                                }
                            }

                            fclose($fp);

                            if (!$found) {
                                echo "<p>指定された星座と血液型のデータが見つかりませんでした。</p>";
                            }
                        } else {
                            echo "<p>ファイルを開けませんでした。</p>";
                        }
                    } else {
                        echo "<p>星座と血液型を選んでください。</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
