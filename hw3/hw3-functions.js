
/**
 * Created by Hans Dulimarta Fall 2017.
 * TODO: Add your name below this line
 * Mike Ames
 */

/**
 * Given a node with id {rootId}, the following function finds all its descendant
 * elements having its attribute ID set. The function returns the number of
 * such elements. ALSO, for each such element this function sets its class
 * to {klazName}.
 *
 * @param rootId
 * @returns {number}
 */
function findElementsWithId(rootId, klazName) {

    var parent = document.getElementById(rootId);
    var descendants = parent.querySelectorAll("[id]");
    var count = descendants.length;

    for (var i = 0; i < count - 1; ++i) {
        descendants[i].className = klazName;
    }

    return count;
}

/**
 * The following function finds all elements with attribute 'data-gv-row' (or
 * 'data-gv-column') and create a table of the desired dimension as a child of
 * the element.
 *
 * @returns NONE
 */
function createTable() {

    var lipsum = new LoremIpsum();

    var div = document.getElementsByClassName("table-home");
    var rows = parseInt(div[0].getAttribute("data-gv-row"));
    var cols = parseInt(div[0].getAttribute("data-gv-column"));

    var table = document.createElement("table");
    div[0].appendChild(table);

    var header = table.insertRow()
    header.innerHTML = "<th>Heading 1</th><th>Heading 2</th>";

    table.insert

    for (var i = 1; i < rows + 1; i++) {
        var row = table.insertRow(i);
        for (var j = 0; j < cols; j++) {
            var td = row.insertCell(j);

            td.innerHTML = lipsum.generate(4).split(' ')[0];
        }
    }

    console.log("rows: " + rows + " cols: " + cols);





}