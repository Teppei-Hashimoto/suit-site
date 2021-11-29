// 選択肢削除ボタンに設定
// 選択肢の削除
let deleteChoiceElem = (e) => {
    let questionType =
        e.parentElement.parentElement.parentElement.querySelector(
            ".question-type"
        ).value;
    let questionNo =
        e.parentElement.parentElement.parentElement.querySelector(
            ".q-title"
        ).name;
    let ul = e.parentElement.parentElement;

    e.parentElement.remove();

    // 採番
    let choiceList = ul.getElementsByTagName("li");
    let choiceNum = ul.querySelector(".choice-num");
    choiceNum.value = choiceList.length;
    numberingChoiceList(choiceList, questionNo, questionType);
    // バリデーション
    validateAll();
};

// 追加ボタンに設定
// 選択肢の追加（ラジオボタン/チェックボックス）
let addChoiceElem = (e) => {
    createChoiceElem(e);

    let questionType = e.parentElement.querySelector(".question-type").value;
    let questionNo = e.parentElement.querySelector(".q-title").name;
    let choiceList = e.getElementsByTagName("li");
    let choiceNum = e.parentElement.querySelector(".choice-num");
    choiceNum.value = choiceList.length;

    // 採番
    numberingChoiceList(choiceList, questionNo, questionType);
    // バリデーション
    validateAll();
};

// 選択肢要素の作成
let createChoiceElem = (e) => {
    let questionType = e.parentElement.querySelector(".question-type").value;

    let li = document.createElement("li");
    li.classList.add("flex", "flex-row", "items-center", "mb-2");

    let choiceIcon = document.createElement("i");

    switch (questionType) {
        case "radio_button":
            choiceIcon.classList.add("far", "fa-circle", "text-lg", "mr-2");
            break;
        case "check_box":
            choiceIcon.classList.add("far", "fa-square", "text-lg", "mr-2");
            break;
        default:
            choiceIcon.classList.add("far", "fa-square", "text-lg", "mr-2");
            break;
    }

    let inputText = document.createElement("input");
    inputText.type = "text";
    inputText.classList.add("choice-text", "flex-grow", "textform");
    inputText.required = true;
    inputText.addEventListener("keyup", (e) => {
        validateAll();
    });

    let deleteButton = document.createElement("button");
    deleteButton.type = "button";
    deleteButton.classList.add("p-2", "text-lg");
    deleteButton.onclick = () => deleteChoiceElem(deleteButton);

    let removeIcon = document.createElement("i");
    removeIcon.classList.add("fas", "fa-times");

    deleteButton.appendChild(removeIcon);
    li.appendChild(choiceIcon);
    li.appendChild(inputText);
    li.appendChild(deleteButton);

    e.insertBefore(li, e.querySelector(".add-choice-button"));
};

// 選択肢に採番
let numberingChoiceList = (choiceList, questionNo, questionType) => {
    for (let i = 0; i < choiceList.length; i++) {
        let choiceItem = choiceList.item(i).querySelector(".choice-text");
        switch (questionType) {
            case "radio_button":
                choiceItem.name = `${questionNo}_rb${String(i + 1).padStart(
                    2,
                    "0"
                )}`;
                break;
            case "check_box":
                choiceItem.name = `${questionNo}_cb${String(i + 1).padStart(
                    2,
                    "0"
                )}`;
                break;
            default:
                break;
        }
    }
};
