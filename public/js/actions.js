const select = (el, all = false) => {
    el = el.trim();
    if (all) {
        return [...document.querySelectorAll(el)];
    } else {
        return document.querySelector(el);
    }
};

if (select(".quill-editor-full")) {
    var quill = new Quill(".quill-editor-full", {
        modules: {
            toolbar: [
                [
                    {
                        font: [],
                    },
                    {
                        size: [],
                    },
                ],
                ["bold", "italic", "underline", "strike"],
                [
                    {
                        color: [],
                    },
                    {
                        background: [],
                    },
                ],
                [
                    {
                        script: "super",
                    },
                    {
                        script: "sub",
                    },
                ],
                [
                    {
                        list: "ordered",
                    },
                    {
                        list: "bullet",
                    },
                    {
                        indent: "-1",
                    },
                    {
                        indent: "+1",
                    },
                ],
                [
                    "direction",
                    {
                        align: [],
                    },
                ],
                ["link", "image", "video"],
                ["clean"],
            ],
        },
        theme: "snow",
    });

    // handling adding text question to db
    var addTextQuestionBtn = document.querySelector("#submit-btn");
    addTextQuestionBtn.addEventListener("click", function () {
        var questionContent = quill.root.innerHTML;
        saveQuestion(questionContent);
    });
}

function saveQuestion(content) {
    axios
        .post("/teacher/AddTextQuestion", {
            question_content: content,
        })
        .then(function (response) {
            // Extract the redirect URL from the response
            var redirectUrl = response.data.redirect_url;

            // Redirect to the URL on the client-side
            window.location.href = redirectUrl;
        })
        .catch(function (error) {
            console.error(error);
        });
}
