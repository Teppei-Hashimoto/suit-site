const questionList = document.getElementById("question-list");
const questionNum = document.getElementById("q_num");

// 質問の削除ボタンに設定
// 質問の削除
let deleteQuestionElem = (e) => {
    e.parentElement.parentElement.remove();
    // 採番
    numberingQuestionList();
};

// 質問の追加ボタンに設定
// 質問の追加
let addQuestionElem = (questionTypeVal) => {
    let container = document.createElement("div");
    container.classList.add(
        "w-full",
        "bg-white",
        "p-6",
        "mt-6",
        "rounded-lg",
        "flex",
        "flex-col"
    );

    let titleLabel = document.createElement("label");
    container.appendChild(titleLabel);
    titleLabel.classList.add("q-title-label", "font-bold");

    let title = document.createElement("input");
    container.appendChild(title);
    title.type = "text";
    title.classList.add(
        "q-title",
        "textform",
        "text-xl",
        "mb-6",
        "px-4",
        "py-3"
    );

    let questionType = document.createElement("input");
    container.appendChild(questionType);
    questionType.type = "hidden";
    questionType.classList.add("question-type");
    questionType.value = questionTypeVal;

    // 質問タイプごとの要素
    switch (questionTypeVal) {
        case "free_form":
            titleLabel.textContent = "記述式の質問";
            break;

        case "radio_button":
            titleLabel.textContent = "ラジオボタンの質問";
            break;

        case "check_box":
            titleLabel.textContent = "チェックボックスの質問";
            break;

        default:
            break;
    }

    if (
        (questionTypeVal === "radio_button") |
        (questionTypeVal === "check_box")
    ) {
        let ul = document.createElement("ul");
        container.appendChild(ul);
        ul.classList.add("choice-list");

        let addChoiceButton = document.createElement("button");
        ul.appendChild(addChoiceButton);
        addChoiceButton.type = "button";
        addChoiceButton.classList.add(
            "add-choice-button",
            "inline-block",
            "py-1",
            "px-4",
            "border-2",
            "border-gray-400",
            "rounded-full"
        );
        addChoiceButton.textContent = "追加";
        addChoiceButton.onclick = () => addChoiceElem(ul);

        let choiceNum = document.createElement("input");
        ul.appendChild(choiceNum);
        choiceNum.type = "hidden";
        choiceNum.value = 1;
        choiceNum.classList.add("choice-num");

        createChoiceElem(ul);
    }

    // 共通項目
    let commonParts = document.createElement("div");
    container.appendChild(commonParts);
    questionList.appendChild(container);
    commonParts.classList.add("flex", "flex-row", "items-center");

    let flexGrow = document.createElement("div");
    commonParts.appendChild(flexGrow);
    flexGrow.classList.add("flex-grow");

    let requiredLabel = document.createElement("label");
    commonParts.appendChild(requiredLabel);
    requiredLabel.classList.add("q-required-label", "mr-1", "cursor-pointer");
    requiredLabel.textContent = "必須";

    let required = document.createElement("input");
    commonParts.appendChild(required);
    required.type = "checkbox";
    required.classList.add("q-required", "mr-4", "cursor-pointer");

    let deleteButton = document.createElement("button");
    commonParts.appendChild(deleteButton);
    deleteButton.type = "button";
    deleteButton.classList.add("p-2", "text-lg");
    deleteButton.onclick = () => deleteQuestionElem(deleteButton);

    let deleteIcon = document.createElement("i");
    deleteButton.appendChild(deleteIcon);
    deleteIcon.classList.add("far", "fa-trash-alt");

    // 採番
    numberingQuestionList();
};

// 質問全体の採番
let numberingQuestionList = () => {
    // 質問数の更新
    questionNum.value = questionList.children.length;

    // 採番処理
    for (let i = 0; i < questionList.children.length; i++) {
        let questionItem = questionList.children.item(i);
        let questionNo = `q${String(i + 1).padStart(2, "0")}`;

        let titleLabel = questionItem.querySelector(".q-title-label");
        titleLabel.htmlFor = questionNo;

        let title = questionItem.querySelector(".q-title");
        title.name = questionNo;
        title.id = questionNo;

        let questionType = questionItem.querySelector(".question-type");
        let questionTypeVal = questionType.value;
        questionType.name = `${questionNo}_type`;

        let requiredLabel = questionItem.querySelector(".q-required-label");
        requiredLabel.htmlFor = `${questionNo}_required`;

        let required = questionItem.querySelector(".q-required");
        required.name = `${questionNo}_required`;

        if (
            (questionTypeVal === "radio_button") |
            (questionTypeVal === "check_box")
        ) {
            let choiceList = questionItem
                .querySelector(".choice-list")
                .getElementsByTagName("li");

            let choiceNum = questionItem.querySelector(".choice-num");
            choiceNum.value = choiceList.length;
            choiceNum.name = `${questionNo}_choice_num`;

            numberingChoiceList(choiceList, questionNo, questionTypeVal);
        }
    }
};
