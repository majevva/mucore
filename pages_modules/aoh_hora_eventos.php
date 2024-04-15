<?
$get_config = simplexml_load_file('engine/config_mods/aoh_hora_eventos.xml');
if ($get_config->active == '0') {
    echo msg('0', 'Sorry, this feature is temporarily unavailable at the moment.');
} else {

?>
<style>
#events dt {
  padding: 1px 2px;
  border-radius: 2px;
  margin: 2px 0;
}

#events span {
  display:block;
  font-size:10px;
}

#events {
  margin:2px; 
  padding-top: 4px;
  padding-left: 10px;
}
</style>



<script type="text/javascript">
var lang = {};
lang[0]="Normal";
lang[1]="Normal Ready";
lang[2]="Custom";
lang[3]="Custom Ready";
//don't know what's lang
var MuEvents = {};
MuEvents.text = [
    [lang[0], lang[1]],
    [lang[2], lang[3]]
];
MuEvents.sked = [

<?
$file_Horarios = file('engine/variables_mods/HoraEventos.tDB');
foreach ($file_Horarios as $LST_HR){
  $LST_HR = explode("|",$LST_HR);
  echo "
  ['".$LST_HR[1]."',".$LST_HR[2].",".$LST_HR[3]."],
  ";
}
?>

];
MuEvents.init = function (e) {


    if (typeof e == "string") var g = new Date(new Date().toString().replace(/\d+:\d+:\d+/g, e));
    var f = (typeof e == "number" ? e : (g.getHours() * 60 + g.getMinutes()) * 60 + g.getSeconds()),
        q = MuEvents.sked,
        j = [];
    for (var a = 0; a < q.length; a++) {
        var n = q[a];
        for (var k = 2; k < q[a].length; k++) {
            var b = 0,
                p = q[a][k].split(":"),
                o = (p[0] * 60 + p[1] * 1) * 60,
                c = q[a][2].split(":");
            if (q[a].length - 1 == k && (o - f) < 0) b = 1;
            var r = b ? (1440 * 60 - f) + ((c[0] * 60 + c[1] * 1) * 60) : o - f;
            if (f <= o || b) {
                var l = Math.floor((r / 60) / 60),
                    l = l < 10 ? "0" + l : l,
                    d = Math.floor((r / 60) % 60),
                    d = d < 10 ? "0" + d : d,
                    u = r % 60,
                    u = u < 10 ? "0" + u : u;
                //j.push('<li class="events">' + (l == 0  && !q[a][1] && d < 5 ? '<a style="color: green;">Online</a> ' : '') +  '<b class="rightfloat">B[' + q[a][b ? 2 : k]  + "]</b><b> " + n[0] + 'C0</b><span><div class="rightfloat">D' + (l + ":" + d + ":" + u) + "D0</div>E"  +(MuEvents.text[q[a][1]][+((l == 0 &&  d <(q[a][1] ? 1 : 5)))])+ "E0</span>") ;
                j.push('<div class="box-cartel" style="width:25%;padding:6px;display: inline-block;"><div style="background: #000; border: solid 2px red; border-radius: 2px; min-height: 80px;"><table width="100%"><tr><td align="center" style="font-size: 14px;color: #f3bb00;font-weight: 600;">' + n[0] + '<sup style="font-size:8px;color:red;"> '  +(MuEvents.text[q[a][1]][+((l == 0 &&  d <(q[a][1] ? 1 : 5)))])+ '</sup></td></tr><tr><td style="font-size:10px;color:#fff;">&nbsp;&nbsp;Siguiente: &nbsp;&nbsp;<font style="color: #67f300;"> [' + q[a][b ? 2 : k]  + '] ' + (l == 0  && !q[a][1] && d < 5 ? '<a style="color: green;"> - Online</a> ' : '') +  '</font></td></tr><tr><td style="font-size:10px;color:#fff;">&nbsp;&nbsp;Faltan: &nbsp;&nbsp;<font style="color: #49b3f3;">' + (l + ":" + d + ":" + u) + '</font></td></tr></table></div></div>');
                break;
            };
        };
    };
    
    document.getElementById("events").innerHTML = j.join("");
    setTimeout(function () {
        MuEvents.init(f == 86400 ? 1 : ++f);
    }, 1000);
};


</script>
<div id="events">  </div>
<script>
    //put this script after div if u dont want error, should before </body> tag is best :D
    var cDate = new Date();
    var current_time_str = cDate.getHours()+":"+ cDate.getMinutes()+":"+ cDate.getSeconds();
    window.onload=MuEvents.init(current_time_str);
    </script>
<? } ?>