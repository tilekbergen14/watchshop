const selectInput = document.getElementById("selectInput");
const resultInput = document.getElementById("resultInput");
const selectElement = document.querySelectorAll(".select-element");
const initialElements = selectElement;
const resultArray = resultInput.value !== '' ? resultInput.value.split(","): [];

selectInput.addEventListener("focusin", () => {
    const list = document.querySelector(".select-list");
    list.style.display = "block";
});

selectInput.addEventListener("input", (input) => {
    selectElement.forEach((e) => {
        if (!e.value.toLowerCase().match(input.target.value.toLowerCase())) {
            console.log(e.value.search(input.target.value));
            e.classList.add("hide");
        } else {
            e.classList.remove("hide");
        }
    });
});


let badges = document.querySelectorAll(".icon");

resultArray.forEach(value => {
    addBadge(value);
})
function element() {
    selectElement.forEach((e) => {
        e.addEventListener("click", () => {
            if (resultArray.includes(e.value)) {
                return 0;
            }
            resultArray.push(e.value);
            resultInput.value = resultArray;
            addBadge(e.value);
        });
        
        if(resultArray.includes(e.value)){
            e.classList = "select-element frozen";
        }
    });
}
element();

function addBadge(value){
    const resultBox = document.getElementById("result-box");
            const badge = document.createElement("div");
            badge.classList = "badge";
            badge.innerHTML = value;
            const icon = document.createElement("button");
            icon.classList = "icon";
            icon.onclick = () => deleteBadge(icon);
            icon.value = value;
            const line1 = document.createElement("div");
            line1.classList = "line1";
            const line2 = document.createElement("div");
            line2.classList = "line2";
            icon.appendChild(line1);
            icon.appendChild(line2);
            badge.appendChild(icon);
            resultBox.prepend(badge);
            badges = document.querySelectorAll(".icon");
}
function deleteBadge(e) {
    if (resultArray.includes(e.value)) {
        var index = resultArray.indexOf(e.value);
        if (index !== -1) {
            resultArray.splice(index, 1);
        }
        const parent = e.parentElement;
        parent.remove();
        resultInput.value = resultArray;
        selectElement.forEach((element) => {
            if (element.value === e.value) {
                element.classList = "select-element";
            }
        });
        element();
    }
}

function closeSelect() {
    const list = document.querySelector(".select-list");
    list.style.display = "none";
}
