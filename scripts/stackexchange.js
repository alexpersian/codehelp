var exampleResponse = {
    "items": [{
        "tags": ["java", "c++", "performance", "optimization"],
        "owner": {
            "reputation": 174228,
            "user_id": 87234,
            "user_type": "registered",
            "accept_rate": 94,
            "profile_image": "http://i.stack.imgur.com/FkjBe.png?s=128&g=1",
            "display_name": "GManNickG",
            "link": "http://stackoverflow.com/users/87234/gmannickg"
        },
        "is_answered": true,
        "view_count": 567788,
        "protected_date": 1399067470,
        "accepted_answer_id": 11227902,
        "answer_count": 9,
        "score": 10009,
        "last_activity_date": 1423139986,
        "creation_date": 1340805096,
        "last_edit_date": 1419003549,
        "question_id": 11227809,
        "link": "http://stackoverflow.com/questions/11227809/why-is-processing-a-sorted-array-faster-than-an-unsorted-array",
        "title": "Why is processing a sorted array faster than an unsorted array?",
        "body": "<p>Here is a piece of <strong>C++</strong> code that seems very peculiar. For some strange reason, sorting the data miraculously makes the code almost six times faster.</p>\n\n<pre class=\"lang-cpp prettyprint-override\"><code>#include &lt;algorithm&gt;\n#include &lt;ctime&gt;\n#include &lt;iostream&gt;\n\nint main()\n{\n    // Generate data\n    const unsigned arraySize = 32768;\n    int data[arraySize];\n\n    for (unsigned c = 0; c &lt; arraySize; ++c)\n        data[c] = std::rand() % 256;\n\n    // !!! With this, the next loop runs faster\n    std::sort(data, data + arraySize);\n\n    // Test\n    clock_t start = clock();\n    long long sum = 0;\n\n    for (unsigned i = 0; i &lt; 100000; ++i)\n    {\n        // Primary loop\n        for (unsigned c = 0; c &lt; arraySize; ++c)\n        {\n            if (data[c] &gt;= 128)\n                sum += data[c];\n        }\n    }\n\n    double elapsedTime = static_cast&lt;double&gt;(clock() - start) / CLOCKS_PER_SEC;\n\n    std::cout &lt;&lt; elapsedTime &lt;&lt; std::endl;\n    std::cout &lt;&lt; \"sum = \" &lt;&lt; sum &lt;&lt; std::endl;\n}\n</code></pre>\n\n<ul>\n<li>Without <code>std::sort(data, data + arraySize);</code>, the code runs in <strong>11.54</strong> seconds.</li>\n<li>With the sorted data, the code runs in <strong>1.93</strong> seconds.</li>\n</ul>\n\n<p>Initially, I thought this might be just a language or compiler anomaly. So I tried it in <strong>Java</strong>.</p>\n\n<pre class=\"lang-java prettyprint-override\"><code>import java.util.Arrays;\nimport java.util.Random;\n\npublic class Main\n{\n    public static void main(String[] args)\n    {\n        // Generate data\n        int arraySize = 32768;\n        int data[] = new int[arraySize];\n\n        Random rnd = new Random(0);\n        for (int c = 0; c &lt; arraySize; ++c)\n            data[c] = rnd.nextInt() % 256;\n\n        // !!! With this, the next loop runs faster\n        Arrays.sort(data);\n\n        // Test\n        long start = System.nanoTime();\n        long sum = 0;\n\n        for (int i = 0; i &lt; 100000; ++i)\n        {\n            // Primary loop\n            for (int c = 0; c &lt; arraySize; ++c)\n            {\n                if (data[c] &gt;= 128)\n                    sum += data[c];\n            }\n        }\n\n        System.out.println((System.nanoTime() - start) / 1000000000.0);\n        System.out.println(\"sum = \" + sum);\n    }\n}\n</code></pre>\n\n<p>With a somewhat similar, but less extreme result.</p>\n\n<hr>\n\n<p>My first thought was that sorting brings the data into the cache, but my next thought was how silly that is, because the array was just generated.</p>\n\n<ul>\n<li>What is going on?</li>\n<li>Why is a sorted array faster than an unsorted array?</li>\n<li>The code is summing up some independent terms, and the order should not matter.</li>\n</ul>\n"
    }, {
        "tags": ["git", "git-commit", "git-rewrite-history", "amend"],
        "owner": {
            "reputation": 45782,
            "user_id": 7473,
            "user_type": "registered",
            "accept_rate": 56,
            "profile_image": "https://www.gravatar.com/avatar/9218dd1115bc620ec1ea79fd0368da8e?s=128&d=identicon&r=PG",
            "display_name": "Laurie Young",
            "link": "http://stackoverflow.com/users/7473/laurie-young"
        },
        "is_answered": true,
        "view_count": 1108639,
        "protected_date": 1364934455,
        "accepted_answer_id": 179147,
        "answer_count": 29,
        "score": 6951,
        "last_activity_date": 1426243130,
        "creation_date": 1223394287,
        "last_edit_date": 1424722136,
        "question_id": 179123,
        "link": "http://stackoverflow.com/questions/179123/edit-an-incorrect-commit-message-in-git",
        "title": "Edit an incorrect commit message in Git",
        "body": "<p>I wrote the wrong thing in a commit message.</p>\n\n<p>How can I change the message? The commit has not been pushed yet.</p>\n"
    }, {
        "tags": ["git", "git-commit", "git-reset"],
        "owner": {
            "reputation": 21913,
            "user_id": 89904,
            "user_type": "registered",
            "accept_rate": 66,
            "profile_image": "https://www.gravatar.com/avatar/4fef65cead13e5d519f6bce3c501a537?s=128&d=identicon&r=PG",
            "display_name": "Hamza Yerlikaya",
            "link": "http://stackoverflow.com/users/89904/hamza-yerlikaya"
        },
        "is_answered": true,
        "view_count": 1911083,
        "protected_date": 1370840488,
        "accepted_answer_id": 927386,
        "answer_count": 29,
        "community_owned_date": 1363428511,
        "score": 6168,
        "last_activity_date": 1426888241,
        "creation_date": 1243620554,
        "last_edit_date": 1426888241,
        "question_id": 927358,
        "link": "http://stackoverflow.com/questions/927358/how-to-undo-the-last-commit",
        "title": "How to undo the last commit?",
        "body": "<p>I committed a directory containing <code>.class</code> files instead of a directory containing <code>.java</code> files to <a href=\"http://git-scm.com/\">git</a>.</p>\n\n<p>How can I undo this?</p>\n"
    }, {
        "tags": ["json", "content-type"],
        "owner": {
            "reputation": 71202,
            "user_id": 12870,
            "user_type": "registered",
            "accept_rate": 66,
            "profile_image": "https://www.gravatar.com/avatar/f0af40756420859b5b63cbceb6d30505?s=128&d=identicon&r=PG",
            "display_name": "Oli",
            "link": "http://stackoverflow.com/users/12870/oli"
        },
        "is_answered": true,
        "view_count": 999155,
        "protected_date": 1299606399,
        "accepted_answer_id": 477819,
        "answer_count": 26,
        "score": 4989,
        "last_activity_date": 1427904824,
        "creation_date": 1232897119,
        "last_edit_date": 1373490684,
        "question_id": 477816,
        "link": "http://stackoverflow.com/questions/477816/what-is-the-correct-json-content-type",
        "title": "What is the correct JSON content type?",
        "body": "<p>I've been messing around with <a href=\"http://en.wikipedia.org/wiki/JSON\">JSON</a> for some time, just pushing it out as text and it hasn't hurt anybody (that I know of), but I'd like to start doing things properly.</p>\n\n<p>I have seen <em>so</em> many purported \"standards\" for the JSON content type:</p>\n\n<pre><code>application/json\napplication/x-javascript\ntext/javascript\ntext/x-javascript\ntext/x-json\n</code></pre>\n\n<p>But which is correct, or best? I gather that there are security and browser support issues varying between them.</p>\n\n<p>I know there's a similar question, <em><a href=\"http://stackoverflow.com/questions/404470/what-mime-type-if-json-is-being-returned-by-a-rest-api\">What MIME type if JSON is being returned by a REST API?</a></em>, but I'd like a slightly more targeted answer.</p>\n"
    }, {
        "tags": ["git", "github", "git-branch", "git-remote"],
        "owner": {
            "reputation": 89438,
            "user_id": 95592,
            "user_type": "registered",
            "accept_rate": 78,
            "profile_image": "http://i.stack.imgur.com/utY5u.jpg?s=128&g=1",
            "display_name": "Matthew Rankin",
            "link": "http://stackoverflow.com/users/95592/matthew-rankin"
        },
        "is_answered": true,
        "view_count": 1650118,
        "protected_date": 1358718496,
        "accepted_answer_id": 2003515,
        "answer_count": 18,
        "score": 4494,
        "last_activity_date": 1425355479,
        "creation_date": 1262653935,
        "last_edit_date": 1414759897,
        "question_id": 2003505,
        "link": "http://stackoverflow.com/questions/2003505/delete-a-git-branch-both-locally-and-remotely",
        "title": "Delete a Git branch both locally and remotely",
        "body": "<p>I want to delete a branch both locally and on my remote project fork on GitHub.</p>\n\n<h3>Successfully Deleted Local Branch</h3>\n\n<pre><code>$ git branch -D bugfix\nDeleted branch bugfix (was 2a14ef7).\n</code></pre>\n\n<h3>Attempts to Delete Remote Branch</h3>\n\n<pre><code>$ git branch -d remotes/origin/bugfix\nerror: branch 'remotes/origin/bugfix' not found.\n\n$ git branch -d origin/bugfix\nerror: branch 'origin/bugfix' not found.\n\n$ git branch -rd origin/bugfix\nDeleted remote branch origin/bugfix (was 2a14ef7).\n\n$ git push\nEverything up-to-date\n\n$ git pull\nFrom github.com:gituser/gitproject\n* [new branch] bugfix -&gt; origin/bugfix\nAlready up-to-date.\n</code></pre>\n\n<p>What do I need to do differently to successfully delete the\n<code>remotes/origin/bugfix</code> branch both locally and on GitHub?</p>\n"
    }], "has_more": true, "quota_max": 300, "quota_remaining": 251
};


