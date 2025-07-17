"use strict";

let UserDataId;

const init = function () {
    fetch("/api/messages")
        .then((res) => {
            if (res.ok) {
                container.innerHTML = "";
                return res.json();
            } else {
                throw new Error("HTTP error! status: " + res.status);
            }
        })
        .then((data) => {
            data.forEach((msg) => {
                commentComponent(msg);
            });
        })
        .catch((error) => {
            console.error("取得資料失敗:", error);
        });
};

init();

//顯示資料庫裡所有留言
const container = document.getElementById("messages");
const commentComponent = function (msg) {
    const divBox = document.createElement("div");
    divBox.classList.add("userContent");

    divBox.innerHTML = `   
            <div class="userContent__message">
                <div>文章：${msg.content}</div>
                <div>姓名：${msg.name}</div>
                <div>發文時間：${msg.created_at.split(" ")[0]}</div>
            </div>
            <div class="userContent__option">            
                <button class = "deleteComment">
                    <i class="fa-solid fa-trash"></i>
                    <div class="hint">刪除</div>
                </button>
                <button class = "UpdateBtn">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <div class="hint">修改</div>
                </button>
            </div>

        `;

    //刪除監聽
    const deleteBtn = divBox.querySelector(".deleteComment");
    deleteBtn.addEventListener("click", () => {
        fetch(`/api/messages/delete/${msg.id}`, { method: "DELETE" })
            .then((res) => {
                if (res.ok) {
                    return res.json();
                } else {
                    throw new Error("HTTP error! status: " + res.status);
                }
            })
            .then(() => {
                divBox.classList.add("fade-out");
                setTimeout(() => divBox.remove(), 500);
            })
            .catch((e) => {
                console.log(`刪除失敗 ${e}`);
            });
    });

    const UpBtn = divBox.querySelector(".UpdateBtn");

    //點擊更新按鈕，彈出視窗
    UpBtn.addEventListener("click", () => {
        const editModal = document.querySelector(".editModal");
        modalBg();
        searchId(msg.id);
        UserDataId = msg.id;
        editModal.classList.add("visibleModal");
    });

    // 加到畫面上
    container.appendChild(divBox);
};

//搜尋
const searchBtn = document.querySelector(".searchIcon");
const userSearch = document.querySelector("#userSearch");
searchBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const content = userSearch.value;

    fetch(`/api/messages/${content}`)
        .then((res) => {
            if (res.ok) {
                container.innerHTML = "";
                return res.json();
            } else {
                throw new Error("HTTP error! status: " + res.status);
            }
        })
        .then((data) => {
            if (data.length !== 0) {
                data.forEach((msg) => {
                    commentComponent(msg);
                });
            } else {
                const nulldiv = document.createElement("div");
                nulldiv.classList.add("userContent");
                nulldiv.textContent = "查無資料";
                container.appendChild(nulldiv);
            }
        })
        .catch((error) => {
            console.error("取得資料失敗:", error);
        });
});

//監聽搜尋為空
userSearch.addEventListener("input", (e) => {
    if (e.target.value !== "") return;
    init();
});

//modal添加黑色背景
const modalShelter = document.querySelector(".modalShelter");

modalShelter.addEventListener("click", () => {
    modalShelter.classList.add("modalHidden");
    editModal.classList.remove("visibleModal");
    createModal.classList.remove("visibleModal");
});

const modalBg = function () {
    modalShelter.classList.toggle("modalHidden");
};

//建立更新彈跳視窗
const editModal = document.querySelector(".editModal");
const upComment = document.querySelector(".upComment");

//更新表單欄位
let editName = document.querySelector("#editName");
let editComment = document.querySelector("#editComment");

// 搜尋id留言
const searchId = function (id) {
    fetch(`/api/messages/id/${id}`)
        .then((res) => {
            if (res.ok) {
                return res.json();
            } else {
                throw new Error("HTTP error! status: " + res.status);
            }
        })
        .then((data) => {
            if (data.length !== 0) {
                editName.value = data.name;
                editComment.value = data.content;
            } else {
                window.alert("發生錯誤");
            }
        })
        .catch((error) => {
            console.error("取得資料失敗:", error);
        });
};

//更新資料
const UpdateComment = function (id) {
    fetch(`/api/messages/update/${id}`, {
        method: "put",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            name: editName.value,
            content: editComment.value,
        }),
    })
        .then((res) => {
            if (res.ok) {
                container.innerHTML = "";
                return res.json();
            } else {
                throw new Error("HTTP error! status: " + res.status);
            }
        })
        .then(init)
        .catch((e) => {
            console.error("取得資料失敗:", e);
        });
};

//更新資料
upComment.addEventListener("click", (e) => {
    e.preventDefault();
    modalBg();
    UpdateComment(UserDataId);
    editModal.classList.remove("visibleModal");
});

const createModal = document.querySelector(".createModal");
const createForm = document.querySelector(".createForm");

//開啟建立留言視窗
const openCreate = document.querySelector(".openCreate");
openCreate.addEventListener("click", () => {
    modalBg();
    createModal.classList.add("visibleModal");
});

//建立
createForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const userName = document.querySelector("#userName");
    const userComment = document.querySelector("#userComment");

    fetch(`/api/messages/create/${userName}/${userComment}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            name: userName.value,
            content: userComment.value,
        }),
    })
        .then((res) => {
            if (res.ok) {
                container.innerHTML = "";
                modalBg();
                createModal.classList.remove("visibleModal");
                userName.value = "";
                userComment.value = "";
                return res.json();
            } else {
                throw new Error("HTTP error! status: " + res.status);
            }
        })
        .then(init)
        .catch((error) => {
            console.error("新增資料失敗:", error);
        });
});
