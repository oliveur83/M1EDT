<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "";

//On établit la connexion
$conn = new PDO("mysql:host=$servername;dbname=m1edt", $username, $password);
$sql = "SELECT * FROM cours ";
$result = $conn->query($sql);

$i = 0;
//pour bouton semaine precedente ou suivante 
// pour n semaines 
if (!empty($_POST['date_p'])) {
    $i = intval($_POST['semaine']) - 1;
    $date = date('Y-m-d', strtotime('+' . $i . 'week'));
} elseif (!empty($_POST['date_s'])) {
    $i = intval($_POST['semaine']) + 1;
    $date = date('Y-m-d', strtotime('+' . $i . 'week'));
} else {
    $date = date("Y-m-d");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Open-Source JavaScript Event Calendar</title>

    <!-- head -->
    <meta charset="utf-8" />
    <meta name="referrer" content="no-referrer-when-downgrade" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../helpers/v2/main.css?v=2022.3.432" type="text/css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" />
    <script src="../js/daypilot-all.min.js?v=2022.3.432"></script>
    <script src="../css/fichier.css"></script>

    <!-- /head -->

</head>

<body>
    <center>
        <table>
            <tr>
                <form action="emploi_du_temp.php" method="post">
                    <input type="submit" value="semaine precedente">
                    <input type="hidden" name="date_p" value="toto">
                    <input type="hidden" name="semaine" value="<?php echo $i ?>">

                </form>
            </tr>
            <tr>
                <?php echo "semaine du: " . $date ?>
            </tr>
            <tr>
                <form action="emploi_du_temp.php" method="post">
                    <input type="submit" value="semaine suivante">
                    <input type="hidden" name="date_s" value="toto">
                    <input type="hidden" name="semaine" value="<?php echo $i ?>">
                </form>
            </tr>
        </table>
    </center>

    <div id="dp"></div>

    <script type="text/javascript">
        // on crée notre planning 
        
        const dp = new DayPilot.Calendar("dp", {
            viewType: "Week",
            startDate: "<?php echo $date ?>",
            headerDateFormat: "dddd",
            //pour la modification  d'une ue 
            onEventClick: async args => {
                // on cree les colors que l'on veut 
                const colors = [
                    { name: "Blue", id: "#3c78d8"},
                    { name: "Green", id: "#6aa84f"},
                    { name: "Yellow", id: "#f1c232"},
                    { name: "Red", id: "#cc0000"},
                ];
                // on cree les form que l'on veut 
                // pour modifier
                const form = [
                    { name: "Text", id: "text"},
                    { name: "Start", id: "start", type: "datetime"},
                    { name: "End", id: "end", type: "datetime"},
                    { name: "Color", id: "barColor", type: "select", options: colors},
                ];
                //quand on click dessus 
                const modal = await DayPilot.Modal.form(form, args.e.data);
                
                if (modal.canceled) {
                    
                    return;
                }
                // update de modification 
                //TODO: faire les modificaiton dans BDD
                dp.events.update(modal.result);
                //tofo modification

            },
            //?
            onBeforeEventRender: args => {
                args.data.barBackColor = "transparent";
                if (!args.data.barColor) {
                    args.data.barColor = "#333";
                }
            },
            //clique sur emploie du temp pour cree un UE
            onTimeRangeSelected: async args => {
                
                const form = [
                    { name: "Name", id: "text"}
                ];

                const data = {
                    text: "Event"
                };
                // a regarder !!!!!
                const modal = await DayPilot.Modal.form(form, data);

                dp.clearSelection();

                if (modal.canceled) {
                    return;
                }
                //ajout dans planning 
                //TODO:faire les insert dans la base 
                dp.events.add({
                    start: args.start,
                    end: args.end,
                    id: DayPilot.guid(),
                    text: modal.result.text,
                    barColor: "#3c78d8"
                });
            },
            //?
            onHeaderClick: args => {
                console.log("args", args);
            },
 
        });
        
        dp.init();
        // ici on fait nos event (affcihe)
        const events = [
            <?php while ($rowEns = $result->fetch()) {
            echo '{start:"' . $rowEns["start"] . '",';
            echo 'end: "' . $rowEns["end"] . '",';
            echo 'id:"' . $rowEns["id"] . '",';
            echo 'text:"' . $rowEns["text"] . '",';
            echo 'barColor:"' . $rowEns["barcolor"] . '"},';
            } ?>
            
 
        ];
        //permet de ajouter dans le planning 
        dp.update({events});

    </script>
           


</body>

</html>