var SE = (function($) {
    /**
     * Sends AJAX request to StackExchange
     * @param config {searchString, site, tags ("tag1;tag2;etc"), filters(same)}
     * @param callback
     */
    function sendRequest(config, callback) {
        var req = new XMLHttpRequest();

        var searchString = encodeURIComponent( (config.searchString || "") );
        var site = config.site || "stackoverflow";
        var tags = encodeURIComponent(config.tags || "");
        var filters = encodeURIComponent(config.filters || "withbody");

        var options = "pagesize=5&order=desc&sort=relevance&q=" + searchString + "&tagged=" + tags + "&site=" + site + "&filter=" + filters;

        var url = "https://api.stackexchange.com/2.2/search/advanced?" + options;

        req.onreadystatechange = function() {
            if (req.readyState != 4) {
                return; //not ready yet
            }
            if (req.status != 200) {
                console.log("AJAX Fail!");
            }

            var resp = JSON.parse( req.responseText );

            callback(resp);
        };

        if (searchString && tags) {
            req.open("GET", url, true);
            req.send();
        } else if (typeof callback == "function") {
            callback({
                'error': 'malformed request!',
                'data': 'config'
            });
        } else {
            //do nothing; stupid call
        }
    }

    /*

    */

    SE.get = sendRequest;
}(jQuery));



$(document).ready(function() {

});