var exampleResponse = {
    "items": [{
        "tags": ["c++", "c"],
        "owner": {
            "reputation": 37,
            "user_id": 359768,
            "user_type": "registered",
            "accept_rate": 77,
            "profile_image": "https://www.gravatar.com/avatar/217d8a17ecff9c468237d79ff2f2748c?s=128&d=identicon&r=PG",
            "display_name": "progster",
            "link": "http://stackoverflow.com/users/359768/progster"
        },
        "is_answered": true,
        "view_count": 274,
        "accepted_answer_id": 2984863,
        "answer_count": 6,
        "score": 0,
        "last_activity_date": 1275886649,
        "creation_date": 1275840083,
        "last_edit_date": 1275853084,
        "question_id": 2984842,
        "link": "http://stackoverflow.com/questions/2984842/linked-list-problem",
        "title": "linked list problem",
        "body": "<p>Delete every 't'th (t>1) node of a single linked list. In the resultant linked list, again delete 't'th node. Repeat this till only t-1 nodes remains.</p>\n\n<p>For this i have come up with:\nTraverse until you reach 't'th node, delete all the nodes till the end.\nIs there any efficient way other than this?. Can any one please help me out. Thanks.</p>\n"
    }, {
        "tags": ["c++", "c"],
        "owner": {
            "reputation": 6,
            "user_id": 802393,
            "user_type": "unregistered",
            "profile_image": "https://www.gravatar.com/avatar/2bb2d244fb6c9236a3d5b6fa0eb4036d?s=128&d=identicon&r=PG",
            "display_name": "James Perno",
            "link": "http://stackoverflow.com/users/802393/james-perno"
        },
        "is_answered": true,
        "view_count": 151,
        "answer_count": 6,
        "score": 1,
        "last_activity_date": 1308554428,
        "creation_date": 1308552408,
        "last_edit_date": 1308552858,
        "question_id": 6407699,
        "link": "http://stackoverflow.com/questions/6407699/linked-list-problem",
        "title": "Linked List Problem",
        "body": "<p>I'm reading the tutorials from <a href=\"http://www.cprogramming.com\" rel=\"nofollow\">cprogramming.com</a> and I'm a bit stuck with their linked list example. The code is below:</p>\n\n<pre><code>#include &lt;iostream&gt;\n\nusing namespace std;\n\nstruct node {\n  int x;\n  node *next;\n};\n\nint main() {\n  node *root;  \n  node *conductor;\n\n  root = new node;\n  root-&gt;next = 0;\n  (*root).x = 12;  // I was testing alt. syntax.\n  conductor = root;\n\n  if(conductor != 0) {\n    while(conductor-&gt;next != 0) {\n      cout &lt;&lt; conductor-&gt;x;\n      conductor = conductor-&gt;next;\n    }\n  }\n\n  conductor-&gt;next = new node;\n  conductor = conductor-&gt;next;\n  conductor-&gt;next = 0;\n  (*conductor).x = 42;\n\n  cout &lt;&lt; conductor-&gt;x;\n\n  return 0;\n}\n</code></pre>\n\n<p>In the example <code>root-&gt;next</code> is being set to <code>0</code>. <code>conductor</code> is then being set to the address of <code>root</code> which means the while loop will never be reached right?</p>\n\n<p>I don't understand the purpose of the example if it's not demonstrating the use of a linked list (i.e. adding more nodes, and traversing through them).</p>\n\n<p>Am I analyzing the code correctly?</p>\n"
    }, {
        "tags": ["c++", "c", "linked-list", "data-structures"],
        "owner": {
            "reputation": 1227,
            "user_id": 315594,
            "user_type": "registered",
            "accept_rate": 96,
            "profile_image": "https://www.gravatar.com/avatar/3a6de167609b3dc6c6048f0b6228b595?s=128&d=identicon&r=PG",
            "display_name": "Taimur Ajmal",
            "link": "http://stackoverflow.com/users/315594/taimur-ajmal"
        },
        "is_answered": true,
        "view_count": 2871,
        "accepted_answer_id": 3151289,
        "answer_count": 10,
        "score": 7,
        "last_activity_date": 1418380610,
        "creation_date": 1277914961,
        "last_edit_date": 1277918254,
        "question_id": 3151276,
        "link": "http://stackoverflow.com/questions/3151276/cyclical-linked-list-algorithm",
        "title": "Cyclical Linked List Algorithm",
        "body": "<p>I have been asked recently in a job interview to develop an algorithm that can determine whether a linked list is cyclical. As it's a linked list, we don't know its size. It's a doubly-linked list with each node having 'next' and 'previous' pointers. A node can be connected to any other node or it can be connected to itself. </p>\n\n<p>The only solution that I came up at that time was to pick a node and check it with all the nodes of the linked list. The interviewer obviously didn't like the idea as it is not an optimal solution. What would be a better approach?</p>\n"
    }, {
        "tags": ["c++", "c", "algorithm"],
        "owner": {
            "reputation": 6,
            "user_id": 427519,
            "user_type": "unregistered",
            "profile_image": "https://www.gravatar.com/avatar/6703adb5ce621b0faa90222740d51784?s=128&d=identicon&r=PG",
            "display_name": "James",
            "link": "http://stackoverflow.com/users/427519/james"
        },
        "is_answered": true,
        "view_count": 303,
        "answer_count": 4,
        "score": 1,
        "last_activity_date": 1286889810,
        "creation_date": 1282464743,
        "last_edit_date": 1282465330,
        "question_id": 3540694,
        "link": "http://stackoverflow.com/questions/3540694/linked-list-of-intervals",
        "title": "Linked List of Intervals",
        "body": "<p>I have the following two questions.</p>\n\n<ol>\n<li><p>I'm aware of the concept of a linked\nlist. What is a linked list of\nintervals?</p></li>\n<li><p>I need to store a very huge (more than 100 bits) number in C/C++ and perform bitwise operations on it. Without using any big number library, what would be the best data structure to handle this scenario ?</p></li>\n</ol>\n\n<p>Thank You</p>\n"
    }, {
        "tags": ["c++", "c"],
        "owner": {
            "reputation": 1273,
            "user_id": 397049,
            "user_type": "registered",
            "accept_rate": 58,
            "profile_image": "https://www.gravatar.com/avatar/c3c7d06293bf8b0a60cd1be60b45af16?s=128&d=identicon&r=PG&f=1",
            "display_name": "Flash",
            "link": "http://stackoverflow.com/users/397049/flash"
        },
        "is_answered": true,
        "view_count": 1522,
        "accepted_answer_id": 4388169,
        "answer_count": 6,
        "score": 0,
        "last_activity_date": 1291821208,
        "creation_date": 1291811895,
        "question_id": 4387500,
        "link": "http://stackoverflow.com/questions/4387500/deleting-in-a-linked-list",
        "title": "Deleting in a linked list",
        "body": "<p>Given only a pointer to the node to be deleted , how do we delete the node in the linked list...?</p>\n"
    }], "has_more": true, "quota_max": 10000, "quota_remaining": 9927
};


