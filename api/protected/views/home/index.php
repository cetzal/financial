<?php
/* @var $this HomeController */

?>
<div class="contenedor">
	<div id="dp"></div>
</div>
<script type="text/javascript">
 var dp = new DayPilot.Gantt("dp");
    dp.startDate = new DayPilot.Date("2017-02-01");
    dp.days = 31;
    dp.rowCreateHandling = 'Enabled';
   

    dp.columns = [  { title: "Tareas", property: "txt_tema", width: 100},
	                { title: "Duracion", property: "txt_hora",width: 100},
	                { title: "Fecha inicio", property: "txt_fecha_i",width: 100},
	                { title: "Fecha fin", property: "txt_fecha_f",width: 100},
                    { title: "Usuario", property: "txt_user", width: 100} ];

	dp.onBeforeRowHeaderRender = function(args) {
                args.row.columns[1].html = new DayPilot.TimeSpan(args.task.end().getTime() - args.task.start().getTime()).toString("d") + " days";
                    args.row.areas = [
                        {
                            right: 3,
                            top: 3,
                            width: 16,
                            height: 16,
                            style: "cursor: pointer; box-sizing: border-box; background: white; border: 1px solid #ccc; background-repeat: no-repeat; background-position: center center; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAABASURBVChTYxg4wAjE0kC8AoiFQAJYwFcgjocwGRiMgPgdEP9HwyBFDkCMAtAVY1UEAzDFeBXBAEgxQUWUAgYGAEurD5Y3/iOAAAAAAElFTkSuQmCC);",
                            action: "ContextMenu",
                            menu: taskMenu,
                            v: "Hover"
                        }
                    ];
                };
                dp.onTaskClick = function(args) {
                    var modal = new DayPilot.Modal();
                    modal.closed = function() {
                        loadTasks();
                    };
                    modal.showUrl($appfinancial.HOST + "/proyectos/editprogres?id=" + args.task.id());
                };
                 dp.init();
                loadTasks();
                //loadLinks();

                function loadTasks() {
                    $.post($appfinancial.HOST + "/proyectos/listgantt", function(data) {
                        dp.tasks.list = data;
                        dp.update();

                        console.log(data);
                    });
                }
                 var taskMenu = new DayPilot.Menu({
                    items: [
                        {
                            text: "Delete",
                            onclick: function() {
                                var task = this.source;
                                $.post("backend_task_delete.php", {
                                    id: task.id()
                                },
                                function(data) {
                                    loadTasks();
                                });
                            }
                        }
                    ]
                });
   

</script>