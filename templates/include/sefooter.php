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

        //THIS IS THE CALL TO StackExchange!
        SE.get(config, printResponse);


        //prints the response as Bootstrap media objects, after the 'main-content' div
        function printResponse(resp) {
            if (resp.items) {


                $.each(resp.items, function(i, item) {
                    var mediaObject;

                    /*
                     var divMedia = $("<div>").addClass("media");
                     var divMediaLeft = $("<div>").addClass("media-left");
                     var linky = $("<a>").attr("href", item.link);
                     var imgMedia = $("<img>").attr("src", item.owner.profile_image);
                     var divMediaBody = $("<div>").addClass("media-body").html( (item.body).substring(0, 250) + "..." );
                     var h4mediaHeading = $("<h4>").addClass("media-heading").html(item.title);
                     */


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
                        )

                        content.after(mediaObject);
                    } else {
                        console.log("answer count too low", item);
                    }

                });

                content.after( $("<h3 class=\"col-md-10\">").html("While you're waiting, perhaps these resources might help?") );
            } else {
                console.log(resp);
            }
        }
    });
</script>