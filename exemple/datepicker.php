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
   <!-- /top -->

    <div class="space">
        <span id="start"></span> <a href="#" onclick="picker.show(); return false;">Change</a>
    </div>

    <div id="dp"></div>

    <script type="text/javascript">
        var picker = new DayPilot.DatePicker({
            target: 'start',
            pattern: 'yyyy-MM-dd',
            onTimeRangeSelected: function (args) {
                dp.startDate = args.start;
                dp.update();
            }
        });

        var dp = new DayPilot.Calendar("dp");

        // view
        dp.startDate = "2023-03-25";

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

        dp.init();

        var e = new DayPilot.Event({
            start: new DayPilot.Date("2023-03-25T12:00:00"),
            end: new DayPilot.Date("2023-03-25T12:00:00").addHours(3),
            id: DayPilot.guid(),
            text: "Special event"
        });
        dp.events.add(e);

    </script>


    <!-- bottom -->
</template>

<script src="../JS/app.js?v=2023.2.5596"></script>
<!-- /bottom -->c:\wamp64\www\toto\demo\helpers\v2\app.js

</body>
</html>

