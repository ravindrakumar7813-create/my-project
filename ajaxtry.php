<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function viewlist(q)
        {
            xml=new XMLHttpRequest();
            xml.onreadystatechange=function()
            {
                document.getElementById("showlist").innerHTML=xml.responseText;
            }
            xml.open("GET","ajaxtrydata.php?title="+q,true);
        xml.send();
        }

    </script>
</head>
<body>
    <form>
        search book name:<input type="text" name="txt" onkeyup="viewlist(this.value)">
    </form>

    <div id="showlist"></div>
</body>
</html>