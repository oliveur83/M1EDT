<!DOCTYPE html>
<html>
<head>
    <title>Navigator (JavaScript Event Calendar)</title>

    <!-- head -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/main.css?v=2023.2.5596" type="text/css" rel="stylesheet"/>
    <script src="../JS/daypilot-all.min.js?v=2023.2.5596"></script>

    <!-- /head -->

</head>
<body>

<!-- top -->
    <div style="display: flex;">
        <div style="margin-right: 10px;">
            <div id="nav"></div>
        </div>
        <div style="flex-grow: 1;">
            <div id="dp"></div>
        </div>
    </div>

    <script type="text/javascript">
        
        var nav = new DayPilot.Navigator("nav", {
            showMonths: 3,
            skipMonths: 3,
            selectMode: "Week",
            freeHandSelectionEnabled: true,
            selectionDay: DayPilot.Date.today(),
            onTimeRangeSelected: (args) => {
                dp.startDate = args.start;
                dp.update();
            },
            onVisibleRangeChange: (args) => {
                var start = args.start;
                var end = args.end;

                if (start <= nav.selectionDay && nav.selectionDay < end) {
                    return;
                }

                var day = nav.selectionDay.getDay();
                var target = start.firstDayOfMonth().addDays(day);
                nav.select(target);
            },
            onBeforeCellRender: (args) => {
                if (args.cell.isCurrentMonth) {
                    args.cell.cssClass = "current-month";
                }
            }
        });

        nav.init();

        var dp = new DayPilot.Calendar("dp");

        // view
        dp.startDate = nav.selectionDay;
        dp.viewType = "Week";

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
            start: "2023-09-25 15:00:00",
            end: "2023-09-25 17:00:00",
            id: 3,
            text: "Special event"
        });
        dp.events.add(e);
        

    </script>


    <!-- bottom -->
</template>

<script src="../JS/app.js?v=2023.2.5596"></script>
<!-- /bottom -->

</body>
</html>

