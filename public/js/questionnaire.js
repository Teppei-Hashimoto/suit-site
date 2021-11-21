let removeChoiceElem = (e) => {
    e.parentElement.remove();
};

let removeQuestionElem = (e) => {
    e.parentElement.parentElement.remove();
};

let addChoiceElem = (e) => {
    let questionType =
        e.parentElement.parentElement.querySelector(".question-type").value;
    let questionNo =
        e.parentElement.parentElement.querySelector(".q-title").name;
    console.log(questionNo);

    let li = document.createElement("li");
    li.classList.add("flex", "flex-row", "items-center", "mb-2");

    let iconChoice = document.createElement("i");

    switch (questionType) {
        case "rb":
            iconChoice.classList.add("far", "fa-circle", "text-lg", "mr-2");
            break;
        case "cb":
            iconChoice.classList.add("far", "fa-square", "text-lg", "mr-2");
            break;
        default:
            iconChoice.classList.add("far", "fa-square", "text-lg", "mr-2");
            break;
    }

    let inputText = document.createElement("input");
    inputText.type = "text";
    inputText.classList.add("choice-text", "flex-grow", "textform");

    let removeButton = document.createElement("button");
    removeButton.type = "button";
    removeButton.classList.add("p-2", "text-lg");
    removeButton.onclick = () => removeChoiceElem(removeButton);

    let iconRemove = document.createElement("i");
    iconRemove.classList.add("fas", "fa-times");

    removeButton.appendChild(iconRemove);
    li.appendChild(iconChoice);
    li.appendChild(inputText);
    li.appendChild(removeButton);

    e.parentNode.insertBefore(li, e);

    // idの採番
    let choiceLi = e.parentElement.getElementsByTagName("li");
    for (let i = 0; i < choiceLi.length; i++) {
        let tmpElem = choiceLi.item(i).querySelector(".choice-text");
        tmpElem.name = `${questionNo}-${questionType}${String(i + 1).padStart(
            2,
            "0"
        )}`;
        console.log(tmpElem.name);
    }
};
