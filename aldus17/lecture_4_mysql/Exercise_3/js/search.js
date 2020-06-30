function getLibraryContent(searchParameter) {

    var ajax = new XMLHttpRequest();

    ajax.open("GET", "backend/search.php?searchParameter=" + searchParameter, true);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("results").innerHTML = this.responseText;
        };
    }
}

document.addEventListener("DOMContentLoaded", function() {
    getLibraryContent(document.getElementById("search").value);

    document.getElementById("searchbtn").addEventListener("click", function() {
        getLibraryContent(document.getElementById("search").value);
    });

    loadAllResultOnEmptyField("change", "search");
    loadAllResultOnEmptyField("input", "search");

    function loadAllResultOnEmptyField(domevent, elementID) {
        document.getElementById(elementID).addEventListener(domevent, function() {
            if (document.getElementById(elementID).value === "") {
                getLibraryContent(document.getElementById(elementID).value);
            }
        });
    }
});