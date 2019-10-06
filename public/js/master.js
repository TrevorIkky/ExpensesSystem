/*const tabList = document.querySelectorAll("[data-tab-list]")
const tabContentList = document.querySelectorAll("[data-tab-content]")
tabList.forEach(tab => {
    tab.addEventListener('click', function() {
        const element = document.querySelector(tab.dataset.tabList)
        console.log(element)
        tabContentList.forEach(list => {
            list.classList.remove("active")
        })
        element.classList.add("active")

    })
})*/

$(document).ready(function() {
    console.log("Document ready");
    $("#close-nav-bar").on('click', function() {
        document.getElementById("open-nav-bar").style.opacity = "1";
        document.getElementById("menus").style.width = "0px";
        document.getElementById("main-container").style.marginRight = "0px";
    })
    $(".open-nav-bar").on('click', function() {
        document.getElementById("menus").style.width = "500px";
        document.getElementById("open-nav-bar").style.opacity = "0";
        document.getElementById("main-container").style.marginRight = "500px";
    })

    $('.materialboxed').materialbox();
});