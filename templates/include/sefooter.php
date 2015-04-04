<script src="scripts/se.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var content = $("#main-content");
        var searchString = <?php echo "\"" . $message . "\"" ?>;
        var tags = ( (<?php echo "\"" . $language . "\"" ?>).replace("(other)","") ).split("/");

        var config = {
            searchString: searchString,
            tags: tags
        };

        var answersFound = false;

        //THIS IS THE CALL TO StackExchange!
        SE.get(config, function(resp) {

            if (resp.items && resp.items.length > 0) {

                if(printResponse(resp)) {
                    appendSEMessage();
                }

            } else {
                //try without tags if no results
                //console.log("retrying SE search without tags...");
                config.tags = "";

                SE.get(config, function(resp) {
                    if (resp.items && resp.items.length > 0) {

                        if(printResponse(resp)) {
                            appendSEMessage();
                        }

                    } else {
                        //console.log("no answers found!");
                        //give up
                    }
                });
            }
        });

        function appendSEMessage() {
            content.after( $("<h3 class=\"col-md-10\">").html("While you're waiting, perhaps these resources might help?") );
        }

        //prints the response as Bootstrap media objects, after the 'main-content' div
        function printResponse(resp) {
            var answersPrinted = false;

            $.each(resp.items, function(i, item) {
                var mediaObject;

                if (item.is_answered) {
                    mediaObject = $("<div>").addClass("media").addClass("col-md-6").append(
                        $("<div>").addClass("media-left").append(
                            $("<a>").attr("href", item.link).attr("target","_blank").append(
                                $("<img>").attr("src", item.owner.profile_image).attr("width", "32px")
                            )
                        )
                    ).append(
                        $("<div>").addClass("media-body").html( (item.body).substring(0, 250) + "...").prepend(
                            $("<a>").attr("href", item.link).attr("target","_blank").append(
                                $("<h4>").addClass("media-heading").html(item.title)
                            )
                        )
                    );

                    content.after(mediaObject);
                    answersPrinted = true;
                } else {
                    //console.log("answer count too low", item);
                }

            });

            return answersPrinted;

        }
    });
</script>