$(document).ready(function () {
    $(".add-one-choice-qu").click(function () {
        const singleChoiceQuestionElement = createSingleChoiceQuestion();
        $(".question-added-container").empty();
        $(".question-added-container").append(singleChoiceQuestionElement);
        toggleSubmitButtonVisibility();
    });

    $(".question-added-container").on(
        "click",
        ".add-choice-oneChoice",
        function () {
            const questionElement = $(this).closest(".question");
            const choiceRow = createOneChoiceRow(questionElement);
            questionElement.find(".choices-container").append(choiceRow);
        }
    );

    $(".question-added-container").on("change", ".choice-check", function () {
        const questionContainer = $(this).closest(".question");
        const choiceInputs = questionContainer.find(".choice-check");
        const choiceInput = $(this).next(".choice-input");

        choiceInputs
            .closest(".one-choice-qu-option")
            .find(".choice-input")
            .removeClass("choice-option-correct");

        const name = `choice-option[]`;
        const correctName = `correct-option[]`;

        if ($(this).prop("checked")) {
            choiceInputs
                .not(this)
                .prop("checked", false)
                .closest(".one-choice-qu-option")
                .find(".choice-input")
                .attr("name", name);

            choiceInput.attr("name", correctName);
            choiceInput.addClass("choice-option-correct");
        } else {
            choiceInput.attr("name", name);
            choiceInput.removeClass("choice-option-correct");
        }
    });

    $(".question-added-container").on("click", ".delete-choice", function () {
        $(this).parent().remove();
    });

    function createOneChoiceRow(questionElement) {
        const optionsCount = questionElement.find(".choice-check").length;

        if (optionsCount >= 5) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "You have reached the maximum number of options.",
            });
            return;
        }

        const choiceRow = $(`
        <div class='col-6 one-choice-qu-option'>
          <div class="d-flex align-items-center">
            <input class="form-check-input choice-check mb-3" type="radio">
            <input type="text" class="form-control choice-input" placeholder="Choice" required name="choice-option[]">
            <button type="button" class="ml-2 btn btn-danger delete-choice" style="width: 40px; height: 35px;"><i class="bi bi-trash"></i></button>
          </div>
        </div>
      `);

        return choiceRow;
    }

    function createSingleChoiceQuestion() {
        const maxOptions = 5;
        const currentOptions = $(".choice-input").length;

        if (currentOptions >= maxOptions) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "You have reached the maximum number of options.",
            });
            return;
        }

        const singleChoiceQuestionElement = $(`
        <form method="POST" id="addQuestionSC">
          <div class='question one-choice-container'>
            <hr class="my-3" style="border-top: 1px dashed red;">
            <div class="mb-1">
              <div class="d-flex justify-content-between align-items-center">
                <label for="single-choice-qu" class="form-label">Single Choice Question:</label>
                <button type="button" class="m-2 btn btn-danger delete-question"><i class="bi bi-trash"></i></button>
              </div>
              <textarea class="form-control" name="s-options-question[]" id="single-choice-qu" rows="3" placeholder='Enter your question' required></textarea>
            </div>
            <div class="container choices-container">
              <div class='col-6 one-choice-qu-option'>
                <div class="d-flex align-items-center">
                  <input class="form-check-input choice-check mb-3" type="radio">
                  <input type="text" class="form-control choice-input" placeholder="Choice" required name="choice-option[]">
                  <button type="button" class="ml-2 btn btn-danger delete-choice" style="width: 40px; height: 35px;"><i class="bi bi-trash"></i></button>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-secondary add-choice-oneChoice"><i class="bi bi-plus"></i></button>
            <div class='text-center'>
              <button type="submit" class="btn btn-primary" id="save-question-btn">
                <i class="bi bi-bookmark-check mr-2"></i>Save Question
              </button>
              <button class="d-none btn btn-primary spinner-button" type="button" disabled>
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                Loading...
              </button>
            </div>
          </div>
        </form>
      `);

        return singleChoiceQuestionElement;
    }

    $(document).on("submit", "#addQuestionSC", function (event) {
        event.preventDefault();

        const formData = $(this).serialize();

        $("#save-question-btn").prop("disabled", true).addClass("d-none");
        $(".spinner-button").removeClass("d-none");

        var numOptions = $(this).find(".choice-input").length;

        if (numOptions <= 1) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Please add at least two options",
            });

            $("#save-question-btn").removeClass("d-none");
            $(".spinner-button").addClass("d-none");
            return;
        }

        axios
            .post("/teacher/addSCQuestion", formData, {
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            })
            .then(function (response) {
                console.log(response.data);
                console.log("Question saved successfully");
                $("#addSCQuestionForm")[0].reset();
                $(".spinner-button").addClass("d-none");
                $("#save-question-btn")
                    .prop("disabled", false)
                    .removeClass("d-none");
                Swal.fire({
                    icon: "success",
                    title: "Great",
                    text: "question added",
                });
            })
            .catch(function (error) {
                console.error("Failed to save the question:", error);

                $(".spinner-button").addClass("d-none");
                $("#save-question-btn")
                    .prop("disabled", false)
                    .removeClass("d-none");
            });
    });

    //--------------------------------------question actions
    $(".delete-main-question-btn").on("click", function (e) {
        e.preventDefault();
        var questionId = $(this).data("question-id");
        var questionRow = $("#question-row-" + questionId);
        var deleteButton = $(this);
        var deleteIcon = deleteButton.find(".delete-icon");
        var deleteSpinner = deleteButton.find(".delete-spinner");

        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                deleteQuestion(
                    questionId,
                    questionRow,
                    deleteIcon,
                    deleteSpinner
                );
            }
        });
    });

    function deleteQuestion(
        questionId,
        questionRow,
        deleteIcon,
        deleteSpinner
    ) {
        $.ajax({
            url: "/teacher/deleteQuestion/" + questionId,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            beforeSend: function () {
                deleteIcon.addClass("d-none");
                deleteSpinner.removeClass("d-none");
            },
            success: function (response) {
                console.log("Question deleted successfully");
                questionRow.remove();
            },
            error: function (xhr, status, error) {
                console.log("Failed to delete the question:", error);
            },
            complete: function () {
                deleteIcon.removeClass("d-none");
                deleteSpinner.addClass("d-none");
            },
        });
    }
});
