function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableHTML = tableID.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.querySelector(".download-link").appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

var a = document.querySelectorAll("table");

    document.querySelector("#download-table").addEventListener("click", function() {
        for (var i = 0; i < a.length; i++) {
            let x = prompt("Enter file name");
            if (x === null) {
                alert("Cancelled");
            } else {
                exportTableToExcel(a[i], x);
                console.log(a[i]);
            }
        }
    });
    