var SE = (function($) {

    var module = {};

    var DEBUG = false;

    function _log(msg, obj) {
        if (DEBUG) {
            console.log("SE::" + msg);
            if (obj) {
                console.log(obj);
            }
        }
    }

    /**
     * Sends AJAX request to StackExchange
     * @param config {searchString, site, tags ("tag1;tag2;etc"), filters(same)}
     * @param callback
     */
    function sendRequest(config, callback) {
        _log("sendRequest()", config);

        var req = new XMLHttpRequest();

        var KEY = "JoyuTTl9LLyttWQdC*HG)A((";

        var searchString = encodeURIComponent( (config.searchString || "") );
        var site = config.site || "stackoverflow";
        var tags = encodeURIComponent( (typeof config.tags == "object" ? config.tags.join(";") : config.tags) || "");
        var filters = encodeURIComponent(config.filters || "withbody");


        var options = "key=" + KEY + "&pagesize=5&order=desc&sort=relevance&q=" + searchString + "&tagged=" + tags + "&site=" + site + "&filter=" + filters;

        var url = "https://api.stackexchange.com/2.2/search/advanced?" + options;

        req.onreadystatechange = function() {
            _log("onReadyStateChange() (" + req.readyState + ")");
            if (req.readyState != 4) {
                return; //not ready yet
            }
            if (req.status != 200) {
                _log("AJAX Fail!");
            }

            var resp = JSON.parse( req.responseText );

            callback(resp);
        };

        if (searchString) {
            _log("Sending AJAX request: '" + url + "'");
            req.open("GET", url, true);
            req.send();
        } else if (typeof callback == "function") {
            _log("ERROR: invalid arguments");
            callback({
                'error': 'malformed request!',
                'data': config
            });
        } else {
            //do nothing; stupid call
        }
    }

    module.get = sendRequest;

    return module;
}(jQuery));