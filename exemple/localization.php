<!DOCTYPE html>
<html>
<head>

    <!-- head -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/main.css?v=2023.2.5596" type="text/css" rel="stylesheet"/>
    <script src="../JS/daypilot-all.min.js?v=2023.2.5596"></script>

    <!-- /head -->

</head>
<body>

<!-- top -->



    <div class="space">Select locale:
        <select id="locale">
            <option>ca-es</option>
            <option>cs-cz</option>
            <option>da-dk</option>
            <option>de-at</option>
            <option>de-ch</option>
            <option selected="selected">de-de</option>
            <option>de-lu</option>
            <option>en-au</option>
            <option>en-ca</option>
            <option>en-gb</option>
            <option>en-us</option>
            <option>es-es</option>
            <option>es-mx</option>
            <option>eu-es</option>
            <option>fi-fi</option>
            <option>fr-be</option>
            <option>fr-ca</option>
            <option>fr-ch</option>
            <option>fr-fr</option>
            <option>fr-lu</option>
            <option>gl-es</option>
            <option>it-it</option>
            <option>it-ch</option>
            <option>ja-jp</option>
            <option>ko-kr</option>
            <option>nb-no</option>
            <option>nl-nl</option>
            <option>nl-be</option>
            <option>nn-no</option>
            <option>pt-br</option>
            <option>pl-pl</option>
            <option>pt-pt</option>
            <option>ro-ro</option>
            <option>ru-ru</option>
            <option>sk-sk</option>
            <option>sv-se</option>
            <option>tr-tr</option>
            <option>uk-ua</option>
            <option>zh-cn</option>
        </select>
    </div>

    <div id="dp"></div>

    <div id="print"></div>

    <script type="text/javascript">

        var dp = new DayPilot.Calendar("dp");

        // view
        dp.startDate = "2013-03-25";  // or just dp.startDate = "2013-03-25";
        dp.viewType = "Week";
        dp.locale = "de-de";

        // event creating
        dp.onTimeRangeSelected = function (args) {
            var name = prompt("New event name:", "Event");
            if (!name) return;
            var e = new DayPilot.Event({
                start: args.start,
                end: args.end,
                id: DayPilot.guid(),
                resource: args.resource,
                text: "Event"
            });
            dp.events.add(e);
            dp.clearSelection();
            dp.message("Created");
        };

        dp.headerDateFormat = "dddd";

        dp.init();

        var e = new DayPilot.Event({
            start: new DayPilot.Date("2013-03-25T12:00:00"),
            end: new DayPilot.Date("2013-03-25T12:00:00").addHours(3),
            id: DayPilot.guid(),
            text: "Special event"
        });
        dp.events.add(e);

    </script>



    <!-- bottom -->
</template>


<!-- /bottom -->

</body>
</html>

