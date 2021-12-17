<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/default.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="form-group">
            <input type="text" id="input1" class="form-control" placeholder="Search" value="">
        </div>
        <button id="btnSearch">Search</button>
        <button id="btnSearchBack">SearchBack</button>
        <hr>
        <hr>
    </div>
    <div class="container">
        <p id="p">
          
            {!! $law->content !!}

        </p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


    <script>
        var input = $("input[id='input1']").val()

        $('#btnSearch').click(function(e) {
            findString('Quốc');
        });
        $('#btnSearchBack').click(function(e) {
            findStringBack('Quốc');
        });

        var TRange = null;

        function findStringBack(str) {
            strFound = self.find(str, false, true);
        }

        function findString(str) {
            if (parseInt(navigator.appVersion) < 4) return;
            var strFound;
            if (window.find) {
                // CODE FOR BROWSERS THAT SUPPORT window.find
                // console.log('start');

                strFound = self.find(str);

                if (!strFound) {
                    strFound = self.find(str, 0, 1);
                    while (self.find(str, 0, 1)) continue;
                }
            } else if (navigator.appName.indexOf("Microsoft") != -1) {
                // EXPLORER-SPECIFIC CODE

                if (TRange != null) {
                    TRange.collapse(false);
                    strFound = TRange.findText(str);
                    if (strFound) TRange.select();
                }
                if (TRange == null || strFound == 0) {
                    TRange = self.document.body.createTextRange();
                    strFound = TRange.findText(str);
                    if (strFound) TRange.select();
                }
            } else if (navigator.appName == "Opera") {
                alert("Opera browsers not supported, sorry...")
                return;
            }
            if (!strFound) alert("String '" + str + "' not found!")
            return;
        }
    </script>
</body>

</html>
