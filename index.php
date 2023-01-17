<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bible Web App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div><br/>
        <big>Select a Book</big>
        <form action="" method="post">
            <select name="books" id="books">
                <optgroup label="Old Testament">
                    <option value="Genesis">Genesis</option>
                    <option value="Exodus">Exodus</option>
                    <option value="Leviticus">Leviticus</option>
                    <option value="Numbers">Numbers</option>
                    <option value="Deuteronomy">Deuteronomy</option>
                    <option value="Joshua">Joshua</option>
                    <option value="Judges">Judges</option>
                    <option value="Ruth">Ruth</option>
                    <option value="1 Samuel">1 Samuel</option>
                    <option value="2 Samuel">2 Samuel</option>
                    <option value="1 Kings">1 Kings</option>
                    <option value="2 Kings">2 Kings</option>
                    <option value="1 Chronicles">1 Chronicles</option>
                    <option value="2 Chronicles">2 Chronicles</option>
                    <option value="Ezra">Ezra</option>
                    <option value="Nehemhiah">Nehemiah</option>
                    <option value="Esther">Esther</option>
                    <option value="Job">Job</option>
                    <option value="Psalms">Psalms</option>
                    <option value="Proverbs">Proverbs</option>
                    <option value="Ecclesiastes">Ecclestiastes</option>
                    <option value="Song of Solomon">Song of Solomon</option>
                    <option value="Isaiah">Isaiah</option>
                    <option value="Jeremiah">Jeremiah</option>
                    <option value="Lamentations">Lamentations</option>
                    <option value="Ezekiel">Ezekiel</option>
                    <option value="Daniel">Daniel</option>
                    <option value="Hosea">Hosea</option>
                    <option value="Joel">Joel</option>
                    <option value="Amos">Amos</option>
                    <option value="Obadiah">Obadiah</option>
                    <option value="Jonah">Jonah</option>
                    <option value="Micah">Micah</option>
                    <option value="Nahum">Nahum</option>
                    <option value="Habakkuk">Habakkuk</option>
                    <option value="Zephaniah">Zephaniah</option>
                    <option value="Haggai">Haggai</option>
                    <option value="Zechariah">Zechariah</option>
                    <option value="Malachi">Malachi</option>
                </optgroup>
                <optgroup label="New Testament">
                    <option value="Matthew">Matthew</option>
                    <option value="Mark">Mark</option>
                    <option value="Luke">Luke</option>
                    <option value="John">John</option>
                    <option value="Acts of the Apostles">Acts of the Apostles</option>
                    <option value="Romans">Romans</option>
                    <option value="1 Corinthians">1 Corinthians</option>
                    <option value="2 Corinthians">2 Corinthians</option>
                    <option value="Galations">Galations</option>
                    <option value="Ephesians">Ephesians</option>
                    <option value="Philippains">Philippains</option>
                    <option value="Colossians">Colossians</option>
                    <option value="1 Thessalonians">1 Thessalonians</option>
                    <option value="2 Thessalonians">2 Thessalonians</option>
                    <option value="1 Timothy">1 Timothy</option>
                    <option value="2 Timothy">2 Timothy</option>
                    <option value="Titus">Titus</option>
                    <option value="Philemon">Philemon</option>
                    <option value="Hebrews">Hebrews</option>
                    <option value="James">James</option>
                    <option value="1 Peter">1 Peter</option>
                    <option value="2 Peter">2 Peter</option>
                    <option value="1 John">1 John</option>
                    <option value="2 John">2 John</option>
                    <option value="3 John">3 John</option>
                    <option value="Jude">Jude</option>
                    <option value="Revelation">Revelation</option>
                </optgroup>
            </select>
            <input type="text" name="Chapter" placeholder="Chapter" >
            <input type="submit" value="Read">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $selectedBook = $_POST["books"];
                $selectedChapter = $_POST["Chapter"];
                echo "You selected: " . $selectedBook . " " . $selectedChapter . "</br></br>";
              }
        ?>
    </div>
    <table >
        <tr>
            <td rowspan="2" class="main">
            <div class=scrollable>
                    </br><div class="title">AMP</div><br/>
                        <?php
                            $verse=1;
                            $xml = simplexml_load_file('AMP.xmm');

                            $path = "/bible/b[@n='" . $selectedBook . "']/c[" . $selectedChapter . "]/v";
                            foreach ($xml->xpath($path) as $child) {
                                echo "<strong> " . $verse . "</strong> ";
                                echo $child . "</br></br>";
                                $verse++;
                            }
                        ?>
                </div>
            </td>
            <td class="one">
                <div class=scrollable>
                    </br><div class="title">KJV</div><br/>
                        <?php
                            $verse=1;
                            $xml = simplexml_load_file('KJV.xml');
                            $path = "/XMLBIBLE/BIBLEBOOK[@bname='" . $selectedBook . "']/CHAPTER[" . $selectedChapter . "]/VERS";
                            foreach ($xml->xpath($path) as $child) {
                                echo "<strong> " . $verse . "</strong> ";
                                echo $child . "</br></br>";
                                $verse++;
                            }
                        ?>
                </div>
            </td>
            <td class="two">
                <div class=scrollable>
                        </br><div class="title">ASV</div><br/>
                            <?php
                                $verse=1;
                                $xml = simplexml_load_file('ASV.xml');
                                $path = "/XMLBIBLE/BIBLEBOOK[@bname='" . $selectedBook . "']/CHAPTER[" . $selectedChapter . "]/VERS";
                                foreach ($xml->xpath($path) as $child) {
                                    echo "<strong> " . $verse . "</strong> ";
                                    echo $child . "</br></br>";
                                    $verse++;
                                }
                            ?>
                    </div>
            </td>
            <!-- <td rowspan="2" class="menu">Menu Bar
            </td> -->
        </tr>
        <tr> 
            <td colspan="2" class="notes">
                <div class=scrollable>
                    <div class="title">Notes</div>
                    <button onclick="saveNote()">Save</button></br>
                    <textarea id="note"></textarea>   
                    <script>
                        function saveNote() {
                            var currentDate = new Date();
                            var dateString = currentDate.toLocaleString();
                            var note = document.getElementById("note").value;
                            var file = new Blob([note], {type: "text/plain"});
                            var a = document.createElement("a");
                            a.href = URL.createObjectURL(file);
                            a.download =  dateString + ".txt";
                            a.click();
                        }
                    </script>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
