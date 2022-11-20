
<!DOCTYPE html>
<html>
<head>
    <title>Open-Source JavaScript Event Calendar</title>

    <!-- head -->
    <meta charset="utf-8"/>
    <meta name="referrer" content="no-referrer-when-downgrade"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../helpers/v2/main.css?v=2022.3.432" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"/>
    <script src="../js/daypilot-all.min.js?v=2022.3.432"></script>

    <!-- /head -->

</head>
<body>

<?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On établit la connexion
            $conn = new PDO("mysql:host=$servername;dbname=m1edt", $username, $password);
            $sql = "SELECT * FROM cours ";
            $result = $conn->query($sql);
      

        ?>
    <div id="dp"></div>

    <script type="text/javascript">
        // on crée notre planning 
        const dp = new DayPilot.Calendar("dp", {
            viewType: "Week",
            startDate: "2022-03-21",
            headerDateFormat: "dddd",
            onEventClick: async args => {
                // on cree les colors que l'on veut 
                const colors = [
                    {name: "Blue", id: "#3c78d8"},
                    {name: "Green", id: "#6aa84f"},
                    {name: "Yellow", id: "#f1c232"},
                    {name: "Red", id: "#cc0000"},
                ];
                // on cree les form que l'on veut 
                // pour modifier
                const form = [
                    {name: "Text", id: "text"},
                    {name: "Start", id: "start", type: "datetime"},
                    {name: "End", id: "end", type: "datetime"},
                    {name: "Color", id: "barColor", type: "select", options: colors},
                ];
                //quand on click dessus 
                const modal = await DayPilot.Modal.form(form, args.e.data);
                
                if (modal.canceled) {
                    return;
                }
                // update de modification 
                dp.events.update(modal.result);

            },
            //?
            onBeforeEventRender: args => {
                args.data.barBackColor = "transparent";
                if (!args.data.barColor) {
                    args.data.barColor = "#333";
                }
            },
            //?
            onTimeRangeSelected: async args => {

                const form = [
                    {name: "Name", id: "text"}
                ];

                const data = {
                    text: "Event"
                };

                const modal = await DayPilot.Modal.form(form, data);

                dp.clearSelection();

                if (modal.canceled) {
                    return;
                }

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
            }
        });

        dp.init();
        // ici on fait nos event 
        const events = [
            <?php
            while ($rowEns = $result->fetch())
            {
                echo '{start:"'.$rowEns['start'].'",';
                echo 'end: "' .$rowEns['end'].'",';
                echo 'id:"'.$rowEns['id'].'",';
                echo 'text:"'.$rowEns['text'].'",';
                echo 'barColor:"'.$rowEns['barcolor'].'"},' ;
            };
            ?>
            {
                start: "2022-03-21T11:00:00",
                end: "2022-03-21T14:00:00",
                id: 2,
                text: "Event 1",
                barColor: "#3c78d8"
            },
            {
                start: "2022-04-22T12:00:00",
                end: "2022-04-22T15:00:00",
                id: 2,
                text: "Event 2",
                barColor: "#6aa84f"
            },
            {
                start: "2022-03-24T12:00:00",
                end: "2022-03-24T16:00:00",
                id: 4,
                text: "Event 4",
                barColor: "#cc0000"
            },
        ];
        //permet de ajouter dans le planning 
        dp.update({events});

    </script>

<!-- /bottom -->


</body>
</html>

