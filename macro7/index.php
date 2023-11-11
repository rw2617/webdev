<!doctype html>
<html>
    <head>
        <title>Quiz!</title>
        <style>
            @font-face {
                font-family: samdan;
                src: url(../samdan.ttf);
            }
            body{
                background-color: lightsteelblue;
            }
            a{
                font-family: samdan;
            }
            h1 {
                font-family: samdan;
            }
            #error {
                font-family: samdan;
                background-color: red;
                color: white;
                padding: 10px;
                font-size: 100%;
            }
            img{
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 30%;
                height: auto;
            }
            .desc{
                margin: auto;
                width: 50%;
                text-align: center;
            }
            #youAre{
                text-align: center;
            }
            table {
                border-collapse: collapse;
                width: 400px;
            }

            td, th {
                border: 1px solid black;
                text-align: left;
                padding: 8px;
            }
        </style>
    </head>
    <body>
        <h1>Which Chris McLean are you?</h1>
        <?php

            //results
            //get data and parse it
            $file = getcwd() . '/data/results.txt';

            $data = file_get_contents($file);

            $lines = explode("\n", $data);

            $j = 0;
            $n = 0;
            $p = 0;
            $s = 0;
            $total = 0;

            //loop through data
            for ($i = 0; $i < sizeof($lines); $i++) {
                if ($lines[$i] === 'Jail') {
                    $j++;
                    $total++;
                }
                else if ($lines[$i] === 'Normal') {
                    $n++;
                    $total++;
                }
                else if ($lines[$i] === 'Pirate') {
                    $p++;
                    $total++;
                }
                else if ($lines[$i] === 'Sleepy') {
                    $s++;
                    $total++;
                }
            }

            if ($_COOKIE['type']) {
                print "<h3 id='youAre'>You are " . $_COOKIE['type'] . " Chris!</h3>";
                if ($_COOKIE['type'] == 'Jail') {
                    print "<img src='images7/jail.PNG'></br><div class='desc'>You boast a long 
                    list of crimes including: manslaughter, psychological abuse, animal 
                    cruelty, extortion, and terrorism, just to name a few. Though you've 
                    served a year in jail for your actions, I can't say it's proportionate 
                    to the level of heinousness, but hey, you have a show to host, ratings 
                    to maintain, and victims (contestants) to torture! And that orange 
                    jumpsuit kinda suits you ;)<div>";
                }
                else if ($_COOKIE['type'] == 'Normal'){
                    print "<img src='images7/normal.PNG'></br><div class='desc'>Alright 
                    campers, I heard from an anonymous source that SOMEBODY got the 
                    Normal Chris result on this quiz. Very. Cool. Dude.<div>";
                }
                else if ($_COOKIE['type'] == 'Pirate'){
                    print "<img src='images7/pirate.PNG'></br><div class='desc'>Arrr, matey! What 
                    arrr the odds you get this result, huh? You have an adventurous spirit and 
                    a penchant for dramatic flair. Always in search of treasure and distant, 
                    foreign lands, your lust for discovery, excitement, and shiny things is 
                    unmatched. Not to mention the strong bond between you and your crew and 
                    the even stronger bond between you and the parrot on your shoulder.<div>";
                }
                else if ($_COOKIE['type'] == 'Sleepy'){
                    print "<img src='images7/sleepy.PNG'></br><div class='desc'>You are 
                    probably laying in bed right now, snug as a bug in a rug, with 
                    at least one stuffed animal. There's a high probably that you've 
                    just gulped down a glass of warm milk or a steaming cup of 
                    calming tea, if milk isn't your cup of...uh umm uhhh...anyways 
                    I'll let you go to sleep now. Goodnight, sleep tight, and don't 
                    let the bedbugs bite ya lil sleepyhead!<div>";
                }

                print '</br>
                <div id="results">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Distribution</th>
                        </tr>
                        <tr>
                            <td>Jail</td>
                            <td>
                                <div id="jail" style ="background-color:orange; width:'. $j/$total*100 .'%">
                                    &nbsp;
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Normal</td>
                            <td>
                                <div id="normal" style = "background-color:green; width:'. $n/$total*100 .'%">
                                    &nbsp;
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Pirate</td>
                            <td>
                                <div id="pirate" style = "background-color:black; width:'. $p/$total*100 .'%">
                                    &nbsp;
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sleepy</td>
                            <td>
                                <div id="sleepy" style = "background-color:purple; width:'. $s/$total*100 .'%">
                                    &nbsp;
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>';
                print "</br><a href=clear.php>Take Again!</a>";
                
            }else{
                
        ?>

        <?php
            if ($_GET['error'] == 'forgot') {
        ?>
        
            <div id="error">Please answer all questions.</div>
            </br>

        <?php
            }
        ?>

        <form action="processresults.php" method="POST">
            Favorite Drink:
            <select name="drink" id="drink">
                <option value="">make a selection</option>
                <option value="n">tomato juice</option>
                <option value="j">cashew</option>
                <option value="s">a glass of warm milk</option>
                <option value="p">lemonade</option>
            </select>
            </br>
            </br>

            Favorite Activities:
            <select name="activity" id="activity">
                <option value="">make a selection</option>
                <option value="j">human rights violations</option>
                <option value="s">sleep</option>
                <option value="p">hunting for treasure</option>
                <option value="n">hosting a reality show</option>
            </select>
            </br>
            </br>

            Favorite Music:
            <select name="music" id="music">
                <option value="">make a selection</option>
                <option value="p">sea shanty</option>
                <option value="j">house or rock</option>
                <option value="n">showtunes</option>
                <option value="s">lofi beats to study and relax to</option>
            </select>
            </br>
            </br>

            Favorite Season of Total Drama:
            <select name="season" id="season">
                <option value="">make a selection</option>
                <option value="n">Total Drama Island</option>
                <option value="s">Total Drama Action</option>
                <option value="p">Total Drama World Tour</option>
                <option value="j">Total Drama Revenge of ths Island</option>
            </select>
            </br>
            </br>

            <input type="submit">
        </form>


        <?php
            }
        ?>

    </body>
</html>