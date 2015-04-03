<html>
<head>
    <title>StackExchange Help</title>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

</head>
<body>
    <ul id="response-list">

    </ul>
    <script type="text/javascript">

        function sendRequest() {
            var req = new XMLHttpRequest();
            var searchstring = encodeURIComponent("I cant get my linked list to work c++");
            var tags = encodeURIComponent("c++");
            var url = "https://api.stackexchange.com/2.2/search/advanced?pagesize=5&order=desc&sort=relevance&q=" + searchstring + "&tagged=" + tags + "&site=stackoverflow";


            req.onreadystatechange = function() {
                if (req.readyState != 4) {
                    return; //not ready yet
                }
                if (req.status != 200) {
                    console.log("AJAX Fail!");
                }

                var resp = JSON.parse( req.responseText );

                printResponse(resp);
            };

            req.open("GET", url, true);
            req.send();
        }


        function printResponse(resp) {
            var list = $("#response-list");

            if (resp.items) {
                $.each(resp.items, function(i, item) {
                    var link, listItem;

                    if (item.answer_count > 0) {
                        link = $("<a>", {
                            text: item.title,
                            href: item.link
                        });

                        listItem = $("<li>");

                        list.append(listItem).append(link);
                    } else {
                        console.log("answer count too low", item);
                    }


                })
            } else {
                console.log(resp);
            }
        }

        $(document).ready(function() {
            sendRequest();
        });
    </script>
</body>
</html>