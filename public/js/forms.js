$(document).ready(function () {
    $("#resultsDataTable").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
                extend: "pdf",
                title: "Customized PDF Title",
                filename: "customized_pdf_file_name",
                text: '<span class="button__text">PDF</span><span class="button__icon"> <i class="bi bi-filetype-pdf"></i> </span>',
            },
            {
                extend: "excel",
                title: "Customized EXCEL Title",
                filename: "customized_excel_file_name",
                text: '<span class="button__text">Excel</span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="svg"><path d="..."/></svg>',
            },
            {
                extend: "csv",
                filename: "customized_csv_file_name",
                text: '<span class="button__text">CSV</span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="svg"><path d="..."/></svg>',
            },
            {
                extend: "print",
                filename: "customized_csv_file_name",
                text: '<span class="button__text">Print</span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="svg"><path d="..."/></svg>',
            },
        ],
    });

    // -------------------------- start Text Question

    $(".add-text-qu").click(function () {
        var textQuestion = `
          <form method='POST' id="addTextQuestionForm" action="{{ route('teacher/addTextQuestion') }}">
            <div class='question'>
              <hr class="my-3" style="border-top: 1px dashed red;">
              <div class="mb-1">
                <div class="d-flex justify-content-between">
                  <label for="text-qu" class="form-label">Text Question:</label>
                  <button type="button" class="m-2 btn btn-danger delete-question"><i class="bi bi-trash"></i></button>
                </div>
                <textarea class="form-control" name="text-question" id="text-qu" rows="3" placeholder='ex: Why PHP is Trash?' required></textarea>
              </div>
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
          </form>`;

        // Clear the question-added-container
        $(".question-added-container").empty();

        $(".question-added-container").append(textQuestion);
        toggleSubmitButtonVisibility();
        textInputCounter++;
    });

    //--------------------------- submit the add text form
    $(document).on("submit", "#addTextQuestionForm", function (e) {
        e.preventDefault();

        var submitButton = $(this).find('[type="submit"]');
        var spinner = submitButton.next(".spinner-button");
        submitButton.addClass("d-none");
        spinner.removeClass("d-none");

        var formData = $(this).serialize();

        $.ajax({
            url: "/teacher/AddTextQuestion",
            type: "POST",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                submitButton.removeClass("d-none");
                spinner.addClass("d-none");
                Swal.fire(
                    "Success!",
                    "The Question added successfully",
                    "success"
                );
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                });

                submitButton.removeClass("d-none");
                spinner.addClass("d-none");
                console.error(xhr.responseText);
            },
        });
    });

    // -------------------------- start True False Question

    $(".add-true-false-qu").click(function () {
        var trueFalseQuestion = `
        <form method='POST' id="addTrueFalseQuestionForm" action="{{ route('teacher/addTrueFalseQuestion') }}">
            <div class='question'>
                <hr class="my-3" style="border-top: 1px dashed red;">
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label for="true-false-qu" class="form-label">True/False Question:</label>
                        <button type="button" class="m-2 btn btn-danger delete-question"><i class="bi bi-trash"></i></button>
                    </div>
                    <input type="text" class="form-control" id="true-false-qu" placeholder="ex: JavaScript is Object Oriented?" name="true-false-question" required>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="true-false-option" id="true-option" value="true">
                        <label class="form-check-label" for="true-option">
                            True
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="true-false-option" id="false-option" value="false">
                        <label class="form-check-label" for="false-option">
                            False
                        </label>
                    </div>
                </div>

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
        `;

        // Clear the question-added-container
        $(".question-added-container").empty();

        $(".question-added-container").append(trueFalseQuestion);
        toggleSubmitButtonVisibility();
    });

    $(document).on("submit", "#addTrueFalseQuestionForm", function (e) {
        e.preventDefault();

        var submitButton = $(this).find('[type="submit"]');
        var spinner = submitButton.next(".spinner-button");
        submitButton.addClass("d-none");
        spinner.removeClass("d-none");

        var formData = $(this).serialize();

        $.ajax({
            url: "/teacher/addTrueFalseQuestion",
            type: "POST",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                submitButton.removeClass("d-none");
                spinner.addClass("d-none");
                Swal.fire(
                    "Success!",
                    "The Question added successfully",
                    "success"
                );
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                });

                submitButton.removeClass("d-none");
                spinner.addClass("d-none");
                console.error(xhr.responseText);
            },
        });
    });

    // -------------------------- start multiple choice
    $(".add-multiple-choice-qu").click(function () {
        const multipleChoiceQuestion = createMultipleChoiceQuestion();
        $(".question-added-container").empty();
        $(".question-added-container").append(multipleChoiceQuestion);
        toggleSubmitButtonVisibility();
    });

    $(".question-added-container").on("click", ".add-choice", function () {
        const questionElement = $(this).closest(".question");
        const choiceRow = createMultipleChoiceRow();
        questionElement.find(".choices-container").append(choiceRow);
    });

    $(".question-added-container").on("change", ".correct-answer", function () {
        const isChecked = $(this).prop("checked");
        const choiceInput = $(this).closest(".col-6").find(".choice-input");

        if (isChecked) {
            choiceInput.attr("name", "correct-answer[]");
        }

        console.log(`Checked: ${isChecked}`);
    });

    function createMultipleChoiceQuestion() {
        const multipleChoiceQuestion = `
        <form method="POST" id="addMCQuestionForm" action="/teacher/addMCQuestion">
                <div class='question multiple-choice-container'>
                    <hr class="my-3" style="border-top: 1px dashed red;">
                    <div class="mb-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="multiple-choice-qu" class="form-label">Multiple Choice Question:</label>
                            <button type="button" class="m-2 btn btn-danger delete-question"><i class="bi bi-trash"></i></button>
                        </div>
                        <textarea class="form-control" id="multiple-choice-qu" rows="3" name="multiple-choice-question" placeholder='Enter your question' required></textarea>
                    </div>
                    <div class="container choices-container">
                        <div class='col-6'>
                            <input class="form-check-input correct-answer mt-2" type="checkbox" name="correct-answer[]">
                            <input type="text" class="form-control choice-input" placeholder="Choice" required name='multiple-choice-option[]'>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary add-choice"><i class="bi bi-plus"></i></button>

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
        `;

        return multipleChoiceQuestion;
    }

    function createMultipleChoiceRow() {
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
        const choiceRow = `
        <div class='col-6 d-flex'>
            <div class='flex-grow-1'>
            <input class="form-check-input correct-answer mt-2" type="checkbox" name="correct-answer[]">
            <input type="text" class="form-control choice-input" placeholder="Choice" required name='multiple-choice-option[]'>
            </div>
            <button type="button" class="ml-2 btn btn-danger delete-choice" style="width: 40px; height: 35px;">
                <i class="bi bi-trash"></i>
            </button>
        </div>
        `;

        return choiceRow;
    }

    $(document).on("submit", "#addMCQuestionForm", function (e) {
        e.preventDefault();

        var submitButton = $(this).find('[type="submit"]');
        var spinner = submitButton.next(".spinner-button");
        submitButton.addClass("d-none");
        spinner.removeClass("d-none");

        var formData = $(this).serialize();

        var numOptions = $(this).find(".choice-input").length;
        var numSelectedOptions = $(this).find(".correct-answer:checked").length;

        if (numOptions <= 1) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Please add at least two options",
            });

            submitButton.removeClass("d-none");
            spinner.addClass("d-none");
            return;
        }

        if (numSelectedOptions === 0) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Please select at least one correct answer",
            });
            submitButton.removeClass("d-none");
            spinner.addClass("d-none");
            return;
        }

        $.ajax({
            type: "POST",
            url: "/teacher/addMCQuestion",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                submitButton.removeClass("d-none");
                spinner.addClass("d-none");
                Swal.fire(
                    "Success!",
                    "The Question added successfully",
                    "success"
                );

                console.log(response);
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                });

                submitButton.removeClass("d-none");
                spinner.addClass("d-none");
                console.error(xhr.responseText);
            },
        });
    });

    // --------------------------------- end multiple choice

    // --------------------------------- start of the Single Choice section

    // ------------------------------------- end of Single Choice Section
    $(".question-added-container").on("click", ".delete-question", function () {
        console.log("Delete Clicked");
        $(this).closest(".question").remove();
        toggleSubmitButtonVisibility();
    });

    // --------------------------------- end of the Single Choice section
});
