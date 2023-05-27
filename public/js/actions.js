import axios from "../../node_modules/axios";

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
        .post("teacher/AddTextQuestion", {
            question_content: content,
        })
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {
            console.error(error);
        });
}
